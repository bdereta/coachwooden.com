<div class="sections form">
<?php echo $this->Form->create('Section'); ?>
	<fieldset>
		<legend><?php echo __('Edit Section'); ?></legend>
	<?php
		$referer = $this->request->referer();
				
		echo $this->Form->input('referer', array('type' => 'hidden', 'value' => $referer));
		echo $this->Form->input('id');
		echo $this->Form->input('content', array('type' => 'textarea', 'class' => 'ckeditor'));
	?>
	</fieldset>
<?php 

	echo $this->Form->button('Save Changes', array('class' => 'bambla_floatl bambla_btn_blue'));
	echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'bambla_floatl bambla_btn_gray', 'onclick' => "window.document.location.href='$referer'"));


	echo $this->Form->end(); 
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Section.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Section.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>