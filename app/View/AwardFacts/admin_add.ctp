
<div class="awardFacts form">
<?php echo $this->Form->create('AwardFact'); ?>
	<fieldset>
		<legend><?php echo __(' Add Award Fact'); ?></legend>
	<?php
		echo $this->Form->input('ordering_position');
		echo $this->Form->input('facts');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>