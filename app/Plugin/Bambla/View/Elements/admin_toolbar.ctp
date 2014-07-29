<?php /*?><div id="bambla_admin_toolbar">
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
<?php */?>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="nav-collapse">
        <ul class="nav pull-left">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-dashboard"></i>Admin Menu <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?php echo $this->Html->link('Homeslider',array('controller' => 'Users', 'action'=>'temp', 'admin' => false)); ?></li>
              <li><?php echo $this->Html->link('News',array('controller' => 'Users', 'action'=>'temp', 'admin' => false)); ?></li>
              <li><?php echo $this->Html->link('Photo Gallery',array('controller' => 'Users', 'action'=>'temp', 'admin' => false)); ?></li>
              <li><?php echo $this->Html->link('SEO',array('controller' => 'Users', 'action'=>'temp', 'admin' => false)); ?></li>
              <li><?php echo $this->Html->link('Users',array('controller' => 'Users', 'action'=>'temp', 'admin' => false)); ?></li>
            </ul>
          </li>		  
		  </li>
		  <li><?php echo $this->Html->link('<i class="icon-home"></i> View Site', array('controller'=>'StaticPages', 'action'=>'home', 'admin'=>false), array('escape' => false)); ?></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Welcome,  <?php echo $current_user['first_name'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?php echo $this->Html->link('Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => false)); ?></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
