<?php

App::uses('AppModel', 'Model');
App::uses('TwitterOAuth', 'Twitter.Vendor');
class TwitterAppModel extends AppModel {
	
	public $account;
	public $feed_type;
	public $duration;
	public $include_rts;
	public $exclude_replies;
	public $include_entities;
	public $feed_url;
	public $debug_mode;
	
	public function get_content($options) {
		
		//account information
		$this->account['username']	= (isset($options['username'])) ? $options['username'] : false;
		$this->account['search'] 	= (isset($options['search'])) ? $options['search'] : false;
		$this->account['hashtag'] 	= (isset($options['hashtag'])) ? $options['hashtag'] : false;
		$this->account['members'] 	= (isset($options['members'])) ? $options['members'] : false;
		
		//feed type
		$this->feed_type = $this->define_feed_type();
			
		//cache unique key
		$this->cache_key = (isset($options['cache_key'])) ? $options['cache_key'] : $this->define_cache_key();
				
		//in case you need a fresh feed, you can delete the cache file
		$this->delete_cache = (isset($options['delete_cache'])) ? $options['delete_cache'] : false;
		
		//do not cache the feed (WARNING: Twitter will deny you the feed if you go over 150 hits per hour)
		$this->no_cache = (isset($options['no_cache'])) ? $options['no_cache'] : false;

		//include retweets
		$this->include_rts = (isset($options['include_rts'])) ? $options['include_rts'] : true;
		
		//exclude replies
		$this->exclude_replies = (isset($options['exclude_replies'])) ? $options['exclude_replies'] : true;
		
		//include entities 
		$this->include_entities	= (isset($options['include_entities'])) ? $options['include_entitiess'] : false;
		
		//get feed url
		$this->feed_url = $this->get_feed_url();
		
		//debug
		$this->debug_mode = (isset($options['debug_mode'])) ? $options['debug_mode'] : false;
		
		//change default cache settings
		$this->duration = (isset($options['duration'])) ? Cache::set(array('duration' => $options['duration']),'CacheTwitterFeed') : false;
				
		//clear cache data
		if ($this->delete_cache) Cache::delete($this->cache_key,'CacheTwitterFeed');
				
		//get cached data
		if (!$this->no_cache) {
			$cached =  Cache::read($this->cache_key,'CacheTwitterFeed');
			//cache is available and it hasn't expired
			if ($cached) {
				return $this->decoded($cached);
			} else {
				//get live feed
				$fresh_feed	= $this->get_live_feed();
				if ($fresh_feed) {
					Cache::write($this->cache_key, $fresh_feed,'CacheTwitterFeed'); 
					return $this->decoded($fresh_feed);
				} else {
					$this->debug('Live feed not available.', __FILE__, __LINE__);
					//live feed is unavailable, fetch the old cache even if it expired
					Cache::set(array('duration' => '+30 days'),'CacheTwitterFeed');
					$old_cache = Cache::read($this->cache_key,'CacheTwitterFeed');
					if ($old_cache) {
						return $this->decoded($old_cache);
					} else {
						$this->debug('Old cache not found. Live feed not available.', __FILE__, __LINE__);
						return false;	
					}	
				}
			}
		} else {
			//get live feed when "no-cache" is set to true
			$fresh_feed	= $this->get_live_feed();
			if ($fresh_feed) { 
				return $this->decoded($fresh_feed);
			} else {
				$this->debug('Live feed not available (no-cache set)', __FILE__, __LINE__);
				return false;
			}
		}
	}
		
	private function get_live_feed() {
		if ($this->feed_url) {
			$twitter_connection = $this->twitter_oAuth();
			$feed = $twitter_connection->get($this->feed_url);
			//var_export($feed);
			if($feed) {
				if($this->feed_error_detect($feed)) {
					return $feed;	
				} else {
					$this->debug('Live feed is missing some data keys or it contains errors: '.var_export($feed, true), __FILE__, __LINE__);
					return false;
				}
			} else {
				$this->debug('Unable to read the feed: '.$this->feed_url, __FILE__, __LINE__);	
				return false;
			}
		} else {
			$this->debug('Feed Not Defined', __FILE__, __LINE__);
			return false;
		}
	}

