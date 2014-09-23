<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('memory', array('inline' => false));
?>
<style>
#wrapper { background:url(./img/bg_top_clouds.jpg) top center no-repeat; }
</style>
<div class="content center">
	<div class="page_titles photo">
		<span>Memory</span>
		<h1 class="photo">Wall</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div id="memory" class="relative ">
		<?php echo $this->Html->image('memory_left.png', array('class' => 'memory_left')); ?>
		<?php echo $this->Html->image('memory_right.png', array('class' => 'memory_right')); ?>
		<div class="top_left"></div>
		<div class="top_right"></div>
		<div class="bottom_left"></div>
		<div class="bottom_right"></div>
		<div class="memory relative">
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_memory.jpg", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
			</div>
			<div class="slide">
				<?php echo $this->Html->link($this->Html->image("temp_memory.jpg", array("class" => "img", "alt" => "title")),'https://link.com', array('target' => '_blank','escape' => false)); ?>
			</div>
		</div>
	</div>
	<?php echo $this->Html->image('memory_decorative_line.png', array('alt' => 'separator')); ?>
	<div class="memory_textbox">
		<p>Coach Wooden has touched a lot of people’s lives during his time. Send your special memory of Coach or pass on your well wishes. We’ve setup this Memory Wall for everyone to share and browse.</p>
	</div>
<?php /*?>	<?php if (!empty($books)) : ?>
		<div class="portfolio">
			<ul class="list">
				<?php foreach($books as $book) : ?>
					<li data-content="#colio_c<?php echo $book['Book']['id']; ?>">
						<div class="thumb">
							<div class="view">
								<h4><?php echo $book['Book']['title']; ?></h4>
								<?php echo $this->Html->image('decoration_quotes.png', array('alt' => 'separator','class' => 'line_separator')); ?><br>
								<?php echo $this->Html->link('Learn More <span class="icon-arrow-right"></span>', '#', array('class'=>'btns colio-link','escape'=>false)); ?>
							</div>
							<?php echo $this->Html->image('uploads/' . $book['Book']['image'], array('alt' => $book['Book']['title'], 'class'=>'img')); ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php foreach($books as $book_content) : ?>
			<div id="colio_c<?php echo $book_content['Book']['id']; ?>" class="colio-content">
				<div class="side">
					<?php echo $this->Html->image('uploads/' . $book_content['Book']['image'], array('alt' => $book['Book']['title'],'class'=>'img_main')); ?>
					<?php echo $this->Html->image('bg_book_frame_bottom.jpg', array('alt' => 'bottom frame','class'=>'bottom')); ?>
				</div>
				<div class="main">
					<h3><?php echo $book_content['Book']['title']; ?></h3>
					<p class="publisher">By <?php echo $book_content['Book']['author']; ?> <span>(<?php echo $book_content['Book']['publisher']; ?>)</span></p>
					<div class="info"><?php echo $book_content['Book']['content']; ?></div>
					<?php echo $this->Html->link($this->Html->image("amazon.png", array("class" => "float_left sepia", "alt" => "Amazon")),$book_content['Book']['amazon_link'], array('target' => '_blank','escape' => false)); ?>
					<?php echo $this->Html->link($this->Html->image("barnes_noble.png", array("class" => "float_left sepia", "alt" => "Barnes & Noble")),$book_content['Book']['barns_noble_link'], array('target' => '_blank','escape' => false)); ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php */?>
	<div class="clear"></div>
</div>