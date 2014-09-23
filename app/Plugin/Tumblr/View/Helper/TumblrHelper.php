<?php

class TumblrHelper extends AppHelper {
		
	public function get_content($feed, array $options=NULL) {	
				
		$output = NULL;
		$template = (isset($options['template'])) ? $options['template'] : 'default' ;
		if (!empty($feed)) {
			$feed_count = count($feed);
			$display_count = (isset($options['limit']) && $options['limit'] <= $feed_count) ? $options['limit'] : $feed_count;
			foreach($feed as $feed) {
				if(!empty($feed['photos'])) {
					foreach($feed['photos'] as $photo) {
						if (!empty($photo['alt_sizes'][0]['url'])) $images['xlarge'] = $photo['alt_sizes'][0]['url']; // 640px x 640px
						if (!empty($photo['alt_sizes'][1]['url'])) $images['large'] = $photo['alt_sizes'][1]['url']; // 500px x 500px
						if (!empty($photo['alt_sizes'][2]['url'])) $images['med'] = $photo['alt_sizes'][2]['url']; // 400px x 400px
						if (!empty($photo['alt_sizes'][3]['url'])) $images['small'] = $photo['alt_sizes'][3]['url']; // 250px x 250px
						if (!empty($photo['alt_sizes'][4]['url'])) $images['xsmall'] = $photo['alt_sizes'][4]['url']; // 100px x 100px
						if (!empty($photo['alt_sizes'][5]['url'])) $images['thumb'] = $photo['alt_sizes'][5]['url']; // 75px x 75px
					}
				}
				$output .= $this->_View->element('Tumblr.'.$template, array(
					'type'			=> $feed['type'], //video, image
					'images'		=> $images,
					'created' 		=> $this->calculate_time($feed['timestamp']),
					'link'			=> $feed['short_url'],
					'text'			=> $this->format_content($feed['caption']),
					'user'			=> $feed['blog_name'],
				));
			}
		} else {
			$output .= '<p><i>Tumblr feed is currently unavailable.</i></p>';
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