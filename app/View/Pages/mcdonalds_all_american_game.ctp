<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('game', array('inline' => false));
?>

<div class="content">
	<div class="page_titles photo">
		<span>McDonald's</span>
		<h1 class="game">All<span>-</span>American<span class="small">&reg;</span> Game</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<div class="game_text">
		<?php echo $this->Html->image('mcdonalds_seal.png', array('alt' => 'Mcdonalds Seal', 'class' => 'float_left')); ?>
		<?php echo $this->Bambla->fetchSection(1); ?>
	</div>
	<div class="clear"></div>
</div>
<div id="clothesline" class="relative">
	<div class="centered">
		<div class="game_photos">
			<div><?php echo $this->Html->image('game_photo1.png', array('alt' => 'Photos on clothesline')); ?></div>
			<div><?php echo $this->Html->image('game_photo2.png', array('alt' => 'Photos on clothesline')); ?></div>
		</div>
	</div>
	<?php echo $this->Html->image('mcdonalds_players_game.png', array('alt' => 'Mcdonalds Players', 'class' => 'mcdonalds_players')); ?>
	<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator', 'class' => 'clothesline_line')); ?>
</div>
<div class="clear"></div>
<div class="content center bottom_padding">
	<h2 class="title_game">For More Information</h2><br />
	<?php echo $this->Html->link($this->Html->image("mcdonalds_seal_small.png", array("alt" => "Mcdonald's All American")),'http://www.mcdonaldsallamerican.com', array('target' => '_blank','escape' => false)); ?><br />
	<?php echo $this->Html->link('McDonaldsAllAmerican.com <span class="icon-arrow-right"></span>', 'http://www.mcdonaldsallamerican.com', array('target' => '_blank','class'=>'btns','escape'=>false)); ?>
</div>