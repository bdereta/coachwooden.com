<div class="feed">
	<a href="<?php echo $link; ?>"><?php echo $this->Html->image("Facebook.facebook_avatar.jpg", array('alt' => 'Charlie Kimball', 'width' => 50, 'height' => 50)); ?></a>
	<div class="fb-feed float_right">
		<p class="fb_title">Charlie Kimball</p>
		<?php if($picture) echo $this->Html->image($picture); ?>
		<p><?php echo $message; ?></p>
		<p class="date"><?php echo $created; ?></p>
	</div>
	<div class="clear"></div>
</div>