<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('photo', array('inline' => false));
?>


<div class="content">
	<div class="page_titles photo">
		<span>Photo</span>
		<h1 class="photo">Gallery</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<div id="photo">
		<div class="photo_slider">
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_photo.jpg", array("alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
				<div class="cap_btn"><a class="trigger" href="#">Info</a></div>
				<div class="panel">
					<p class="photo_number"><span>1</span>/20</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
			</div>
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_photo.jpg", array("alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
				<div class="cap_btn"><a class="trigger" href="#">Info</a></div>
				<div class="panel">
					<p class="photo_number"><span>2</span>/20</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>