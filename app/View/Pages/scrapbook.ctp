<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('photo', array('inline' => false));
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>Scrap</span>
                <h1>Book</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php if (!empty($galleries)) : ?>
                <div id="photo">
                    <div class="top_left"></div>
                    <div class="top_right"></div>
                    <div class="bottom_left"></div>
                    <div class="bottom_right"></div>
                    <div class="photo_slider">
                        <?php foreach($galleries as $gallery) : ?>
                            <div class="slide">
                                <?php echo $this->Html->image('uploads/'.$gallery['Scrapbook']['image'], array('alt' => $gallery['Scrapbook']['title'], 'class' => 'img-responsive')); ?>
                                <div class="bx_panel">
                                    <p class="photo_number"><span><?php echo $gallery['Scrapbook']['id']; ?></span>/<?php echo $photo_totals; ?></p>
                                    <?php echo $gallery['Scrapbook']['content']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
