<div id="bambla_admin_toolbar">
	<div class="bambla_floatl" style="display:table-cell">
		<?php echo $this->Html->link('Admin Dashboard',array('controller'=>'pages','action'=>'index', 'admin'=>true)); ?>
		&nbsp;|&nbsp;
		<?php echo $this->Html->link('Front End Website',array('controller'=>'StaticPages','action'=>'home', 'admin'=>false)); ?>
	</div>
	<div class="bambla_floatr" style="display:table-cell">
		<?php if ($logged_in) :	 ?>
			Welcome,  <?php echo $current_user['first_name'];?> |  
			<?php echo $this->Html->link('Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => false)); ?>
		<?php else : ?>
			<?php if ($this->params['action'] != 'login') : ?>
				<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action'=>'login', 'admin' => false )); ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="bambla_clear"></div>
</div>