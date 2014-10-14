<div class="content center">
	<div class="page_titles photo">
		<span>News from</span>
		<h1 class="news">Steve Jamison</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
		<div class="clear"></div>
	</div>
</div>
<div class="article">
	<div class="content">
		<?php echo $this->Html->link('<span class="icon-arrow-left"></span> Back', array('controller' => 'Pages', 'action' => 'home'),array('class'=>'float_left btns','escape'=>false)); ?>
	</div>
	<?php if(!empty($articles)) : ?>
		<ul class="article_list">
			<?php foreach($articles as $article) : ?>
				<li>
					<div class="separator"></div>
					<div class="content">
						<p><?php echo $this->Time->format('F Y', $article['Article']['date']); ?></p>
						<?php echo $this->Html->link($article['Article']['title'],array(
							'action' => 'memory_wall_article', 
							'id' => $article['Article']['id'],
							'slug' => Inflector::slug($article['Article']['title']))); ?>
					</div>
				</li>
			<?php endforeach; ?>
			<div class="separator"></div>
		</ul>
	<?php endif; ?>
	<div class="clear"></div>
</div>
