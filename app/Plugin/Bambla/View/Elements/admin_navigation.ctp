<div class="actions">

	<h3><?php echo __('Sections'); ?></h3>
    
	<?php if (!empty($adminNavigation)) : ?>
	<ul id="nav">
		<?php foreach($adminNavigation as $key => $val) : ?>
			<li><?php echo $this->Html->link($key.$this->Html->image("admin_nav_selected.png"), $val['link'], array('escape'=>false)); ?>
            	<?php /*?><?php if (isset($val['sublinks']) && !empty($val['sublinks'])) : ?>
	 				<ul>
						<?php foreach($val['sublinks'] as $subKey => $subVal) : ?>
                			<li><?php echo $this->Html->link(__($subKey), $subVal); ?></li>
               	 		<?php endforeach; ?>
                    </ul>
                <? endif; ?><?php */?>
            </li>
        <?php endforeach; ?> 
	</ul>
    <? endif; ?>

</div>


