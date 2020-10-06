<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title>Image Cropper</title>

	<?php
		echo $this->Html->css('Bambla.assets');
		echo $this->Html->css('Bambla.fonts/stylesheet');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		echo $this->Html->css('Bambla./js/cropper/css/imgareaselect-default'); 
		echo $this->Html->css('Bambla./js/cropper/css/imgareaselect-animated'); 
		echo $this->Html->script('Bambla.cropper/js/jquery.imgareaselect.min'); 
		 
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
</body>
</html>
