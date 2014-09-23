<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('game', array('inline' => false));
?>

<div class="content">
	<div class="page_titles photo">
		<span>McDonald's</span>
		<h1 class="game">All<span>-</span>American Game</h1>
		<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	</div>
	<div class="clear"></div>
	<div class="game_text">
		<?php echo $this->Html->image('mcdonalds_seal.png', array('alt' => 'Mcdonalds Seal', 'class' => 'float_left')); ?>
		<h2>John Wooden &amp; The McDonalds All American High School Basketball Games</h2>
		<p>John Wooden, in the years following his retirement in 1975 as UCLA's illustrious head basketball coach (10 March Madness national championships), often  said he would have been perfectly happy had he spent his coaching/teaching career at the high school level. How could he be serious about that with the thrills, chills, and historic achievements provided by his legendary UCLA dynasty? Here's how.</p>
		<p>Coach Wooden loved his years at UCLA (and at Indiana State Teachers College for two years before that), but he also loved the fact that at the high school level the distractions  ("falderol" he called it) that got in the way of his teaching were exponentially less: the media press conferences, alumni pressure, and all the other things that come with big time college sports programs. </p>
		<p>Also, and this was important, high school players, he knew from experience, are usually more coachable, more eager to learn, and had fewer bad habits. Thus, his teaching could be more effective and the learning more extensive. ("You haven't taught unless they've learned.") And John Wooden always considered himself a teacher first and foremost. As he said, "Next to parenting, teaching is the most important profession in the world."</p>
		<p>At the high school level John Wooden believed the potential for teaching was much greater because the potential for learning was much higher. And that for him was the biggest thrill of all and why he valued the greater purity of the high school teaching and learning environment. (And, by extension, why he refused some grand offers to coach in the NBA including the Los Angeles Lakers.)</p>
		<p>It is part of the reason he attached his name and offered his ideas when McDonald's invited him to be a founding member of the McDonald's All American High School Basketball Games: they would emphasize classroom performance, on court ability, civic involvement and more from high school student-athletes. This was right in Coach Wooden's sweet spot. His friend and high school coaching legend Morgan Wootten (DeMatha High School, Hyattsville, MA, 1956-2002) joined with him as a partner with McDonald's in creating the most prestigious high school sports event of its kind. </p>
		<p>Coaches Wooten and Wooden also were strong supporters of giving proceeds from the event to the McDonald's Ronald McDonald Houses. Tens of millions of dollar have been donated.</p>
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
<div class="content center">
	<h2 class="title_game">For More Information</h2><br />
	<?php echo $this->Html->link($this->Html->image("mcdonalds_seal_small.png", array("alt" => "Mcdonald's All American")),'http://www.mcdonaldsallamerican.com', array('target' => '_blank','escape' => false)); ?><br />
	<?php echo $this->Html->link('McDonaldsAllAmerican.com <span class="icon-arrow-right"></span>', 'http://www.mcdonaldsallamerican.com', array('class'=>'btns','escape'=>false)); ?>
</div>