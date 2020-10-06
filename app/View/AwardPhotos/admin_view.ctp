<div class="awardPhotos view">
<h2><?php echo __('Award Photo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($awardPhoto['AwardPhoto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering Position'); ?></dt>
		<dd>
			<?php echo h($awardPhoto['AwardPhoto']['ordering_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($awardPhoto['AwardPhoto']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Large'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$awardPhoto['AwardPhoto']['image_large'], array('width' => 120)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Thumb'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$awardPhoto['AwardPhoto']['image_thumb'], array('width' => 120)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($awardPhoto['AwardPhoto']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($awardPhoto['AwardPhoto']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $awardPhoto['AwardPhoto']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

