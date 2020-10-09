<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="bambla_container">
			<div class="nav-collapse">
				<?php if (!empty($admin_links)) : ?>
				<ul class="nav pull-left">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-dashboard"></i>Admin Menu <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php foreach($admin_links as $controller) : ?>
								<?php $plugin = in_array($controller, array('Metadata', 'Users')) ? 'Bambla' : false; ?>
								<li><?php echo $this->Html->link(Inflector::humanize(Inflector::underscore($controller)), array('controller' => $controller, 'action'=>'index', 'admin' => true, 'plugin' => $plugin)); ?></li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul>
				<?php endif; ?>
				<ul class="nav pull-right">
					<li><?php echo $this->Html->link('<i class="icon-home"></i> View Site', array('controller'=>'Pages', 'action'=>'home', 'admin'=>false, 'plugin' => false), array('escape' => false)); ?></li>
					<?php if (!empty($logged_in)) : ?>
						<li><?php echo $this->Html->link('<i class="icon-user"></i>Logout',array('controller' => 'Users', 'action'=>'logout', 'admin' => true, 'plugin' => 'Bambla'), array('escape' => false)); ?></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
