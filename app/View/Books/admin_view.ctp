<div class="books view">
<h2><?php echo __('Book'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($book['Book']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering Position'); ?></dt>
		<dd>
			<?php echo h($book['Book']['ordering_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($book['Book']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publisher'); ?></dt>
		<dd>
			<?php echo h($book['Book']['publisher']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($book['Book']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($book['Book']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amazon Link'); ?></dt>
		<dd>
			<?php echo h($book['Book']['amazon_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barns Noble Link'); ?></dt>
		<dd>
			<?php echo h($book['Book']['barns_noble_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Large'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$book['Book']['image_large'], array('width' => 120)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Thumb'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$book['Book']['image_thumb'], array('width' => 120)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($book['Book']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($book['Book']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $book['Book']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

