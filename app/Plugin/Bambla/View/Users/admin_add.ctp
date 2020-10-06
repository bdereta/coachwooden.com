
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __(' Add User'); ?></legend>
	<?php
		echo $this->Form->input('active', array('checked'=>true));
		echo $this->Form->input('group_id', array('type' => 'hidden', 'value' => '1'));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password', array('autocomplete' => 'off'));
		echo $this->Form->input('confirm_password', array('type' => 'password', 'autocomplete' => 'off'));
		
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?> &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>