<?php
App::uses('AppModel', 'Model');

class FacebookAppModel extends AppModel {
	
	public $user_id;
	public $cache_key;
	public $clear_cache_file;
	public $no_cache;
	public $duration;
	public $feed_url;
	public $debug_mode;
	public $webadmin;
	
	public function get_content($options) {
				
		//account information
		$this->user_id	= (isset($options['user_id'])) ? $options['user_id'] : false;
			
		//cache unique key
		$this->cache_key = (isset($options['cache_key'])) ? $options['cache_key'] : $this->user_id;
				
		//change default cache settings
		$this->duration = (isset($options['duration'])) ? Cache::set(array('duration' => $options['duration']),'CacheFacebookFeed') : false;
		
		//in case you need a fresh feed, you can delete the cache file
		$this->clear_cache_file = (isset($options['clear_cache_file'])) ? $options['clear_cache_file'] : false;
		
		//do not cache the feed (WARNING: API will deny you the feed if you go over 150 hits per hour)
		$this->no_cache = (isset($options['no_cache'])) ? $options['no_cache'] : false;
			
		//get feed url
		$this->feed_url = "https://graph.facebook.com/{$this->user_id}/posts?access_token=339731742785095|CHzxkyk1ePZzaY3KTOaJQEr01bM";
		
		//debug
		$this->debug_mode = (isset($options['debug_mode'])) ? $options['debug_mode'] : false;
		
		//web admin 
		$this->webadmin = (isset($options['webadmin'])) ? $options['webadmin'] : false;
	
		//clear cache data
		if ($this->delete_cache) Cache::delete($this->cache_key,'CacheFacebookFeed');
		
		//get cached data
		if (!$this->no_cache) {
			$cached =  Cache::read($this->cache_key,'CacheFacebookFeed');
			//cache is available and it hasn't expired
			if ($cached) {
				return $this->decoded($cached);
			} else {
				//get live feed
				$fresh_feed	= $this->get_live_feed();
				if ($fresh_feed) {
					Cache::write($this->cache_key, $fresh_feed,'CacheFacebookFeed'); 
					return $this->decoded($fresh_feed);
				} else {
					$this->debug('Live feed not available.', __FILE__, __LINE__);
					//live feed is unavailable, fetch the old cache even if it expired
					Cache::set(array('duration' => '+30 days'),'CacheFacebookFeed');
					$old_cache = Cache::read($this->cache_key,'CacheFacebookFeed');
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
			$feed = $this->curl();
			if (!$feed) {
				$feed = @file_get_contents($this->feed_url);	
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
	
	private function curl() {
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->feed_url,
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
			if (array_key_exists('data', $decoded)) {
				return $decoded['data'];
			}
		}
		return false;
	}
	
	
	private function debug($message, $file, $line) {
		if ($this->debug_mode) {
			$description = "<noscript>\n\n";
			$description.= $message."\n";
			$description.= "File: ".$file."\n";
			$description.= "Line: ".$line."\n\n";
			$description.= "</noscript>";
			echo $description;
			if ($this->webadmin) {
				@mail($this->webadmin, 'Facebook error Report', $description, 'From: noreply@'.$_SERVER['HTTP_HOST']);	
			}
		} 
	}

	private function feed_error_check($feed) {
		$decode = json_decode($feed, true);
		if (!is_array($decode)) {
			$this->debug('Feed is empty or not an array', __FILE__, __LINE__);
			return true;
		} elseif(array_key_exists('errors',$decode)) {
			$errors = var_export($decode, true);
			$this->debug('Feed Error: '.$errors, __FILE__, __LINE__);
			return true;
		} else {
			return false;	
		}
	}
	
}