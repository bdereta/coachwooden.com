
<div class="winnerCategories form">
<?php echo $this->Form->create('WinnerCategory'); ?>
	<fieldset>
		<legend><?php echo __(' Edit Winner Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ordering_position');
		echo $this->Form->input('name');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>