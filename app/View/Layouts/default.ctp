<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo (!empty($meta['title'])) ? $meta['title'] : NULL; ?></title>
	<?php
		//meta
		if (!empty($meta)) {
			echo $this->Html->meta('icon');
			echo $this->Html->meta('description', $meta['description']);
			echo $this->Html->meta('keywords', $meta['keywords']); 
		}
		//css
		echo $this->Html->css(array(
			'Bambla.assets',
			'Bambla.fonts/stylesheet',
			'fonts/stylesheet',
			'default'
		));
		//js
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js',
			'default'
		));
		//page specific
		echo $scripts_for_layout;
	?>
</head>
<body>
	<?php if (isset($is_admin) && $is_admin) echo $this->element('Bambla.admin_toolbar'); ?>
	<?php echo $this->Session->flash(); ?>
	<div id="wrapper">
		<div id="container" class="relative">
			<?php echo $this->Html->image('top_whistle.png', array('alt' => 'whistle','class' => 'whistle')); ?>
			<header>
				<div class="content relative">
					<?php echo $this->Html->image("top_logo.jpg", array( "alt" => "Coach Wooden Logo", "class"=>"top_logo", 'url' => array('controller' => 'StaticPages', 'action' => '/'))); ?>
					<div class="main_nav float_right">
						<ul>
							<li><p>the</p><?php echo $this->Html->link('Journey', array('controller' => 'StaticPages', 'action' => 'the_journey')); ?></li>
							<li><p>memory</p><?php echo $this->Html->link('Wall', array('controller' => 'StaticPages', 'action' => 'memory_wall')); ?></li>
							<li><p>bill walton</p><?php echo $this->Html->link('Speaks', array('controller' => 'StaticPages', 'action' => 'bill_walton_speaks')); ?></li>
							<li><p>pyramid of</p><?php echo $this->Html->link('Success', array('controller' => 'StaticPages', 'action' => 'pyramid_of_success')); ?></li>
							<li><p>coach's</p><?php echo $this->Html->link('bookstore', array('controller' => 'StaticPages', 'action' => 'coach_bookstore')); ?></li>
							<li><p>mcdonald's</p><?php echo $this->Html->link('all american', array('controller' => 'StaticPages', 'action' => 'mcdonalds_all_american_game')); ?></li>
							<li><p>scrap</p><?php echo $this->Html->link('book', array('controller' => 'StaticPages', 'action' => 'scrapbook')); ?></li>
							<li><p>favorite</p><?php echo $this->Html->link('maxims', array('controller' => 'StaticPages', 'action' => 'favorite_maxims')); ?></li>
							<li><p>wooden</p><?php echo $this->Html->link('award', array('controller' => 'StaticPages', 'action' => 'wooden_award')); ?></li>
						</ul>
					</div>
				</div>
			</header>
			<?php echo $this->fetch('content'); ?>
			<div class="full hp_quote2">
				<div class="caption">
					<div class="text">
						<p>"Success <br>is peace of <br>mind which is a <br>direct result of <br>self-satisfaction in <br>knowing you made the <br>effort to become the best you <br>are capable of becoming."</p>
						<span>- John Wooden</span>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<footer>
				<div class="content relative">
					<?php echo $this->Html->image("logo_footer.png", array(
						"alt" => "John Wooden, Coach &amp; Teacher",
						"class"=>"float_left footer_logo",
						'url' => array('controller' => 'StaticPages', 'action' => '/'))); ?>
					<?php echo $this->Html->image('footer_wooden.png', array('alt' => 'Joh Wooden Holding basketball')); ?>
					<div class="float_right footer_links">
						<?php echo $this->Html->link($this->Html->image("logo_uncommon.png", array("alt" => "Uncommon Thinking")),'http://uncommonthinking.com/', array('target' => '_blank','escape' => false)); ?>
						<ul>
							<li><?php echo $this->Html->link('Contact Us', array('controller' => 'StaticPages', 'action' => 'contact')); ?></li>
							<li><?php echo $this->Html->link('Terms of Use', array('controller' => 'StaticPages', 'action' => 'terms_of_use')); ?></li>
							<li><?php echo $this->Html->link('Privacy Policy', array('controller' => 'StaticPages', 'action' => 'privacy_policy')); ?></li>
						</ul>
						<div class="clear"></div>
						<h6>All Contents @ <?php echo date('Y'); ?> John Wooden</h6>
					</div>
				</div>
			</footer>	
		</div>
	</div>
</body>
</html>
