<?

class Tumblr {	
	
	public function __construct($options) {
		
		//number of feeds
		$this->count = (isset($options['count'])) ? $options['count'] : false;
		
		//account information
		$this->user_id	= (isset($options['user_id'])) ? $options['user_id'] : false;
			
		//cache unique key
		$this->cache_key = (isset($options['cache_key'])) ? $options['cache_key'] : $this->user_id;
		
		//cache directory
		$this->cache_directory = (isset($options['cache_directory'])) ? $options['cache_directory'] : 'cache';
		
		//cache expiration, default 1 hour
		$this->cache_expiration = (isset($options['cache_expiration'])) ? $options['cache_expiration'] : 3600;
		
		//in case you need a fresh feed, you can delete the cache file
		$this->clear_cache_file = (isset($options['clear_cache_file'])) ? $options['clear_cache_file'] : false;
		
		//do not cache the feed (WARNING: API will deny you the feed if you go over 150 hits per hour)
		$this->no_cache = (isset($options['no_cache'])) ? $options['no_cache'] : false;
		
		//cache file timestamp - this will print the cache file created time in an HTML comment <!-- twitter cached data: Y-m-d H:i:s -->
		$this->display_cache_timestamp = (isset($options['display_cache_timestamp'])) ? $options['display_cache_timestamp'] : false;
		
		//get feed url
		$this->feed_url = "http://api.tumblr.com/v2/blog/{$this->user_id}.tumblr.com/posts?api_key=JJJi1al63EOYVgVuaB3RBd83tslGo4uX12sUQTSmrLLJ9m1c3d";
		
		//debug
		$this->debug_mode = (isset($options['debug_mode'])) ? $options['debug_mode'] : false;
		
		//web admin 
		$this->webadmin = (isset($options['webadmin'])) ? $options['webadmin'] : 'info@cubismedia.com';
	
	}
	
	
	public function get_content() {
		//clear cache data
		if ($this->clear_cache_file) $this->clear_cache();
		
		//get cached data
		if (!$this->no_cache) {
			$cached = $this->get_cache();
			if ($cached) {
				return json_decode($cached, true);
			} else {
				//get live feed
				$fresh_feed	= $this->get_live_feed();
				if ($fresh_feed) {
					$this->set_cache($fresh_feed); 
					return json_decode($fresh_feed,true);
				} else {
					$this->debug('Live feed not available.', __FILE__, __LINE__);
					//get old cached file
					$old_cache = $this->get_cache(true);
					if ($old_cache) {
						return $old_cache;
					} else {
						$this->debug('Old cache not found. Live feed not available.', __FILE__, __LINE__);
						return false;	
					}	
				}
			}
		} else {
			//get live feed when no-cache is set to true
			$fresh_feed	= $this->get_live_feed();
			if ($fresh_feed) { 
				$this->set_cache($fresh_feed);
				return json_decode($fresh_feed,true);
			} else {
				$this->debug('Live feed not available (no-cache is set)', __FILE__, __LINE__);
				return false;
			}
		}
	}
	
			
	private function get_live_feed() {
		if ($this->feed_url) {
			$output = @file_get_contents($this->feed_url);
			
			//var_export($feed);
			if($output) {
				return $output;	
			} else {
				$this->debug('Unable to read the feed: '.$this->feed_url, __FILE__, __LINE__);	
				return false;
			}
		} else {
			$this->debug('Feed Not Defined', __FILE__, __LINE__);
			return false;
		}
	}	
	
	public function calculate_time($str) {
		$sec = time() - $str;
		if($sec < 60) {
			return $sec . " seconds ago";
		} else if($sec < 60*60) {
			$time = intval($sec / 60);
			if ($time == 1) {
				return  "Few minutes ago";
			} else {
				return  $time. " minutes ago";
			}
		} else if($sec < 24*60*60) {
			$time = intval($sec / 60 / 60);
			if ($time == 1) {
				return  "An hour ago";
			} else {
				return  $time. " hours ago";
			}
		} else {
			$time = intval($sec / 60 / 60 / 24);
			if ($time == 1) {
				return  "Yesterday";
			} else {
				return  $time. " days ago";
			}
		}
	}
	
