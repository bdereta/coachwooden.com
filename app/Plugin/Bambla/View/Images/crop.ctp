<script type="text/javascript">
$(document).ready(function () { 
	crop(<?php echo $image['width'];?>,<?php echo $image['height'];?>);
});

function crop(w,h) {
	ratio = h/w;
	$('#preview').imgAreaSelect({ 
		aspectRatio: '1:'+ratio, 
		handles: true, 
		onSelectChange: preview,
		x1: 0, y1: 0, x2: w, y2: h
	}); 
}

function preview(img, selection) { 
	var scaleX = <?php echo $image['width'];?> / selection.width; 
	var scaleY = <?php echo $image['height'];?> / selection.height; 
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
}  

</script>
	
	
<div align="center">
	<h2><?php echo Inflector::humanize(Inflector::underscore($label));  ?></h2>
	<h3>You may resize and move selection to define cropping area.</h3>
	<h4>Cropping <?php echo Inflector::humanize(Inflector::underscore($label)); ?> (<?php echo $count+1; ?> of <?php echo $total; ?>)
	<p><?php echo $this->Form->create(); ?>
	
	
	<?php echo $this->Form->submit('Crop and Continue', array('style'=>'width:50%')); ?>
	<?php echo $this->Html->image('uploads/'.$image['filename'], array('id' => 'preview', 'alt' => 'Preview')); ?>
	
    <?php echo $this->Form->input('count', array('type'=>'hidden', 'value' => $count)); ?>
	<?php echo $this->Form->input('label', array('type'=>'hidden', 'value' => $label)); ?>
	<?php echo $this->Form->input('filename', array('type'=>'hidden', 'value' => $image['filename'])); ?>
	<?php echo $this->Form->input('width', array('type'=>'hidden', 'value' => $image['width'])); ?>
	<?php echo $this->Form->input('height', array('type'=>'hidden', 'value' => $image['height'])); ?>
	<?php echo $this->Form->input('x1', array('type'=>'hidden', 'id'=>'x1')); ?>
	<?php echo $this->Form->input('y1', array('type'=>'hidden', 'id'=>'y1')); ?>
	<?php echo $this->Form->input('w', array('type'=>'hidden', 'id'=>'w')); ?>
	<?php echo $this->Form->input('h', array('type'=>'hidden', 'id'=>'h')); ?>
		
	<?php echo $this->Form->submit('Crop and Continue', array('style'=>'width:50%')); ?>

	<?php echo $this->Form->end(); ?></p>
</div>