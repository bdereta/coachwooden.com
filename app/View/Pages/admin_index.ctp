<div class="pages index">
	<h2 class="page_title"><?php echo __('Pages'); ?></h2>
	<div class="subnavbar">
	  <div class="subnavbar-inner">
		<div class="container">
		  <ul>
			<li><a href=""><i class="icon-plus-sign float_left"></i><span>Add New</span> </a> </li>
			<!--<li><a href=""><i class="icon-list float_left"></i><span>List All</span> </a></li>
			<li><a href=""><i class="icon-user float_left"></i><span>List Active</span> </a> </li>
			<li><a href=""><i class="icon-question-sign float_left"></i><span>List Deactive</span> </a> </li>-->
		  </ul>
		</div>
	  </div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th width="1%">&nbsp;</th>
	</tr>
	<?php foreach ($pages as $page): ?>
	<tr>
		<td><?php echo h($page['Page']['id']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['name']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['title']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['description']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['keywords']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y - g:i A', $page['Page']['modified']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y - g:i A', $page['Page']['created']); ?>&nbsp;</td>
		<td nowrap class="actions">
			<?php echo $this->Html->link(__('<i class="icon-edit"></i>'), array('action' => 'edit', $page['Page']['id']),array('class'=>'btn btn-info','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('<i class="icon-remove"></i>'), array('action' => 'delete', $page['Page']['id']),array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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
