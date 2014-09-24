<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('memory', array('inline' => false));
?>
<style>
#wrapper { background:url(./img/bg_top_clouds.jpg) top center no-repeat; }
</style>
<div class="content center">
	<div class="page_titles photo">
		<span>Memory</span>
		<h1 class="photo">Wall</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div id="memory" class="relative ">
		<?php echo $this->Html->image('memory_left.png', array('class' => 'memory_left')); ?>
		<?php echo $this->Html->image('memory_right.png', array('class' => 'memory_right')); ?>
		<div class="top_left"></div>
		<div class="top_right"></div>
		<div class="bottom_left"></div>
		<div class="bottom_right"></div>
		<div class="memory relative">
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_memory.jpg", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
			</div>
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_memory.jpg", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
			</div>
		</div>
	</div>
	<?php echo $this->Html->image('memory_decorative_line.png', array('alt' => 'separator')); ?>
	<div class="memory_textbox">
		<?php echo $this->Bambla->fetchSection(1); ?>
	</div>
	<div class="walton_quote relative float_left">
		<?php echo $this->Html->image('journey_photo.png', array('alt' => 'Bill Walton with Coach Wooden','class'=>'memory_photo')); ?>
		<?php echo $this->Html->image('memory_line.png', array('alt' => 'separator')); ?>
		<p>“I  thank John Wooden every day for all his selfless gifts, his lessons, his time, his vision and especially his patience.</p>
		<h3>This is why we call him coach.”</h3>
		<?php echo $this->Html->image('memory_line.png', array('alt' => 'separator')); ?><br /><br />
		<?php echo $this->Html->image('walton_signature.png', array('alt' => 'Bill Walton')); ?>
	</div>
	<div class="float_right last_visit_container">
		<?php echo $this->Html->image('last_visit.png', array('alt' => 'My Last Visith with Coach')); ?><br /><br />
		<?php echo $this->Html->link('Steve Jamisons trubute to Coach<br><span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'last_words'),array('class'=>'btns','escape'=>false)); ?>		
	</div>
	<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	<div class="memory_share">
		<h2>Share Your Memory of Coach</h2>
		<?php echo $this->Form->create('RequestAppearance', array('id'=>'request_form')); ?>
			<div class="float_left"><?php echo $this->Form->input('name', array('label' => false, 'value' => 'Name')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('email', array('type'=>'email','label' => false,  'value' => 'Email')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('city_state', array('label' => false, 'value' => 'City/State')); ?></div>
			<?php echo $this->Form->input('message', array('label' => false, 'type' => 'textarea', 'value' => 'Your Message')); ?>
			<div class="submit_area">
				<?php echo $this->Form->submit('Submit'); ?>
				<p class="submit_text">Send Message</p>
			</div>
			<div class="clear"></div>
		<?php echo $this->Form->end(); ?>
		
	</div>
	<div class="clear"></div>
</div>
<div class="comments">
	<h2 class="float_left">Comments</h2>
	<p class="float_right"><span>452</span>Memories Shared</p>
	<div class="clear"></div>
	<ul>
		<li>
			<span class="date">On 10/14/2013</span>
			<h4>Robb Trexler <span>from</span> San Diego, CA <span>shared</span></h4>
			<p>Happy Birthday, Coach! I know you are in the Ultimate place to celebrate your Birthday and as a bonus, with your beloved wife Nell. I will never forget what you did while here on earth, not only as a basketball coach, but as a great man! You teachings live on forever in so many hearts and minds! Happy, Happy Birthday! You are sorely missed by the many you have touched. God Bless you and Nell</p>
			<p>- Robb</p>
		</li>
		<li>
			<span class="date">On 10/14/2013</span>
			<h4>Robb Trexler <span>from</span> San Diego, CA <span>shared</span></h4>
			<p>Happy Birthday, Coach! I know you are in the Ultimate place to celebrate your Birthday and as a bonus, with your beloved wife Nell. I will never forget what you did while here on earth, not only as a basketball coach, but as a great man! You teachings live on forever in so many hearts and minds! Happy, Happy Birthday! You are sorely missed by the many you have touched. God Bless you and Nell</p>
			<p>- Robb</p>
		</li>
		<li>
			<span class="date">On 10/14/2013</span>
			<h4>Robb Trexler <span>from</span> San Diego, CA <span>shared</span></h4>
			<p>Happy Birthday, Coach! I know you are in the Ultimate place to celebrate your Birthday and as a bonus, with your beloved wife Nell. I will never forget what you did while here on earth, not only as a basketball coach, but as a great man! You teachings live on forever in so many hearts and minds! Happy, Happy Birthday! You are sorely missed by the many you have touched. God Bless you and Nell</p>
			<p>- Robb</p>
		</li>
		<li>
			<span class="date">On 10/14/2013</span>
			<h4>Robb Trexler <span>from</span> San Diego, CA <span>shared</span></h4>
			<p>Happy Birthday, Coach! I know you are in the Ultimate place to celebrate your Birthday and as a bonus, with your beloved wife Nell. I will never forget what you did while here on earth, not only as a basketball coach, but as a great man! You teachings live on forever in so many hearts and minds! Happy, Happy Birthday! You are sorely missed by the many you have touched. God Bless you and Nell</p>
			<p>- Robb</p>
		</li>
	</ul>
</div>
