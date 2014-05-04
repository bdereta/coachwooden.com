<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>

	<title><?php echo $meta['title']; ?></title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description', $meta['description']);
		echo $this->Html->meta('keywords', $meta['keywords']);

		echo $this->Html->css('Bambla.layout');
		echo $this->Html->css('Bambla.assets');
		echo $this->Html->css('Bambla.fonts/stylesheet');
		echo $this->Html->script('Bambla.ckeditor/ckeditor');
	
		 
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="content_login">
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
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
