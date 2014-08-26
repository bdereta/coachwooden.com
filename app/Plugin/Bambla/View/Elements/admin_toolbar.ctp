<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="bambla_container">
			<div class="nav-collapse">
				<ul class="nav pull-left">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-dashboard"></i>Admin Menu <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Photo Gallery', array('controller' => 'photo_galleries', 'action'=>'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Page Metum', array('controller' => 'Pages', 'action'=>'index', 'admin' => true)); ?></li>
							<li><?php echo $this->Html->link('Users', array('controller' => 'Users', 'action'=>'index', 'admin' => true)); ?></li>
						</ul>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li><?php echo $this->Html->link('<i class="icon-home"></i> View Site', array('controller'=>'StaticPages', 'action'=>'home', 'admin'=>false), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-user"></i>Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => false), array('escape' => false)); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
