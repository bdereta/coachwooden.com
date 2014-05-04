<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title><?php echo $meta['title']; ?></title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', $meta['description']);
		echo $this->Html->meta('keywords', $meta['keywords']);

		echo $this->Html->css(array(
			'Bambla.layout',
			'Bambla.assets',
			'Bambla.fonts/stylesheet'
		));

		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',
			'Bambla.ckeditor/ckeditor',
			'Bambla.main'
		));

		 
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->element('Bambla.admin_toolbar'); ?>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