	public function format_text_content($data) {
		if (substr($data,0,1) != '@'){	
			// Add hyperlink html tags to any urls, twitter ids or hashtags in the tweet.
			$data = preg_replace('/(https?:\/\/[^\s"<>]+)/','<a href="$1">$1</a>',$data);
			$data = preg_replace('/(^|[\n\s])@([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/$2">@$2</a>', $data);
			$data = preg_replace('/(^|[\n\s])#([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/search?q=%23$2">#$2</a>', $data);
		}
		return $data;
	}
	
	
	private function debug($description, $file, $line) {
		if ($this->debug_mode) {
			$description = $description."\n";
			$description.= "File: ".$file."\n";
			$description.= "Line: ".$line."\n\n";
			print $description;
			@mail($this->webadmin, 'Twitter error Report', $description, 'From: noreply@'.$_SERVER['HTTP_HOST']);	
		} 
	}

	private function get_cache($old_cache = false) {
		if (!is_dir($this->cache_directory) OR !is_writable($this->cache_directory)) {
			$this->debug('Cache directory not writable: '.$this->cache_directory, __FILE__, __LINE__);
			return FALSE;
		}
		$cache_path = $this->get_cache_path();
		if (!@file_exists($cache_path)) {
			$this->debug('Cache does not exist: '.$cache_path, __FILE__, __LINE__);
			return false;
		}
		
		if (!$old_cache) { //disregard the file time
			if (filemtime($cache_path) < (time() - $this->cache_expiration)) {
				$this->debug('Cache expired: '.$cache_path, __FILE__, __LINE__);
				return false;
			}
		}
		
		if (!$fp = @fopen($cache_path, 'rb')) {
			$this->debug('Unable to open and read cache file: '.$cache_path , __FILE__, __LINE__);
			return FALSE;
		}
		flock($fp, LOCK_SH);
		$cache = '';
		if (filesize($cache_path) > 0) {
			$cache = fread($fp, filesize($cache_path));
			if ($this->display_cache_timestamp) $cache = '<!-- twitter cached data: '.date('Y-m-d H:i:s', filemtime($cache_path)).' -->'.$cache;
		} else {
			$cache = NULL;
		}
		flock($fp, LOCK_UN);
		fclose($fp);
        return $cache;
		
    }
	
	private function get_cache_path() {
        return sprintf("%s/%s", $this->cache_directory, sha1($this->cache_key));
    }
	
	private function set_cache($data) {
		if (!is_dir($this->cache_directory) OR !is_writable($this->cache_directory)) {
			mkdir($this->cache_directory);
			if (!is_dir($this->cache_directory) OR !is_writable($this->cache_directory)) {
				$this->debug('Cache directory not writable: '.$this->cache_directory, __FILE__, __LINE__);
				return FALSE;
			}
		}
		$this->clear_cache();		
		$cache_path = $this->get_cache_path();
		if (!$fp = fopen($cache_path, 'wb')) {
			$this->debug('Unable to open and write to cache file: '.$cache_path , __FILE__, __LINE__);
			return FALSE;
		}
		if (flock($fp, LOCK_EX)) {
			fwrite($fp, $data);
			flock($fp, LOCK_UN);
		} else {
			$this->debug('Unable to write data to cache file: '.$fp, __FILE__, __LINE__);
			return FALSE;
		}
		fclose($fp);
		@chmod($cache_path, 0770);
		return TRUE;
    }
    
	private function clear_cache() {
        $cache_path = $this->get_cache_path();
        if (file_exists($cache_path)) {
            @unlink($cache_path);
            return TRUE;
        }
		$this->debug('Unable to delete cache file: '.$cache_path, __FILE__, __LINE__);
        return FALSE;
    }
	
	
}

?>