	//if cache key is not defined in param, create one based on account
	private function define_cache_key() {
		$cache_key = false;
		if ($this->account['username']) {		$cache_key = $this->account['username'];
		} elseif ($this->account['search']) { 	$cache_key = implode($this->account['search']);
		} elseif ($this->account['hashtag']) { 	$cache_key = $this->account['hashtag'];
		} elseif ($this->account['members']) { 	$cache_key = $this->account['members'];
		}
		return sha1($cache_key);
	}
	
	//define feed type
	private function define_feed_type() {	
		$feed_type = false;
		if ($this->account['username']) {		$feed_type = 'single';
		} elseif ($this->account['search']) { 	$feed_type = 'search';
		} elseif ($this->account['hashtag']) { 	$feed_type = 'hashtag';
		} elseif ($this->account['members']) { 	$feed_type = 'members';
		}	
		return $feed_type;
	}
	
	//feed URL
	private function get_feed_url() {
		$feed_url = false;
		if ($this->account['username']) {
			$username = $this->account['username'];
			$feed_url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=$username";
			$feed_url.= "&include_entities={$this->include_entities}&include_rts={$this->include_rts}";
			$feed_url.= "&exclude_replies={$this->exclude_replies}";
		} elseif ($this->account['search']) {
			$search_query = implode("+OR+from%3A", $this->account['search']);
			$feed_url = "https://api.twitter.com/1.1/search/tweets.json?q=from%3A" . $search_query;
		} elseif ($this->account['hashtag']) { 
			$hashtag  = $this->account['hashtag'];
			$feed_url = "https://api.twitter.com/1.1/search/tweets.json?q=" . urlencode($hashtag);
		} elseif ($this->account['members']) { 
			$member_id	= $this->account['members'];
			$feed_url 	= "https://api.twitter.com/1.1/lists/statuses.json?list_id=" . urlencode($member_id);
		}
		return $feed_url;	
	}
	
	private function twitter_oAuth() {	
		//defined in plugin's bootstrap
		$cons_key 			= Configure::read('authKeys.cons_key');
		$cons_secret		= Configure::read('authKeys.cons_secret');
		$oauth_token 		= Configure::read('authKeys.oauth_token');
		$oauth_token_secret = Configure::read('authKeys.oauth_token_secret');
		
		$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
		return $connection;
	}
	
	private function debug($description, $file, $line) {
		if ($this->debug_mode) {
			$description = $description."\n";
			$description.= "File: ".$file."\n";
			$description.= "Line: ".$line."\n\n";
			echo "<!-- $description --> \n\n";	
		} 
	}
	
	private function decoded($feed) {
		$decoded = json_decode($feed, true);
		if ($this->account['username'] || $this->account['members']) {
			return $decoded;
		} else {
			return $decoded['statuses']; 
		}
	}
		
		
	private function feed_error_detect($feed) {
		//check data per feed type
		$data = $this->parsed_tweets($feed);	
		//var_export($data);
		if (isset($data[0])) {
			$required = array('created_at', 'text', 'user' );
			if(count(array_intersect_key(array_flip($required), $data[0])) === count($required)) {
				return true;           
			} else {
				return false;	
			}
		} else {
			return false;	
		}
	}
	
	private function parsed_tweets($feed) {
		$feed 		= json_decode($feed, true);
		$feed_type 	= $this->define_feed_type();
		switch($feed_type) {
			case 'single':		$data = $feed;	break;
			case 'search':		$data = $feed['statuses'];	break;
			case 'hashtag':		$data = $feed['statuses'];	break;
			case 'members':		$data = $feed;	break;
		}
		return $data;
	}
	
}