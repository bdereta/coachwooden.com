<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->css('/files/fancybox/jquery.fancybox', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('jquery.accordion', array('inline' => false));
$this->Html->script('jquery.easing.1.3', array('inline' => false));
$this->Html->script('award', array('inline' => false));
$this->Html->script('/files/fancybox/jquery.fancybox', array('inline' => false));
?>
<div class="content">
	<div class="page_titles">
		<span>John</span>
		<h1 class="award">Wooden Award</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<div class="award_text">
		<?php echo $this->Html->image('award.png', array('alt' => 'The Los Angeles Athletes Club trophy', 'class'=>'float_left')); ?>
		<?php echo $this->Bambla->fetchSection(1); ?>
	</div>
	<div class="clear"></div>
</div>
<?php if(!empty($quotes)) : ?>
	<div class="full facts">
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_top')); ?>
		<div class="text center">
			<h2>Award Facts</h2>
			<?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator')); ?>
			<ul class="award_facts">
				<?php foreach($quotes as $quote) : ?>
					<li><p>"<?php echo $quote['Quote']['info']; ?>"</p></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php echo $this->Html->image('line_stipes.jpg', array('class' => 'line_bottom')); ?>
	</div>
<?php endif; ?>


<div class="clear"></div>
<div class="content">
	<?php if(!empty($photos)) : ?>
		<div class="award_photos_container">
			<?php foreach($photos as $photo) : ?>
				<?php echo $this->Html->link($this->Html->image("uploads/".$photo['AwardPhoto']['image_thumb'], array("alt" => $photo['AwardPhoto']['name'])),'/img/uploads/'.$photo['AwardPhoto']['image_large'], array('class' => 'fancybox', 'data-fancybox-group' => 'gallery', 'escape' => false)); ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<div class="clear"></div>
	<?php if(!empty($winners)) : ?>
		<div class="award_text center">
			<h2>Winners List</h2>
			<?php echo $this->Bambla->fetchSection(2); ?>
		</div>
		<div id="st-accordion" class="st-accordion">
			<ul>
				<?php foreach($winners as $winner_category) : ?>
				<li>
					<a href="#"><span class="st-arrow">&nbsp;</span><?php echo $winner_category['WinnerCategory']['name']; ?>s Winners</a>
					<div class="st-content">
						<table cellpadding="0" cellspacing="0" class="table_header">
							<tr>
								<th width="300">Year</th>
								<th width="400">Player</th>
								<th>School</th>
							</tr>
						</table>
						<table cellpadding="0" cellspacing="0" class="table_bg">
							<?php foreach($winner_category['Winner'] as $winner) : ?>
								<tr>
									<td width="300"><?php echo $winner['year']; ?></td>
									<td width="400"><?php echo $winner['name']; ?></td>
									<td><?php echo $winner['school']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>
