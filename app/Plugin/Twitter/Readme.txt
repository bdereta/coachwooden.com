Twitter Timeline Pluggin beta 0.9
written by Boris Dereta (boris@cubismedia.com)
September 2nd, 2013

Description:

The Twitter plugin is capable of retrieving following timeline types: 

	* Individual user (@cakephp)
	* Multiple Keywords Search
	* Hashtag
	* Members (must be member group number ID)

Twitter plugin will retrieve Twitter JSON feed and store it in a cache file (app/tmp/cache/models/) with "twitter_" prefix. 
The cache default expiration time time is 10 minutes, however you can set different time via controller (see example below). 
If the feed is not available (Twitter API is down, or you exceed the hourly limit) instead of returning no data the Twitter Plugin 
will attempt to find an older cached JSON file (up to 30 days old) and return the "stale" data until the fresh feed is available. 
After your app is allowed to connect to Twitter API, the new JSON cache file will be created.

Use 'debug_mode' for troubleshooting. If there are any issues, open the page source and look for HTML comments (<!-- Twitter error -->).

Skinning:

You can create as many tweet skin as you need in app/Plugin/Twitter/View/Elements/. By using Twitter Helper, you can set twitter skin
you wish to use. If you ommit template value, Twitter Plugin will use the default.ctp located in the 'Elements' folder.

Installation:

1. Paste both 'Twitter' and 'ReuseFileCache' plugins and into your /app/Plugin/ 
2. Add following lines to bootstrap ("/app/Config/bootstrap.php"): 
		CakePlugin::load('ReuseFileCache');
		CakePlugin::load('Twitter', array('bootstrap' => true));
3. Enter your Twitter oAuth credentials into "/app/Plugin/Twitter/Config/bootstrap.php" (get your own at https://dev.twitter.com/apps/)

Usage:

>> Controller:

class YourController extends AppController {

	public $helpers = array('Twitter.Twitter');
	public $uses 	= array('Twitter.Twitter');

	public function YourAction() {

		$this->set('twitter_account', $this->Twitter->get_tweets(array('username' => 'cakephp', 'duration' => '+60 seconds', 'debug_mode' => true)));
		$this->set('twitter_search', $this->Twitter->get_tweets(array('search' => array('php', 'mysql'))));
		$this->set('twitter_hashtag', $this->Twitter->get_tweets(array('hashtag' => 'php')));
		$this->set('twitter_members', $this->Twitter->get_tweets(array('members' => '1634087')));
		
	}
}


>> View:

<?php
//twitter account (single user)
//limit -> how many tweets you wish to display (default setting will display all provided tweets from the Twitter JSON file)
//template -> you can create your own tweet template styles in 'app/Plugin/Twitter/View/Elements/' (default.ctp will be used if no template is set)
if (isset($twitter_account)) echo $this->Twitter->display_tweets($twitter_account, array('limit' => 2, 'template' => 'clean'));
?>

<?php
//twitter search
if (isset($twitter_search)) echo $this->Twitter->display_tweets($twitter_search);
?>

<?php
//twitter hashtag
if (isset($twitter_hashtag) )echo $this->Twitter->display_tweets($twitter_hashtag, array('limit' => 1));
?>

<?php
//twitter members
if (isset($twitter_members)) echo $this->Twitter->display_tweets($twitter_members, array('limit' => 1));
?>

>> Tweet Template:

<div class="tweet">
	<img src="<?php echo $profile_image; ?>" class="tweet_profile_img" style="float:left; margin-right:10px;" />
	<div class="tweet_text"><a href="https://twitter.com/<?php echo $screen_name; ?>" target="_blank">@<?php echo $screen_name; ?></a>
		<p><?php echo $text; ?></p>
		<span class="tweet_timestamp"><?php echo $created_at; ?></span>
	</div>
</div>