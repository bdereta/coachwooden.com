<div class="pages view">
<h2><?php echo __('Meta Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page Name'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['page_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keywords'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($page['Metadata']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Metadata']['id']),array('class'=>'btn btn-info')); ?> &nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'),array('class'=>'btn')); ?>

</div>
