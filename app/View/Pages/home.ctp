<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('home', array('inline' => false));
?>

<div class="container">
	<?php if (!empty($slides)) : ?>
	<div id="homeslider">
        <div class="row">
            <div class="col-xs-12">
                <div class="hp_slider">
                    <?php foreach($slides as $slide) : ?>
                        <div class="slide">
                            <?php echo $this->Html->image('uploads/'.$slide['Homeslide']['image'], array("class" => "img", "alt" => $slide['Homeslide']['title'])); ?>
                            <div class="caption">
                                <div class="text">
                                    <?php echo $slide['Homeslide']['content']; ?>
                                    <?php if(!empty($slide['Homeslide']['link']) && ($slide['Homeslide']['target'] == '_blank')) : ?>
                                        <?php echo $this->Html->link('Read More <span class="icon-arrow-right"></span>', $slide['Homeslide']['link'], array('class'=>'btns','escape'=>false,'target'=>'_blank')); ?>
                                    <?php elseif(!empty($slide['Homeslide']['link']) && ($slide['Homeslide']['target'] == '_self')) : ?>
                                        <?php echo $this->Html->link('Read More <span class="icon-arrow-right"></span>', array(
                                            'controller'=>'Pages', 'action'=>$slide['Homeslide']['link']),array('class'=>'btns','escape'=>false)); ?>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="photographer">
                                <?php if(!empty($slide['Homeslide']['photographer'])) : ?>
                                    <?php echo $slide['Homeslide']['photographer']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <div class="hp_news_vid">
        <div class="row">
            <!--News-->
            <?php if(!empty($news)) : ?>
                <div class="col-xs-12 col-md-6">
                    <div class="title">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <h2>Coach in the News</h2>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $this->Html->link('View all News <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'news'),array('class'=>'float_right btns','escape'=>false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <ul class="hp_news">
                        <? foreach($news as $news) : ?>
                            <li class="transition">
                                <div class="date col-xs-2 col-sm-3 col-md-2"><?php echo $this->Html->link($this->Time->format('m.d.y', $news['News']['date']), $news['News']['link']); ?></div>
                                <div class="link col-xs-10 col-sm-9 col-md-10"><?php echo $this->Html->link($news['News']['title'], $news['News']['link'], array('target' =>'_blank')); ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    </div>
                </div>
            <?php endif; ?>
           <!--Videos-->
            <div class="col-xs-12 col-md-6">
                <div class="title">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8">
                            <h2 class="float_left">Videos of Coach</h2>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <?php echo $this->Html->link('View all Videos <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'favorite_maxims'),array('class'=>'float_right btns','escape'=>false)); ?>
                        </div>
                    </div>
                </div>
                <div class="hp_video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/0MM-psvqiG8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sepia transition hp_pyramid" onClick="document.location.href = 'pyramid_of_success'">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="text full">
                    <h2>Pyramid of Success</h2>
                    <?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'pyramid_of_success'), array('class'=>'btns','escape'=>false)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sepia transition hp_memory" onClick="document.location.href = 'memory_wall'">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="text full">
                    <h2>Memory Wall</h2>
                    <?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'memory_wall'), array('class'=>'btns','escape'=>false)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<!--Book-->
    <div class="row">
        <div class="col-xs-12">
            <div class="title long">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h2 class="float_left">Featured Book</h2>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'bookstore'),array('class'=>'float_right btns','escape'=>false)); ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($books)) : ?>
                <div id="hpbook">
                    <ul class="book_slider">
                        <?php foreach($books as $book) : ?>
                            <li><?php echo $this->Html->link($this->Html->image('uploads/'.$book['Book']['image'], array("class" => "img", "alt" => $book['Book']['title'])), $book['Book']['amazon_link'], array('target' => '_blank','escape' => false)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if(!empty($quotes)) : ?>
	<div class="full hp_quote relative">
        <div class="line_border line_top"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text">
                        <h2>America<span>’</span>s Favorite Coach Wooden Quotes</h2>
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
<div class="content bottom_padding">
	<div id="parallax-bg">
		<?php echo $this->Html->image('hp_medal.png', array('id' => 'hp-1')); ?>
		<?php echo $this->Html->image('hp_clipboard.png', array('id' => 'hp-2')); ?>
		<?php echo $this->Html->image('hp_basketball.png', array('id' => 'hp-3')); ?>
	</div>
</div>
<div class="clear"></div>
