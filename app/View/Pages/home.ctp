<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('home', array('inline' => false));
?>
<div class="content">
	<?php if (!empty($slides)) : ?>
	<div id="homeslider">
		<div class="hp_slider">
			<?php foreach($slides as $slide) : ?>
				<div class="slide">
					<?php echo $this->Html->image('uploads/'.$slide['Homeslide']['image'], array("class" => "img", "alt" => $slide['Homeslide']['title'])); ?>
					<div class="caption">
						<div class="text">
							<?php echo $slide['Homeslide']['content']; ?>
							<?php if(!empty($slide['Homeslide']['link']) && ($slide['Homeslide']['target'] == '_blank')) : ?>
								<?php echo $this->Html->link('Read More <span class="icon-arrow-right"></span>', $slide['Homeslide']['link'],array('class'=>'btns','escape'=>false,'target'=>'_blank')); ?>
							<?php elseif(!empty($slide['Homeslide']['link']) && ($slide['Homeslide']['target'] == '_self')) : ?>
								<?php echo $this->Html->link('Read More <span class="icon-arrow-right"></span>', array(
									'controller'=>'Pages', 'action'=>$slide['Homeslide']['link']),array('class'=>'btns','escape'=>false)); ?>
							<?php else : ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
	<div class="clear"></div>
	<?php endif; ?>
	<!--News-->
	<?php if(!empty($news)) : ?>
		<div class="half float_left padding">
			<div class="title">
				<h2 class="float_left">Coach in the News</h2>
				<?php echo $this->Html->link('View all News <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'memory_wall_news'),array('class'=>'float_right btns','escape'=>false)); ?>
			</div>
			<ul class="hp_news">
				<? foreach($news as $news) : ?>
					<li class="transition"><div class="date float_left"><?php echo $this->Html->link($this->Time->format('m.d.y', $news['News']['date']), $news['News']['link']); ?></div>
						<div class="link float_left"><?php echo $this->Html->link($news['News']['title'], $news['News']['link'], array('target' =>'_blank')); ?></div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	
	<!--Videos-->
	<div class="half float_right padding">
		<div class="title">
			<h2 class="float_left">Videos of Coach</h2>
			<?php echo $this->Html->link('View all Videos <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'videos'),array('class'=>'float_right btns','escape'=>false)); ?>
		</div>
		<div class="hp_video">
			<iframe width="500" height="310" src="//www.youtube.com/embed/0MM-psvqiG8" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="full sepia transition hp_pyramid">
	<div>
		<h2>Pyramid of Success</h2>
		<?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'pyramid_of_success'), array('class'=>'btns','escape'=>false)); ?>
	</div>
</div>
<div class="full sepia transition hp_memory">
	<div>
		<h2>Memory Wall</h2>
		<?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'memory_wall'), array('class'=>'btns','escape'=>false)); ?>
	</div>
</div>
<div class="content">
	<!--Mcdonalds-->
	<div class="half float_left center padding">
		<?php echo $this->Html->image('hp_mcdonalds.png', array('alt' => 'Mcdonalds All American Game','class'=>'float_right')); ?>
		<?php echo $this->Html->image('decorative_line.png', array('alt' => 'separator')); ?>
		<?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'mcdonalds_all_american_game'),array('class'=>'btns','escape'=>false)); ?>
	</div>
	
	<!--Book-->
	<div class="half float_right">
		<div class="title">
			<h2 class="float_left">Featured Book</h2>
			<?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'bookstore'),array('class'=>'float_right btns','escape'=>false)); ?>
		</div>
		<?php if (!empty($books)) : ?>
			<div id="hpbook">
				<ul class="book_slider">
					<?php foreach($books as $book) : ?>
						<li><?php echo $this->Html->link($this->Html->image('uploads/'.$book['Book']['image'], array("class" => "img", "alt" => $book['Book']['title'])),$book['Book']['amazon_link'], array('target' => '_blank','escape' => false)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</div>
<div class="clear"></div>
<?php if(!empty($quotes)) : ?>
	<div class="full hp_quote">
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_top')); ?>
		<div class="text center">
			<h2>America<span>’</span>s Favorite Coach Wooden Quotes</h2>
			<?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
			<ul class="quote_slider">
				<?php foreach($quotes as $quote) : ?>
					<li><p>"<?php echo $quote['Quote']['info']; ?>"</p></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_bottom')); ?>
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
