<div class="shareMemories view">
<h2><?php echo __('Share Memory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City State'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['city_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($shareMemory['ShareMemory']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shareMemory['ShareMemory']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

