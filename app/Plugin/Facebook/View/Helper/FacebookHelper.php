<?php

class FacebookHelper extends AppHelper {
		
	public function get_content($feed, array $options=NULL) {	
	
		$output = NULL;
		$template = (isset($options['template'])) ? $options['template'] : 'default' ;
		if (!empty($feed)) {
			$feed_count = count($feed);
			$display_count = (isset($options['limit']) && $options['limit'] <= $feed_count) ? $options['limit'] : $feed_count;
			for($i=0; $i<$display_count; $i++) {
				if (isset($feed[$i]['message'])) {
					$output .= $this->_View->element('Facebook.'.$template, array(
						'type'			=> $feed[$i]['type'],
						'message'		=> isset($feed[$i]['message']) ? $feed[$i]['message'] : false,
						'picture'		=> isset($feed[$i]['picture']) ? $feed[$i]['picture'] : false,
						'created' 		=> $this->calculate_time($feed[$i]['created_time']),
						'link'			=> isset($feed[$i]['link']) ? $feed[$i]['link'] : false,
						'caption'		=> isset($feed[$i]['caption']) ? $feed[$i]['caption'] : false,
					));
				}
			}			
		} else {
			$output .= '<p><i>Facebook feed is currently unavailable.</i></p>';
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
		$sec = time() - strtotime($value);
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