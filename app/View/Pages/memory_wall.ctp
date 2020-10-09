<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('memory', array('inline' => false));
$this->Html->css('memory', array('inline' => false));
?>
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
			<?php echo $this->Html->image("temp_memory.jpg", array('alt' => 'John Wooden')); ?>
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
		<?php echo $this->Html->image('be_true.png', array('alt' => 'Be True to Yourself, Johnny')); ?><br /><br />
		<?php echo $this->Html->link('Steve Jamison<span class="quote">\'</span>s trubute to Coach<br><span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'true_to_yourself'),array('class'=>'btns','escape'=>false)); ?>		
	</div>
	<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	<div class="memory_share">
		<h2>Share Your Memory of Coach</h2>
		<?php echo $this->Form->create('ShareMemory', array('id'=>'request_form')); ?>
			<div class="float_left"><?php echo $this->Form->input('name', array('label' => false, 'value' => 'Name')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('email', array('type'=>'email','label' => false,  'value' => 'Email')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('city_state', array('label' => false, 'value' => 'City/State')); ?></div>
			<?php echo $this->Form->input('message', array('label' => false, 'type' => 'textarea', 'value' => 'Your Message')); ?>
			<div class="captcha">
				<?php echo $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha'), array('id' => 'captcha')); ?><br /><br />
				<?php echo $this->Form->input('captcha', array('label' => false, 'value' => 'Security Code')); ?>
			</div>
			<div class="submit_area">
				<?php echo $this->Form->submit('Submit'); ?>
				<p class="submit_text">Send Message</p>
			</div>
			<div class="clear"></div>
		<?php echo $this->Form->end(); ?>
		
	</div>
	<div class="clear"></div>
</div>
<?php if (!empty($comments)) : ?>
<div class="comments bottom_padding">
	<h2 class="float_left">Comments</h2>
	<p class="float_right"><span>452</span>Memories Shared</p>
	<div class="clear"></div>
	<ul id="results">
		<?php foreach($comments as $comment) : ?>
			<li>
				<span class="date">On <?php echo $this->Time->format('n/d/Y', $comment['ShareMemory']['created']); ?></span>
				<h4><?php echo $comment['ShareMemory']['name']; ?> <span>from</span> <?php echo $comment['ShareMemory']['city_state']; ?> <span>shared</span></h4>
				<p><?php echo $comment['ShareMemory']['message']; ?></p>
			</li>
		<?php endforeach; ?>
	</ul>
    <div id="loadMore" class="btns transition">Load more</div>
</div>
<?php endif; ?>
