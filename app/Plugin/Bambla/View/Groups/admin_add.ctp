
<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __(' Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>