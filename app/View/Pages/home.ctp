<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('home', array('inline' => false));
?>


<div class="content">
	<div id="homeslider">
		<div class="hp_slider">
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_slider.png", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
				<div class="caption">
					<div class="text">
						<p>Welcome to the official website of Coach John Wooden.</p>
						<span>Sponsored By </span><?php echo $this->Html->image('logo_mcdonalds.png', array('alt' => 'Mcdonalds')); ?>
					</div>
				</div>
			</div>
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_slider.png", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
				<div class="caption">
					<div class="text">
						<p>Welcome to the official website of Coach John Wooden.</p>
						<span>Sponsored By </span><?php echo $this->Html->image('logo_mcdonalds.png', array('alt' => 'Mcdonalds')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	
	<!--News-->
	<div class="half float_left padding">
		<div class="title">
			<h2 class="float_left">Coach in the News</h2>
			<?php echo $this->Html->link('View all News <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'news'),array('class'=>'float_right btns','escape'=>false)); ?>
		</div>
		<ul class="hp_news">
			<li class="transition"><div class="date float_left"><?php echo $this->Html->link('06.19.14', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
				<div class="link float_left"><?php echo $this->Html->link('Year 1 to Year 2: A chat with UCLA coach Steve Alford', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
			</li>
			<li class="transition"><div class="date float_left"><?php echo $this->Html->link('06.19.14', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
				<div class="link float_left"><?php echo $this->Html->link('Year 1 to Year 2: A chat with UCLA coach Steve Alford', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
			</li>
			<li class="transition"><div class="date float_left"><?php echo $this->Html->link('06.19.14', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
				<div class="link float_left"><?php echo $this->Html->link('Year 1 to Year 2: A chat with UCLA coach Steve Alford', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
			</li>
			<li class="transition"><div class="date float_left"><?php echo $this->Html->link('06.19.14', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
				<div class="link float_left"><?php echo $this->Html->link('Year 1 to Year 2: A chat with UCLA coach Steve Alford', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
			</li>
			<li class="transition"><div class="date float_left"><?php echo $this->Html->link('06.19.14', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
				<div class="link float_left"><?php echo $this->Html->link('Year 1 to Year 2: A chat with UCLA coach Steve Alford', array('controller' => 'StaticPages', 'action' => 'news')); ?></div>
			</li>
		</ul>
	</div>
	
	<!--Videos-->
	<div class="half float_right padding">
		<div class="title">
			<h2 class="float_left">Videos of Coach</h2>
			<?php echo $this->Html->link('View all Videos <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'videos'),array('class'=>'float_right btns','escape'=>false)); ?>
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
		<?php echo $this->Html->link('Learn More <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'pyramid'), array('class'=>'btns','escape'=>false)); ?>
	</div>
</div>
<div class="full sepia transition hp_memory">
	<div>
		<h2>Memory Wall</h2>
		<?php echo $this->Html->link('Learn More <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'memory'), array('class'=>'btns','escape'=>false)); ?>
	</div>
</div>
<div class="content">
	<!--Mcdonalds-->
	<div class="half float_left center padding">
		<?php echo $this->Html->image('hp_mcdonalds.png', array('alt' => 'Mcdonalds All American Game','class'=>'float_right')); ?>
		<?php echo $this->Html->image('decorative_line.png', array('alt' => 'separator')); ?>
		<?php echo $this->Html->link('Learn More <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'news'),array('class'=>'btns','escape'=>false)); ?>
	</div>
	
	<!--Book-->
	<div class="half float_right">
		<div class="title">
			<h2 class="float_left">Featured Book</h2>
			<?php echo $this->Html->link('Learn More <span class="icon-uniE601"></span>', array('controller' => 'StaticPages', 'action' => 'videos'),array('class'=>'float_right btns','escape'=>false)); ?>
		</div>
		<?php if (!empty($books)) : ?>
			<div id="hpbook">
				<ul class="book_slider">
					<?php foreach($books as $book) : ?>
						<li><?php echo $this->Html->link($this->Html->image('uploads/'.$book['Book']['image_thumb'], array("class" => "img", "alt" => $book['Book']['title'])),$book['Book']['amazon_link'], array('target' => '_blank','escape' => false)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</div>
<div class="clear"></div>
<div class="full hp_quote">
	<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_top')); ?>
	<div class="text center">
		<h2>Inspirational Quotes from Coach</h2>
		<?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
		<ul class="quote_slider">
			<li><p>"Be more concerned with your character than your reputation, because your character is what you really are, while your reputation is merely what others think you are."</p></li>
			<li><p>"Be more concerned with your character than your reputation, because your character is what you really are, while your reputation is merely what others think you are."</p></li>
			<li><p>"Be more concerned with your character than your reputation, because your character is what you really are, while your reputation is merely what others think you are."</p></li>
			<li><p>"Be more concerned with your character than your reputation, because your character is what you really are, while your reputation is merely what others think you are."</p></li>
			<li><p>"Be more concerned with your character than your reputation, because your character is what you really are, while your reputation is merely what others think you are."</p></li>
		</ul>
	</div>
	<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_bottom')); ?>
</div>
<div id="content">
	<div id="parallax-bg">
		<?php echo $this->Html->image('hp_medal.png', array('id' => 'hp-1')); ?>
		<?php echo $this->Html->image('hp_clipboard.png', array('id' => 'hp-2')); ?>
		<?php echo $this->Html->image('hp_basketball.png', array('id' => 'hp-3')); ?>
	</div>
</div>
