<div class="video_thumbs relative transition">
	<?php echo $this->Html->link(
        $this->Html->image($thumbnail_1, array('class'=>'img float_left', 'alt' => 'title')),
        'javascript:yt_load_video(\''.$content.'\')',
        array('escape'=>false, 'class' => 'transition')
    ); ?>
	<?php echo $this->Html->image('btn_video.png', array('class' => 'btn_play')); ?>
	<p class="transition"><?php echo $title; ?></p>
</div>