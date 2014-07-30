<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title><?php echo $meta['title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', $meta['description']);
		echo $this->Html->meta('keywords', $meta['keywords']);

		echo $this->Html->css(array(
			'Bambla.assets',
			'Bambla.fonts/stylesheet',
			'//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
		));

		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
			'Bambla.ckeditor/ckeditor',
			'Bambla.main',
			//'Bambla.excanvas.min','Bambla.bootstrap','Bambla.base'
		));

		 
		echo $this->fetch('script');
	?>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<?php echo $this->element('Bambla.admin_toolbar'); ?>
	<div id="bambla_container">
		<div id="bambla_content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
