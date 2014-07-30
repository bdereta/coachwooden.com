<div class="pages view">
<h2><?php echo __('Page'); ?></h2>
	<table>
		<tr>
			<th width="100"><?php echo __('Id'); ?></th>
			<td>
				<?php echo h($page['Page']['id']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<td>
				<?php echo h($page['Page']['name']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Title'); ?></th>
			<td>
				<?php echo h($page['Page']['title']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Description'); ?></th>
			<td>
				<?php echo h($page['Page']['description']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Keywords'); ?></th>
			<td>
				<?php echo h($page['Page']['keywords']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Modified'); ?></th>
			<td>
				<?php echo h($page['Page']['modified']); ?>
				&nbsp;
			</td>
		</tr>
		<tr>
			<th><?php echo __('Created'); ?></th>
			<td>
				<?php echo h($page['Page']['created']); ?>
				&nbsp;
			</td>
		</tr>
	</table>
</div>
