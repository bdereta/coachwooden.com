<?php

//get your own at https://dev.twitter.com/apps/
Configure::write('authKeys', array(
	'cons_key' 				=> 'T9rtof6t5tfzkmLu8Sug',
	'cons_secret' 			=> 'PG3R3H4QRI2kBYDALzFMOHdX3I6s8mnuxpAC4af35eo',
	'oauth_token' 			=> '19934117-UskKSmIa4U8DMlhelqo7GYi2M6fDONAHUshiSFahp',
	'oauth_token_secret'	=> 'hKQgkmZhMifgxdDVUQoEYOpWg0Xs9Qb2MvFTBNDCdrI'
));

//Reuse cache settings
Cache::config('CacheTwitterFeed', array(
	'engine' => 'ReuseFileCache.ReuseFile', //make sure to omit 'Engine' at the end
	'duration' => '+10 minutes',
	'path' => CACHE.'models'.DS,
	'prefix' => 'twitter_',
	'serialize' => false,
));

?>