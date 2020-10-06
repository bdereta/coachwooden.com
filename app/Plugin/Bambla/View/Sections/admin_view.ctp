<div class="sections view">
<h2><?php echo __('Section'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($section['Section']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page Name'); ?></dt>
		<dd>
			<?php echo h($section['Section']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Index'); ?></dt>
		<dd>
			<?php echo h($section['Section']['index']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($section['Section']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($section['Section']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($section['Section']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $section['Section']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

