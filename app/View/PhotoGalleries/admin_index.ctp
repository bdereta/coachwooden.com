<div class="photoGalleries index">
	<h2><?php echo __('Photo Galleries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($photoGalleries as $photoGallery): ?>
	<tr>
		<td><?php echo h($photoGallery['PhotoGallery']['ordering_position']); ?>&nbsp;</td>
		<td><?php echo h($photoGallery['PhotoGallery']['title']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('uploads/'.$photoGallery['PhotoGallery']['image'], array('width' => 100)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $photoGallery['PhotoGallery']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photoGallery['PhotoGallery']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $photoGallery['PhotoGallery']['id']), null, __('Are you sure you want to delete # %s?', $photoGallery['PhotoGallery']['id'])); ?>
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