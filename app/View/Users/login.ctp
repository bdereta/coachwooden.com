<h2>Login</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
//captcha image
echo $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha', 'admin' => false ), array('id' => 'captcha')); 
echo $this->Form->input('captcha', array('value' => NULL, 'label' => 'Security Code'));

echo $this->Form->end('Login');

