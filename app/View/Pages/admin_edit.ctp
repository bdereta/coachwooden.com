
<div class="pages form">
<?php echo $this->Form->create('Page'); ?>
	<fieldset>
		<legend><?php echo __('Edit Page SEO'); ?></legend>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', isset($readOnly) ? array('readonly', 'true') : false);
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('keywords');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>
