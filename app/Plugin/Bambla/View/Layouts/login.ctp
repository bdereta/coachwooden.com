<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title>Administration Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	<?php

		echo $this->Html->css(array(
			'Bambla.assets',
			'Bambla.fonts/stylesheet',
		));
		
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
			'Bambla.default'
		));
		 
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="account-container">
	<div class="content clearfix">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
