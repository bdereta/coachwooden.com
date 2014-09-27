<?php if (!empty($comments)) : ?>
	<?php foreach($comments as $comment) : ?>
		<li>
			<span class="date">On <?php echo $this->Time->format('n/d/Y', $comment['ShareMemory']['created']); ?></span>
			<h4><?php echo $comment['ShareMemory']['name']; ?> <span>from</span> <?php echo $comment['ShareMemory']['city_state']; ?> <span>shared</span></h4>
			<p><?php echo $comment['ShareMemory']['message']; ?></p>
		</li>
	<?php endforeach; ?>
<?php endif; ?>