
<div class="sections form">
<?php echo $this->Form->create('Section'); ?>
	<fieldset>
		<legend><?php echo __(' Add Section'); ?></legend>
	<?php
		$readonly = !empty($this->request->data['Section']['page_name']) ? true : false;
	
		echo $this->Form->input('page_name', array('readonly' => $readonly));
		echo $this->Form->input('index', array('readonly' => $readonly));
		echo $this->Form->input('content', array('class'=>'ckeditor', 'label'=>false));
	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>