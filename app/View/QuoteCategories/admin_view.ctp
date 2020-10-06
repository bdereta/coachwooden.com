<div class="quoteCategories view">
<h2><?php echo __('Quote Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quoteCategory['QuoteCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($quoteCategory['QuoteCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quoteCategory['QuoteCategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quoteCategory['QuoteCategory']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

<div class="related">
	<h3><?php echo __('Related Quotes'); ?></h3>
	<?php if (!empty($quoteCategory['Quote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Quote Category Id'); ?></th>
		<th><?php echo __('Ordering Position'); ?></th>
		<th><?php echo __('Info'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($quoteCategory['Quote'] as $quote): ?>
		<tr>
			<td><?php echo $quote['id']; ?></td>
			<td><?php echo $quote['quote_category_id']; ?></td>
			<td><?php echo $quote['ordering_position']; ?></td>
			<td><?php echo $quote['info']; ?></td>
			<td><?php echo $quote['modified']; ?></td>
			<td><?php echo $quote['created']; ?></td>
		<td nowrap class="actions">
			<?php echo $this->Html->link('<i class="icon-info-sign"></i>', array('action' => 'view', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>
			<?php echo $this->Html->link('<i class="icon-edit"></i>', array('action' => 'edit', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>
			<?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $quoteCategory['QuoteCategory']['id']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', $quoteCategory['QuoteCategory']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<?php echo $this->Html->link('<i class="icon-plus-sign"></i> New Quote', array('controller' => 'quotes', 'action' => 'add'), array('class'=>'btn btn-info','escape' => false,'alt'=>'New Quote','title'=>'New Quote')); ?>	
</div>
