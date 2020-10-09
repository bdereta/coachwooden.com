<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo (!empty($meta['title'])) ? $meta['title'] : NULL; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=1300">
	<?php
		//meta
		if (!empty($meta)) {
			echo $this->Html->meta('icon');
			echo $this->Html->meta('description', $meta['description']);
			echo $this->Html->meta('keywords', $meta['keywords']); 
		}
		
		//css - bambla hybrid
		if (!empty($is_admin)) echo $this->Html->css(array('Bambla.assets', 'Bambla.fonts/stylesheet'));
		
		//css for site only
		echo $this->Html->css(array('default','fonts/stylesheet'));
		
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
	<?php if (!empty($is_admin)) echo $this->element('Bambla.admin_toolbar'); ?>
	<?php echo $this->Session->flash(); ?>
	<div id="wrapper">
		<div id="container" class="relative">
			<?php echo $this->Html->image('top_whistle.png', array('alt' => 'whistle','class' => 'whistle')); ?>
			<header>
				<div class="content relative">
					<div class="float_left">
						<?php //echo $this->Html->image("mcdonalds_seal_top.png", array("alt" => "Mcdonalds Logo", "class"=>"top_mcd")); ?>
						<?php echo $this->Html->image("top_logo.png", array("alt" => "Coach Wooden Logo", "class"=>"top_logo", 'url' => array('controller' => 'Pages', 'action' => '/'))); ?>
						<p class="header_title">Coach &amp; Teacher</p>
					</div>
					<div class="main_nav float_right">
						<ul>
							<li><p>the</p><?php echo $this->Html->link('Journey', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>memory</p><?php echo $this->Html->link('Wall', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>bill walton</p><?php echo $this->Html->link('Speaks', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>pyramid of</p><?php echo $this->Html->link('Success', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>coach's</p><?php echo $this->Html->link('bookstore', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<!--<li><p>mcdonald's</p><?php /*echo $this->Html->link('all american', array('controller' => 'Pages', 'action' => 'mcdonalds_all_american_game_release')); */?></li>-->
							<li><p>scrap</p><?php echo $this->Html->link('book', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>favorite</p><?php echo $this->Html->link('maxims', array('controller' => 'Pages', 'action' => 'home')); ?></li>
							<li><p>john r. wooden</p><?php echo $this->Html->link('award', array('controller' => 'Pages', 'action' => 'home')); ?></li>
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
						'url' => array('controller' => 'Pages', 'action' => '/'))); ?>
					<?php //echo $this->Html->image('footer_wooden.png', array('alt' => 'Joh Wooden Holding basketball')); ?>
					<div class="float_right footer_links">
						<?php echo $this->Html->link($this->Html->image("logo_uncommon.png", array("alt" => "Uncommon Thinking")),'http://uncommonthinking.com/', array('target' => '_blank','escape' => false)); ?>
						<ul>
							<li><?php echo $this->Html->link('Contact Us', array('controller' => 'Pages', 'action' => 'contact')); ?></li>
							<li><?php echo $this->Html->link('Terms of Use', array('controller' => 'Pages', 'action' => 'terms_of_use')); ?></li>
							<li><?php echo $this->Html->link('Privacy Policy', array('controller' => 'Pages', 'action' => 'privacy_policy')); ?></li>
						</ul>
						<div class="clear"></div>
						<h6>All Contents @ <?php echo date('Y'); ?> John Wooden</h6>
					</div>
				</div>
			</footer>	
		</div>
	</div>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	 
	  ga('create', 'UA-5936336-1', 'auto');
	  ga('send', 'pageview');
	 
	</script>
</body>
</html>
