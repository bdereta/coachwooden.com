<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('jquery.iosslider.min', array('inline' => false));
$this->Html->script('journey', array('inline' => false));
?>


<div class="content">
	<div class="page_titles photo">
		<span>The</span>
		<h1 class="photo">Journey</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<div class="game_text">
		<div class="center joy_title">
			<h2>The Joy of the Journey</h2>
			<span>By Steve Jamison</span>
		</div>
		<?php echo $this->Bambla->fetchSection(1); ?>
	</div>
	<div class="clear"></div>
</div>
<?php if(!empty($quotes)) : ?>
	<div class="full records">
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_top')); ?>
		<div class="text center">
			<h2>These historic records include<span>:</span></h2>
			<?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
			<ul class="history_records">
				<?php foreach($quotes as $quote) : ?>
					<li><p>"<?php echo $quote['Quote']['info']; ?>"</p></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_bottom')); ?>
	</div>
<?php endif; ?>
<?php if (!empty($timelines)) : ?>
	<div class="content bottom_padding">
		<div class="center joy_title">
			<h2>Coach<span>'</span>s Timeline</h2>
			<span>Brief Professional and Personal History</span><br><br>
			<?php echo $this->Html->image('decoration_quotes_light.png', array('alt' => 'separator')); ?>
		</div>
		<div class="center journey_instructions">
			<p>Drag left and right to scroll through timeline</p>
			<?php echo $this->Html->image('journey_hand.png', array('alt' => 'Drag left and right')); ?>
		</div>
	</div>
	<div class="iosSlider_container">
		<div class ="iosSlider">
			<div class ="slider">
				<?php foreach($timelines as $timeline) : ?>
					<div class ="item">
						<h3><?php echo $timeline['Timeline']['date']; ?></h3>
						<?php echo $this->Html->image($timeline['Timeline']['image'], array('alt' => $timeline['Timeline']['date'])); ?>
						<p><?php echo $timeline['Timeline']['description']; ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>