<?php

//Reuse cache settings
Cache::config('CacheInstagramFeed', array(
	'engine' => 'ReuseFileCache.ReuseFile', //make sure to omit 'Engine' at the end
	'duration' => '+10 minutes',
	'path' => CACHE.'models'.DS,
	'prefix' => 'tumblr_',
	'serialize' => false,
));

?>