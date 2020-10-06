<div class="timelines index">
	<h2 class="page_title"><?php echo __('Timelines'); ?></h2>
	<div class="subnavbar">
		<div class="subnavbar-inner">
			<div class="bambla_container">
				<ul>
					<li><?php echo $this->Html->link('<i class="icon-plus-sign float_left"></i><span>Add New</span>', array('action' => 'add'), array('escape' => false)); ?></li>
					<!--
					<li><?php echo $this->Html->link('<i class="icon-list float_left"></i><span>List All</span>', array('action' => 'index', 'all'), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-user float_left"></i><span>List Active</span>', array('action' => 'index', 'active'), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-question-sign float_left"></i><span>List Deactive</span>', array('action' => 'index', 'deactive'), array('escape' => false)); ?></li>
					-->
				</ul>
			</div>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
			<th>Change Ordering</th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th width="1%">&nbsp;</th>
	</tr>
	<?php foreach ($timelines as $timeline): ?>
	<tr>
		<td width="50"><?php echo h($timeline['Timeline']['ordering_position']/10); ?>&nbsp;</td>
		<td><?php echo $this->Html->link('<i class="icon-arrow-up"></i>', array('action' => 'reorder_position', $timeline['Timeline']['id'], 'up'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
  			<?php echo $this->Html->link('<i class="icon-arrow-down"></i>', array('action' => 'reorder_position', $timeline['Timeline']['id'], 'down'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
  	</td>
		<td width="130"><?php echo h($timeline['Timeline']['date']); ?>&nbsp;</td>
		<td>
			<?php if(!empty($timeline['Timeline']['image'])) : ?>
				<?php echo $this->Html->image('uploads/'.$timeline['Timeline']['image'], array('width' => 120)); ?>
			<?php endif; ?>
			</td>
		<td width="400"><?php echo h($timeline['Timeline']['description']); ?>&nbsp;</td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-info-sign"></i>', array('action' => 'view', $timeline['Timeline']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $timeline['Timeline']['id']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $timeline['Timeline']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $timeline['Timeline']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
