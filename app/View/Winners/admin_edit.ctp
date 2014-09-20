
<div class="winners form">
<?php echo $this->Form->create('Winner'); ?>
	<fieldset>
		<legend><?php echo __(' Edit Winner'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('winner_category_id');
		echo $this->Form->input('year');
		echo $this->Form->input('name');
		echo $this->Form->input('school');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>