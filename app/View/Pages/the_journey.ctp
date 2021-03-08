<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('jquery.iosslider.min', array('inline' => false));
$this->Html->script('journey', array('inline' => false));
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page_titles">
                <span>The</span>
                <h1>Journey</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="game_text">
                <div class="center joy_title">
                    <h2>The Joy of the Journey</h2>
                </div>
                <?php echo $this->Bambla->fetchSection(1); ?>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($quotes)) : ?>
    <div class="full hp_quote relative">
        <div class="line_border line_top"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="text">
                        <h2>These historic records include<span>:</span></h2>
                        <?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
                        <ul class="quote_slider">
                            <?php foreach($quotes as $quote) : ?>
                                <li><p>"<?php echo $quote['Quote']['info']; ?>"</p></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="line_border line_bottom"></div>
    </div>
<?php endif; ?>
<?php if (!empty($timelines)) : ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="center joy_title">
                    <h2>Coach<span>'</span>s Timeline</h2>
                    <span>Brief Professional and Personal History</span><br><br>
                    <?php echo $this->Html->image('decoration_quotes_light.png', array('alt' => 'separator', "class"=>"img-responsive")); ?>
                </div>
                <div class="center journey_instructions">
                    <p>Drag left and right to scroll through timeline</p>
                    <?php echo $this->Html->image('journey_hand.png', array('alt' => 'Drag left and right')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="iosSlider_container">
        <div class ="iosSlider">
            <div class ="slider">
                <?php foreach($timelines as $timeline) : ?>
                    <div class ="item">
                        <div class="slider_title"><h3><?php echo $timeline['Timeline']['date']; ?></h3></div>
                        <?php if(!empty($timeline['Timeline']['image'])) : ?>
                            <?php echo $this->Html->image('uploads/'.$timeline['Timeline']['image'], array('alt' => $timeline['Timeline']['date'], "class"=>"img-responsive")); ?>
                        <?php endif; ?>
                        <?php echo $timeline['Timeline']['description']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>