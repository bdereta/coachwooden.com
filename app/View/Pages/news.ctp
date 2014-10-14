<div class="content center">
	<div class="page_titles photo">
		<span>Coach</span>
		<h1 class="news">In the News</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
		<div class="clear"></div>
	</div>
</div>
<div class="article">
	<div class="content">
		<?php echo $this->Html->link('<span class="icon-arrow-left"></span> Back', array('controller' => 'Pages', 'action' => 'home'),array('class'=>'float_left btns','escape'=>false)); ?>
	</div>
	<?php if(!empty($news)) : ?>
		<ul class="article_list">
			<?php foreach($news as $news) : ?>
				<li>
					<div class="separator"></div>
					<div class="content">
						<p><?php echo $this->Time->format('m.d.y', $news['News']['date']); ?></p>
						<div class="article_title"><?php echo $this->Html->link($news['News']['title'], $news['News']['link'], array('target' =>'_blank')); ?></div>
					</div>
				</li>
			<?php endforeach; ?>
			<div class="separator"></div>
		</ul>
	<?php endif; ?>
	<div class="clear"></div>
</div>
