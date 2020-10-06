<form action="#" method="post">
	<h1>Login</h1>		
	<div class="login-fields">
		<p>Please provide your login credentials.</p>
		<?php echo $this->Form->create(); ?>
		<div class="field"><?php echo $this->Form->input('email', array('placeholder'=>'Email','class'=>'login username-field')); ?></div> 
		<div class="field"><?php echo $this->Form->input('password', array('placeholder'=>'Password','class'=>'login password-field', 'value' => '')); ?></div> 
		<div class="field float_left inline"><?php echo $this->Form->input('captcha', array(
			'placeholder'=>'Anti-bot code',
			'value' => NULL, 
			'label' => 'Security Code',
			'class'=>'login captcha-field antibot', 
			'autocomplete' => 'off'
		)); ?></div>
		<div class="float_right inline"><?php echo $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha', 'admin' => false, time()), array('id' => 'captcha')) ?></div>
		
		<div class="login-actions">
			<div class="float_right inline"><?php echo $this->Html->link('<i class="icon-home"></i> Back to Site', array('controller' => 'Pages', 'action' => 'home', 'plugin' => false, 'admin' => false), array('class' => 'button btn btn-med','escape' => false)); ?></div>	
			<div class="float_left inline"><?php echo $this->Form->button('<i class="icon-lock"></i> Login', array('type' => 'submit', 'class' => 'button btn btn-info btn-large','escape' => false)); ?></div>
		</div>
		<?php
		echo $this->Form->end();
		?>
	</div>
</form>

<div class="bambla_clear"></div>

