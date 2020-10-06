
<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __(' Add News'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('title');
		echo $this->Form->input('link');
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>