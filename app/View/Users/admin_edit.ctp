
<div class="users form">
<?php echo $this->Form->create('User', array('novalidate'=>'true')); ?>
	<fieldset>
		<legend><?php echo __(' Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('active');
		echo $this->Form->input('group_id', array('type' => 'hidden'));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
	?>
		<p><em>If you wish to keep the old password, leave password fields empty.</em></p>
	<?php
		echo $this->Form->input('password', array('autocomplete' => 'off', 'class' => 'change_password'));
		echo $this->Form->input('confirm_password', array('type' => 'password', 'class' => 'change_password', 'autocomplete' => 'off'));
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>