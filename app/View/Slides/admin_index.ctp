<div class="slides index">
	<h2 class="page_title"><?php echo __('Slides'); ?></h2>
	<div class="subnavbar">
		<div class="subnavbar-inner">
			<div class="container">
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
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th width="1%">&nbsp;</th>
	</tr>
	<?php foreach ($slides as $slide): ?>
	<tr>
		<td><?php echo h($slide['Slide']['id']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['active']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y - g:i A', $slide['Slide']['modified']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y - g:i A', $slide['Slide']['created']); ?>&nbsp;</td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $slide['Slide']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $slide['Slide']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $slide['Slide']['id'])); ?>
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
