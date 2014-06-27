<div class="pages form">
<?php echo $this->Form->create('Page'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Page'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('keywords');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->button('Cancel', array('type' => 'button', 'class'=>'btn')); ?>
	</div>
</div>
<?php echo $this->element('Bambla.admin_navigation'); ?>
