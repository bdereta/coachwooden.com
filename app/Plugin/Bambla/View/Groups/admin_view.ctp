<div class="groups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['created']; ?></td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-info-sign"></i>', array('controller' => 'Users', 'action' => 'view', $group['Group']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('controller' => 'Users','action' => 'edit', $group['Group']['id']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => 'Users','action' => 'delete', $group['Group']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<?php echo $this->Html->link('<i class="icon-plus-sign"></i> New User', array('controller' => 'users', 'action' => 'add'), array('class'=>'btn btn-info','escape' => false,'alt'=>'New User','title'=>'New User')); ?>	
</div>
