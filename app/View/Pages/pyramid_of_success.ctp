<?php
$this->Html->css('jquery.fullPage', array('inline' => false));
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js', array('inline' => false));
$this->Html->script('jquery.slimscroll.min', array('inline' => false));
$this->Html->script('jquery.fullPage', array('inline' => false));
$this->Html->script('jquery.bxslider.pyramid', array('inline' => false));
$this->Html->script('pyramid', array('inline' => false));
?>
<div class="content bottom_padding">
	<div class="page_titles photo">
		<span>Pyramid of</span>
		<h1 class="photo">Success</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
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
							<div id="bx-pager">
								<?php foreach($blocks as $block_nav) : ?>
									<a data-slide-index="<?php echo $block_nav['Pyramid']['id'] -1; ?>" href=""></a>
								<?php endforeach; ?>
							</div>
							<div class="btns pyramid_back fp-controlArrow fp-prev"><span class="icon-arrow-left"></span> &nbsp; Back to Pyramid</div>
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
										<div class="pyramid_text">
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
	<div class="clear"></div>
</div>