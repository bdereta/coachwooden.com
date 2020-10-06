<?php

class YoutubeHelper extends AppHelper {
		
	public function get_content($feed, array $options=NULL) {	
		$output = NULL;
		$template = (isset($options['template'])) ? $options['template'] : 'default' ;
		if (!empty($feed)) {
			$feed_count = count($feed);
			$display_count = (isset($options['limit']) && $options['limit'] <= $feed_count) ? $options['limit'] : $feed_count;
			for($i=0; $i<$display_count; $i++) {
				$output .= $this->_View->element('Youtube.'.$template, array(
					'created' => $this->calculate_time($feed['items'][$i]['snippet']['publishedAt']),
					'title' => $feed['items'][$i]['snippet']['title'],
					'description' => $feed['items'][$i]['snippet']['description'],
					'content' => "https://www.youtube.com/embed/".$feed['items'][$i]['snippet']['resourceId']['videoId']."?wmode=opaque&rel=0",
					//'link' => $feed['items'][$i]['title']['$t'],
					'author' => $feed['items'][$i]['snippet']['channelTitle'],
					'thumbnail_0' => $feed['items'][$i]['snippet']['thumbnails']['medium']['url'], // 320px x 180px
					'thumbnail_1' => $feed['items'][$i]['snippet']['thumbnails']['default']['url'], // 120px x 90px
					'thumbnail_2' => $feed['items'][$i]['snippet']['thumbnails']['high']['url'], // 480px x 360px
					'views' => $feed['items'][$i]['snippet']['thumbnails']['default']['url'],
				));
			}			
		} else {
			$output .= '<p><i>Youtube feed is currently unavailable.</i></p>';
		}	
		
		return $output;
	}
	
	public function format_content($data) {
		if (substr($data,0,1) != '@'){	
			// Add hyperlink html tags to any urls, twitter ids or hashtags in the tweet.
			$data = preg_replace('/(https?:\/\/[^\s"<>]+)/','<a href="$1">$1</a>',$data);
			$data = preg_replace('/(^|[\n\s])@([^\s"\t\n\r<:]*)/is', '$1<a href="http://youtube.com/$2">@$2</a>', $data);
			$data = preg_replace('/(^|[\n\s])#([^\s"\t\n\r<:]*)/is', '$1<a href="http://youtube.com/search?q=%23$2">#$2</a>', $data);
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