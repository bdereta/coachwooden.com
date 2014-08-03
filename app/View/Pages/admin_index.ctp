<div class="pages index">
	<h2 class="page_title"><?php echo __('Page Metum'); ?></h2>
	<div class="subnavbar">
		<div class="subnavbar-inner">
			<div class="bambla_container">
				<ul>
					<li><?php echo $this->Html->link('<i class="icon-plus-sign float_left"></i><span>Add New</span>', array('controller' => 'pages', 'action' => 'add'), array('escape' => false)); ?></li>
					<!--<li><?php echo $this->Html->link('<i class="icon-list float_left"></i><span>List All</span>', array('controller' => 'pages', 'action' => 'index', 'all'), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-user float_left"></i><span>List Active</span>', array('controller' => 'pages', 'action' => 'index', 'active'), array('escape' => false)); ?></li>
					<li><?php echo $this->Html->link('<i class="icon-question-sign float_left"></i><span>List Deactive</span>', array('controller' => 'pages', 'action' => 'index', 'deactive'), array('escape' => false)); ?></li>-->
				</ul>
			</div>
		</div>
	</div>
	<p>Use it to define website and page specific <i>Title</i>, <i>Description</i>, and <i>Keywords</i> tags. When you define values for <i>default</i> page, they will be applied to all the pages unless you define page spefic values by adding the page and naming it after it's page slug.</p>
	<p><i>Example:</i> Let's say you have a page named <i>Photo Gallery</i> and you wish to set up a different page title and meta keywords/description for the Photo Gallery page only. The <i>slug</i> for the page will likely be <i>photo-gallery</i> (if you're not sure, open the page in the browser and read it from the browser address bar). You will click <i>Add New</i> page, name it <i>photo-gallery</i> and define <i>page title</i> and other values.</p>
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
			<?php echo $this->Form->postLink(__('<i class="icon-remove"></i>'), array('action' => 'delete', $page['Page']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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
