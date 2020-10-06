<?php

class InstagramHelper extends AppHelper {
		
	public function get_content($feed, array $options=NULL) {	
		$output = NULL;
		$template = (isset($options['template'])) ? $options['template'] : 'default' ;
		if (!empty($feed)) {
			$feed_count = count($feed);
			$display_count = (isset($options['limit']) && $options['limit'] <= $feed_count) ? $options['limit'] : $feed_count;
			for($i=0; $i<$display_count; $i++) {
				$output .= $this->_View->element('Instagram.'.$template, array(
					'type'			=> $feed[$i]['type'], //video, image
					'image'			=> $feed[$i]['images']['standard_resolution']['url'],
					'created' 		=> $this->calculate_time($feed[$i]['created_time']),
					'timestamp'		=> CakeTime::format('M jS, Y', $feed[$i]['created_time']),
					'link'			=> $feed[$i]['link'],
					'text'			=> $this->format_content($feed[$i]['caption']['text']),
					'user'			=> $feed[$i]['user']['full_name'],
					'screen_name'	=> $feed[$i]['user']['username'],
					'profile_img'	=> $feed[$i]['user']['profile_picture'],
				));
			}
		} else {
			$output .= '<p><i>Instagram feed is currently unavailable.</i></p>';
		}	
		return $output;
	}
	
	public function format_content($data) {
		if (substr($data,0,1) != '@'){	
			// Add hyperlink html tags to any urls, twitter ids or hashtags in the tweet.
			$data = preg_replace('/(https?:\/\/[^\s"<>]+)/','<a href="$1">$1</a>',$data);
			$data = preg_replace('/(^|[\n\s])@([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/$2">@$2</a>', $data);
			$data = preg_replace('/(^|[\n\s])#([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/search?q=%23$2">#$2</a>', $data);
		}
		return $data;
	}
	 
	public function calculate_time($value) {
		$sec = time() - $value;
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
}

?>