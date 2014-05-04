<div class="pages form">
<?php echo $this->Form->create('Page'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', isset($readOnly) ? array('readonly', 'true') : false);
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('keywords');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('Bambla.admin_navigation'); ?>