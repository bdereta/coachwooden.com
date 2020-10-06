<div class="content bottom_padding">
	<div class="page_titles photo">
		<span>The Voice of</span>
		<h1 class="game">COACH JOHN WOODEN</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<?php if (!empty($youtube)) : ?>
		<div class="speak_video">
			<?php echo $this->Youtube->get_content($youtube, array('limit' => 1, 'template' => 'big')); ?>
		</div>
		<div class="clear"></div>
		<div class="video_thumbs_container">
			<?php echo $this->Youtube->get_content($youtube, array('template' => 'thumbs')); ?>
		</div>
	<?php endif; ?>
	<div class="clear"></div>
</div>