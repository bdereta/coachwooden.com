<div class="tweet">
	<img src="<?php echo $profile_image; ?>" class="tweet_profile_img" style="float:left; margin-right:10px;" />
	<div class="tweet_text"><a href="https://twitter.com/<?php echo $screen_name; ?>" target="_blank">@<?php echo $screen_name; ?></a>
		<p><?php echo $text; ?></p>
		<span class="tweet_timestamp"><?php echo $created_at; ?></span>
	</div>
</div>