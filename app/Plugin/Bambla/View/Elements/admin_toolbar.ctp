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
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Admin Menu</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
		  <li><a href="./"><i class="icon-dashboard"></i> Dashboard</a></li>
		  <li><a href="#"><i class="icon-home"></i> View Site</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Welcome,  <?php echo $current_user['first_name'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
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
