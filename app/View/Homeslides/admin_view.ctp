<div class="homeslides view">
<h2><?php echo __('Homeslide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering Position'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['ordering_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$homeslide['Homeslide']['image'], array('width' => 120)); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Photographer'); ?></dt>
        <dd>
            <?php echo h($homeslide['Homeslide']['photographer']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($homeslide['Homeslide']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<br>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $homeslide['Homeslide']['id']), array('class'=>'btn btn-info')); ?>
		&nbsp;
	<?php echo $this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>
</div>

