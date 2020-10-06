
<div class="timelines form">
<?php echo $this->Form->create('Timeline', array('type' => 'file', 'novalidate'=>'true')); ?>
	<fieldset>
		<legend><?php echo __(' Edit Timeline'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ordering_position');
		echo $this->Form->input('date'); ?>
		<div class="textarea_label">
			<p>Content</p>
		</div>
		<div class="textarea_container">
			<?php echo $this->Form->input('description', array('class' => 'ckeditor','label' => false)); ?>
		</div>
		<?php 

		if (isset($params)) {
			if (array_key_exists('uploadImages', $params)) {
				echo $this->ImageTools->uploadImages($params);
		}
	}	?>
	</fieldset>
	<div class="form-actions">
		<?php echo $this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
 &nbsp;
		<?php echo $this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>
	</div>
</div>