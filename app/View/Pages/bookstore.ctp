<?php
$this->Html->css('layout', array('inline' => false));
$this->Html->css('colio', array('inline' => false));
$this->Html->css('/css/colio-white/style', array('inline' => false));
$this->Html->css('/css/colio-white/flexslider/flexslider', array('inline' => false));
$this->Html->script('/css/colio-white/flexslider/jquery.flexslider', array('inline' => false));
$this->Html->script('jquery.easing.1.3', array('inline' => false));
$this->Html->script('jquery.scrollUp.min', array('inline' => false));
$this->Html->script('jquery.colio.min', array('inline' => false));
$this->Html->script('book', array('inline' => false));
?>

<div class="content bottom_padding">
	<div class="page_titles photo">
		<span>Coach's</span>
		<h1 class="photo">Bookstore</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<?php if (!empty($books)) : ?>
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
	<div class="clear"></div>
</div>