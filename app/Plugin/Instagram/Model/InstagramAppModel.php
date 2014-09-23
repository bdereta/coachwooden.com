<?php
App::uses('AppModel', 'Model');
App::uses('CakeTime', 'Utility');

class InstagramAppModel extends AppModel {
		
	public $user_id;
	public $hashtag_id;
	public $cache_key;
	public $clear_cache_file;
	public $no_cache;
	public $duration;
	public $feed_url;
	public $earliest_date;
	public $debug_mode;
	
	public function get_content($options) {
				
		//account information
		$this->user_id	= (isset($options['user_id'])) ? $options['user_id'] : false;
		
		//hashtag information
		$this->hashtag_id	= (isset($options['hashtag_id'])) ? $options['hashtag_id'] : false;
			
		//cache unique key
		$this->cache_key = (isset($options['cache_key'])) ? $options['cache_key'] : $this->user_id;
				
		//change default cache settings
		$this->duration = (isset($options['duration'])) ? Cache::set(array('duration' => $options['duration']),'CacheInstagramFeed') : false;
		
		//in case you need a fresh feed, you can delete the cache file
		$this->clear_cache_file = (isset($options['clear_cache_file'])) ? $options['clear_cache_file'] : false;
		
		//do not cache the feed (WARNING: API will deny you the feed if you go over 150 hits per hour)
		$this->no_cache = (isset($options['no_cache'])) ? $options['no_cache'] : false;
			
		//get feed url
		$this->feed_url = $this->get_feed_url();
				
		//debug
		$this->debug_mode = (isset($options['debug_mode'])) ? $options['debug_mode'] : false;
			
		//clear cache data
		if ($this->delete_cache) Cache::delete($this->cache_key,'CacheInstagramFeed');
		
		$feed = $this->FetchData();
		
		if (!empty($options['earliest_date'])) {
			if (!empty($feed['data'])) {
				ini_set('max_execution_time', 300);
				while($this->FetchEarliestPost($feed['data'], $options['earliest_date'])) {
					$next_url = !empty($next_url) ? $next_url : $feed['pagination']['next_url'];
					$new_data = $this->FetchData($next_url);
					if (empty($new_data['data'])) break;
					$next_url = !empty($new_data['pagination']['next_url']) ? $new_data['pagination']['next_url'] : null;
					$feed['data'] = array_merge($feed['data'], $new_data['data']);
					unset($new_data['data']);
				}
			}
		}
		return $feed['data'];
	}
	
	private function FetchData($next_url = null) {
		//get cached data
		if (!$this->no_cache && !$next_url) {
			$cached =  Cache::read($this->cache_key,'CacheInstagramFeed');
			//cache is available and it hasn't expired
			if ($cached) {
				return $this->decoded($cached);
			} else {
				//get live feed
				$fresh_feed	= $this->get_live_feed();
				if ($fresh_feed) {
					Cache::write($this->cache_key, $fresh_feed,'CacheInstagramFeed'); 
					return $this->decoded($fresh_feed);
				} else {
					$this->debug('Live feed not available.', __FILE__, __LINE__);
					//live feed is unavailable, fetch the old cache even if it expired
					Cache::set(array('duration' => '+30 days'),'CacheInstagramFeed');
					$old_cache = Cache::read($this->cache_key,'CacheInstagramFeed');
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
			$next_url = !empty($next_url) ? $next_url : null;
			$fresh_feed	= $this->get_live_feed($next_url);
			if ($fresh_feed) { 
				return $this->decoded($fresh_feed);
			} else {
				$this->debug('Live feed not available (no-cache set)', __FILE__, __LINE__);
				return false;
			}
		}
		
	}
	
	private function get_feed_url(){
		$feed = null;
		if ($this->user_id) {
			$feed = "https://api.instagram.com/v1/users/{$this->user_id}/media/recent/?access_token=212829546.9dbbbf8.9327aa30c29046e09bcf4e340a9074ae";
		} 
		if($this->hashtag_id) {
			$feed = "https://api.instagram.com/v1/tags/{$this->hashtag_id}/media/recent/?access_token=212829546.9dbbbf8.9327aa30c29046e09bcf4e340a9074ae";
		}
		return $feed;
	}
	
	private function get_live_feed($next_url = null) {
		if ($this->feed_url || $next_url) {
			$feed_url = ($next_url) ? $next_url : $this->feed_url;
			$feed = $this->curl($feed_url);
			if (!$feed) {
				$feed = @file_get_contents($feed_url);	
			}
			if($feed) {
				$error = $this->feed_error_check($feed);
				if (!$error) {
					return $feed;	
				} else {
					$this->debug('Feed contains errors: '.$this->feed_url, __FILE__, __LINE__);
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
	
	private function curl($url) {
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		
		// Close request to clear up some resources
		curl_close($curl);
		
		return $resp;
	}

	private function decoded($feed) {
		if ($decoded = @json_decode($feed, true)) {
			$feed = $decoded;
		} 
		return $feed;
	}
	
	
	private function debug($description, $file, $line) {
		if ($this->debug_mode) {
			$description = $description."\n";
			$description.= "File: ".$file."\n";
			$description.= "Line: ".$line."\n\n";
			debug($description);
		} 
	}

	private function feed_error_check($feed) {
		$decode = json_decode($feed, true);
		if (array_key_exists('errors',$decode)) {
			$errors = var_export($decode, true);
			$this->debug('Feed Error: '.$errors, __FILE__, __LINE__);
			return true;
		} else {
			return false;	
		}
	}	
	
	private function FetchEarliestPost($data, $earliest_date) {
		if (!empty($data)) {
			$last_entry = end($data);
			if (!empty($last_entry['created_time'])) {
				if ($last_entry['created_time'] > CakeTime::fromString($earliest_date)) {
					return true;	
				}
			}
		} 
		return false;
	}
}