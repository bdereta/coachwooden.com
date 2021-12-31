<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="video_thumbs relative">
        <div class="img transition">
            <?php echo $this->Html->link(
                $this->Html->image($thumbnail_2, array('alt' => 'title', 'class' => 'img-responsive')),
                'javascript:yt_load_video(\''.$content.'\')',
                array('escape'=>false, 'class' => 'transition')
            ); ?>
            <?php echo $this->Html->image('btn_video.png', array('class' => 'btn_play transition')); ?>
        </div>
        <p class="transition"><?php echo $title; ?></p>
    </div>
</div>