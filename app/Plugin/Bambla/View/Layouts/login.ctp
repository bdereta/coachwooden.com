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
		<p>
		
		<div style="text-align:right;">
			<?php if ($logged_in) :	 ?>
				Welcome <?php echo $current_user['first_name'];?>. 
				<?php echo $this->Html->link('Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => false, 'plugin' => 'Bambla')); ?>
			<?php else : ?>
				<?php if ($this->params['action'] != 'login') : ?>
					<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action'=>'login', 'admin' => false, 'plugin' => 'Bambla')); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		
		</p>
		<?php echo $this->fetch('content'); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
