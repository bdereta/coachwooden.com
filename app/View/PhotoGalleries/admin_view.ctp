<div class="photoGalleries view">
<h2><?php echo __('Photo Gallery'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering Position'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['ordering_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$photoGallery['PhotoGallery']['image'], array('width' => 120)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($photoGallery['PhotoGallery']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photoGallery['PhotoGallery']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

