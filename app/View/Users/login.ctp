<h2>Login</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
//captcha image
echo $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha', 'admin' => false ), array('id' => 'captcha')); 
echo $this->Form->input('captcha', array('value' => NULL, 'label' => 'Security Code'));
echo $this->Form->submit('Login', array('class' => 'bambla_btn_blue bambla_floatl'));
echo $this->Form->button('Back to the site', array('class' => 'bambla_btn_gray bambla_floatr', 'formaction' => Router::url(array('controller' => 'StaticPages', 'action' => 'home'))));
echo $this->Form->end();
?>
<div class="bambla_clear"></div>

