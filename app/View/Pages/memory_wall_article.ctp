<?php $this->Html->css('memory', array('inline' => false)); ?>
<div class="content center">
	<div class="page_titles photo">
		<span>News from</span>
		<h1 class="news">Steve Jamison</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
		<div class="clear"></div>
	</div>
</div>
<div class="article">
	<div class="content relative">
		<?php if (!empty($articles)) : ?>
			<? if (!empty($neighbor_articles['prev']['Article']['id'])) : ?>
				<?php echo $this->Html->link('',array(
					'action' => 'memory_wall_article', 
					'id' => $neighbor_articles['prev']['Article']['id'],
					'slug' => Inflector::slug($neighbor_articles['prev']['Article']['title'])), 
					array('class' => 'article_prev')); ?>
			<? endif; ?>
			<? if (!empty($neighbor_articles['next']['Article']['id'])) : ?>
				<?php echo $this->Html->link('',array(
					'action' => 'memory_wall_article', 
					'id' => $neighbor_articles['next']['Article']['id'],
					'slug' => Inflector::slug($neighbor_articles['next']['Article']['title'])), 
					array('class' => 'article_next')); ?>
			<? endif; ?>
		<div class="btns_listings"><?php echo $this->Html->link('All Article Listings', array('controller' => 'Pages', 'action' => 'memory_wall_news'),array('escape'=>false)); ?></div>
		<h2><?php echo $articles['Article']['title']; ?></h2>
		<?php echo $articles['Article']['content']; ?>
		<div class="clear"></div>
		<?php endif; ?>
	</div>
	<div class="clear"></div>
</div>
