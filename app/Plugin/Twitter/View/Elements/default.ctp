<div class="tweet">
	<img src="<?php echo $profile_image; ?>" class="tweet_profile_img" />
	<div class="tweet_text">
		<span class="tweet_name"><?php echo $name; ?> 
			<a href="https://twitter.com/<?php echo $screen_name; ?>" target="_blank">@<?php echo $screen_name; ?></a>
		</span>
		<br />
		<p><?php echo $text; ?></p>
		<span class="tweet_timestamp"><?php echo $created_at; ?></span>
	</div>
</div>