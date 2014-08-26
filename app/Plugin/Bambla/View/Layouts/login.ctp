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
				<?php echo $this->Html->link('Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => false)); ?>
			<?php else : ?>
				<?php if ($this->params['action'] != 'login') : ?>
					<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action'=>'login', 'admin' => false )); ?>
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
