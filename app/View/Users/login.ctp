<form action="#" method="post">
	<h1>Login</h1>		
	<div class="login-fields">
		<p>Please provide your login credentials.</p>
		<?php echo $this->Form->create(); ?>
		<div class="field"><?php echo $this->Form->input('email', array('placeholder'=>'Email','class'=>'login username-field')); ?></div> 
		<div class="field"><?php echo $this->Form->input('password', array('placeholder'=>'Password','class'=>'login password-field')); ?></div> 
		<div class="field">
			<?php echo $this->Form->input('captcha', array(
				'before' => $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha', 'admin' => false ), array('id' => 'captcha')),
				'placeholder'=>'Anti-bot code','value' => NULL, 'label' => 'Security Code','class'=>'login captcha-field')); ?>
		</div>
		
		<div class="login-actions">
			<!--<div class="login-extra"><a href="#">Reset Password</a></div>  /login-extra -->
			<?php echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'button btn btn-info btn-large')); ?>
		</div>
		<?php
		echo $this->Form->end();
		?>
	</div>
</form>

<div class="bambla_clear"></div>

