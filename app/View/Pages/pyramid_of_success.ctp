<?php
$this->Html->css('jquery.fullPage', array('inline' => false));
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.slimscroll.min', array('inline' => false));
$this->Html->script('jquery.fullPage', array('inline' => false));
$this->Html->script('jquery.bxslider.pyramid', array('inline' => false));
$this->Html->script('pyramid', array('inline' => false));
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>Pyramid of</span>
                <h1>Success</h1>
            </div>
        </div>
    </div>
</div>

<!--Desktop Pyramid-->
<div id="fullpage">
    <div class="section " id="section0">
        <div class="slide">
            <div id="pyramid">
                <div class="pyramid_print">
                    <?php echo $this->Html->link($this->Html->image("pyramid_printable.png", array("alt" => "Printable Pyramid")),'/files/PyramidThinkingSuccess.jpg', array('target' => '_blank','escape' => false)); ?>
                    <span>download</span>
                    <p>Printable version</p>
                </div>
                <h2>Success</h2>
                <div class="full first">
                    <div class="large_blocks transition fp-controlArrow fp-next btn_0">
                        <p>Competitive Greatness</p>
                    </div>
                </div>
                <div class="full">
                    <ul>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_1">
                                <p>Poise</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_2">
                                <p>Confidence</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="full">
                    <ul>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_3">
                                <p>Condition</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_4">
                                <p>Skill</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_5">
                                <p>Team Spirit</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="full">
                    <ul>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_6">
                                <p>Self-Control</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_7">
                                <p>Alertness</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_8">
                                <p>Initiative</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_9">
                                <p>Intentness</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="full">
                    <ul>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_10">
                                <p>Industriousness</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_11">
                                <p>Friendship</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_12">
                                <p>Loyalty</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_13">
                                <p>Cooperation</p>
                            </div>
                        </li>
                        <li>
                            <div class="large_blocks transition fp-controlArrow fp-next btn_14">
                                <p>Enthusiasm</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3>Click a block of the Pyramid for details</h3>
            </div>
            <?php if(!empty($blocks)) : ?>
                <div class="slide">
                    <div id="pyramid_slider">
                        <div class="bx-pager">
                            <?php foreach($blocks as $block_nav) : ?>
                                <a data-slide-index="<?php echo $block_nav['Pyramid']['id'] -1; ?>" href=""></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="btns pyramid_back fp-controlArrow fp-prev"><span class="icon-arrow-left"></span> Back to Pyramid</div>
                        <?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'Separator')); ?>
                        <ul class="pyramid_slider">
                            <?php foreach($blocks as $block) : ?>
                                <li>
                                    <h2><?php echo $block['Pyramid']['name']; ?></h2>
                                    <?php if(!empty($block['Pyramid']['image'])) : ?>
                                        <div class="pyramid_image float_left">
                                            <?php echo $this->Html->image('uploads/'.$block['Pyramid']['image'], array('alt' => $block['Pyramid']['name'])); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pyramid_text float_right">
                                        <?php echo $block['Pyramid']['content']; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--Mobile Pyramid-->
<?php if(!empty($blocks)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="pyramid_slider" class="mobile">
                    <div class="pyramid_print_mb">
                        <p>
                            <a target="_blank" href="/files/PyramidThinkingSuccess.jpg">Download Printable Version</a>
                        </p>
                    </div>
                    <div class="bx-pager">
                        <?php foreach($blocks as $block_nav) : ?>
                            <a data-slide-index="<?php echo $block_nav['Pyramid']['id'] -1; ?>" href=""></a>
                        <?php endforeach; ?>
                    </div>
                    <?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'Separator')); ?>
                    <ul class="pyramid_slider_mb">
                        <?php foreach($blocks as $block) : ?>
                            <li>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2><?php echo $block['Pyramid']['name']; ?></h2>
                                    </div>
                                </div>
                                <div class="row slider_content">
                                    <?php if(!empty($block['Pyramid']['image'])) : ?>
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="pyramid_image">
                                                <?php echo $this->Html->image('uploads/'.$block['Pyramid']['image'], array('alt' => $block['Pyramid']['name'], 'class' => 'img-responsive')); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-xs-12 col-sm-8">
                                        <div class="pyramid_text">
                                            <?php echo $block['Pyramid']['content']; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
