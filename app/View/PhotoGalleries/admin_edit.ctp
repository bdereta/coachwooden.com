<div class="photoGalleries form">
<?php echo $this->Form->create('PhotoGallery', array('type' => 'file', 'novalidate'=>'true')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Photo Gallery'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ordering_position');
		echo $this->Form->input('title');
		echo $this->Form->input('content', array('class' =>'ckeditor'));

		if (isset($params)) {
			if (array_key_exists('uploadImages', $params)) {
				echo $this->Bambla->uploadImages($params);
		}
	}	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>