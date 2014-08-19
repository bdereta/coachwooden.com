<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title><?php echo $meta['title']; ?></title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', $meta['description']);
		echo $this->Html->meta('keywords', $meta['keywords']);

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
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
