<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.scrapbook', array('inline' => false));
$this->Html->script('photo', array('inline' => false));
?>


<div class="content bottom_padding">
	<div class="page_titles photo">
		<span>Scrap</span>
		<h1 class="photo">Book</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<?php if (!empty($galleries)) : ?>
		<div id="photo">
			<div class="top_left"></div>
			<div class="top_right"></div>
			<div class="bottom_left"></div>
			<div class="bottom_right"></div>
			<div class="photo_slider">
				<?php foreach($galleries as $gallery) : ?>
					<div class="slide">
						<?php echo $this->Html->image('uploads/'.$gallery['Scrapbook']['image'], array('alt' => $gallery['Scrapbook']['title'])); ?>
						<div class="cap_btn"><a class="trigger" href="#">Info</a></div>
						<div class="panel">
							<p class="photo_number"><span><?php echo $gallery['Scrapbook']['id']; ?></span>/<?php echo $photo_totals; ?></p>
							<?php echo $gallery['Scrapbook']['content']; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="clear"></div>
</div>