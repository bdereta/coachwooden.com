<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add User'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password_retrieve_token');
		echo $this->Form->input('password_retrieve_expiration');
		echo $this->Form->input('suspended');
		echo $this->Form->input('active');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>