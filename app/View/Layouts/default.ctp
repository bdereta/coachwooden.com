<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $meta['title']; ?></title>
	<?php
		//meta
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', $meta['description']);
		echo $this->Html->meta('keywords', $meta['keywords']); 
		//css
		echo $this->Html->css(array(
			'Bambla.assets',
			'default'
		));
		//js
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js',
			'default'
		));
		//page specific
		echo $scripts_for_layout;
	?>
</head>
<body>
	<?php if ($is_admin) echo $this->element('Bambla.admin_toolbar'); ?>
	<?php echo $this->Session->flash(); ?>
	<layout>
	<?php echo $this->fetch('content'); ?>		
	</layout>
</body>
</html>
