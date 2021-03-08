<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>The Voice of</span>
                <h1 class="game">COACH JOHN WOODEN</h1>
            </div>
        </div>
    </div>
    <?php if (!empty($youtube)) : ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="speak_vid_top"></div>
                <div class="speak_video_container">
                    <div class="speak_video">
                        <?php echo $this->Youtube->get_content($youtube, array('limit' => 1, 'template' => 'big')); ?>
                    </div>
                </div>
                <div class="speak_vid_bottom"></div>
            </div>
        </div>
        <div class="row video_thumbs_container">
            <?php echo $this->Youtube->get_content($youtube, array('template' => 'thumbs')); ?>
        </div>
    <?php endif; ?>
</div>