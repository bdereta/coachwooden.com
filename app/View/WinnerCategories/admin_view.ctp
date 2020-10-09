<div class="winnerCategories view">
<h2><?php echo __('Winner Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($winnerCategory['WinnerCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering Position'); ?></dt>
		<dd>
			<?php echo h($winnerCategory['WinnerCategory']['ordering_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($winnerCategory['WinnerCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($winnerCategory['WinnerCategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($winnerCategory['WinnerCategory']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $winnerCategory['WinnerCategory']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

<div class="related">
	<h3><?php echo __('Related Winners'); ?></h3>
	<?php if (!empty($winnerCategory['Winner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Winner Category Id'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('School'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($winnerCategory['Winner'] as $winner): ?>
		<tr>
			<td><?php echo $winner['id']; ?></td>
			<td><?php echo $winner['winner_category_id']; ?></td>
			<td><?php echo $winner['year']; ?></td>
			<td><?php echo $winner['name']; ?></td>
			<td><?php echo $winner['school']; ?></td>
			<td><?php echo $winner['modified']; ?></td>
			<td><?php echo $winner['created']; ?></td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-info-sign"></i>', array('action' => 'view', $winnerCategory['WinnerCategory']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $winnerCategory['WinnerCategory']['id']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $winnerCategory['WinnerCategory']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $winnerCategory['WinnerCategory']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<?php echo $this->Html->link('<i class="icon-plus-sign"></i> New Winner', array('controller' => 'winners', 'action' => 'add'), array('class'=>'btn btn-info','escape' => false,'alt'=>'New Winner','title'=>'New Winner')); ?>	
</div>
