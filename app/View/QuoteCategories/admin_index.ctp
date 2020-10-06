<div class="quoteCategories index">
	<h2 class="page_title"><?php echo __('Quote Categories'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th width="1%">&nbsp;</th>
	</tr>
	<?php foreach ($quoteCategories as $quoteCategory): ?>
	<tr>
		<td><?php echo h($quoteCategory['QuoteCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($quoteCategory['QuoteCategory']['name']); ?>&nbsp;</td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-info-sign"></i>', array('action' => 'view', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $quoteCategory['QuoteCategory']['id'])); ?>
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
