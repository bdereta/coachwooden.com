<?php
//twitter account (single user)
//count is optional
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