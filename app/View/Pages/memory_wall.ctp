<?php
$this->Html->css('jquery.bxslider', array('inline' => false));
$this->Html->script('jquery.bxslider.min', array('inline' => false));
$this->Html->script('memory', array('inline' => false));
?>

//<script>
//$(document).ready(function() {
//	//Auto scroll Content
//	var track_load = 0; //total loaded record group(s)
//	var loading  = false; //to prevents multipal ajax loads
//	var total_groups = <?php echo $total_groups; ?>; //total record group(s)
//	
//	//$('#results').load("<?php echo $this->Html->url(array('action' => 'memory_wall_ajax')); ?>", {'group_number':track_load}/*, function() {track_load++;}*/); //load first group
//	
//	/*$( "#results" ).load( "<?php echo $this->Html->url(array('action' => 'memory_wall_ajax')); ?>", function() {
//	  track_load++;
//	});*/
//	
//	$(window).scroll(function() { //detect page scroll
//		
//		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
//		{
//			
//			if(track_load <= total_groups && loading==false) //there's more data to load
//			{
//				loading = true; //prevent further ajax loading
//				$('.animation_image').show(); //show loading image
//				
//				//load data from the server using a HTTP POST request
//				$.post("<?php echo $this->Html->url(array('action' => 'memory_wall_ajax')); ?>",{'group_number': track_load}, function(data){
//									
//					$("#results").append(data); //append received data into the element
//
//					//hide loading image
//					$('.animation_image').hide(); //hide loading image once data is received
//					
//					track_load++; //loaded group increment
//					loading = false; 
//				
//				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
//					
//					alert(thrownError); //alert with HTTP error
//					$('.animation_image').hide(); //hide loading image
//					loading = false;
//				
//				});
//				
//			}
//		}
//	});
//});
//</script>


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
		<?php echo $this->Bambla->fetchSection(1); ?>
	</div>
	<div class="walton_quote relative float_left">
		<?php echo $this->Html->image('journey_photo.png', array('alt' => 'Bill Walton with Coach Wooden','class'=>'memory_photo')); ?>
		<?php echo $this->Html->image('memory_line.png', array('alt' => 'separator')); ?>
		<p>“I  thank John Wooden every day for all his selfless gifts, his lessons, his time, his vision and especially his patience.</p>
		<h3>This is why we call him coach.”</h3>
		<?php echo $this->Html->image('memory_line.png', array('alt' => 'separator')); ?><br /><br />
		<?php echo $this->Html->image('walton_signature.png', array('alt' => 'Bill Walton')); ?>
	</div>
	<div class="float_right last_visit_container">
		<?php echo $this->Html->image('be_true.png', array('alt' => 'Be True to Yourself, Johnny')); ?><br /><br />
		<?php echo $this->Html->link('Steve Jamison<span class="quote">\'</span>s trubute to Coach<br><span class="icon-arrow-right"></span>', array('controller' => 'Pages', 'action' => 'true_to_yourself'),array('class'=>'btns','escape'=>false)); ?>		
	</div>
	<?php echo $this->Html->image('decorative_line_long.png', array('alt' => 'separator')); ?>
	<div class="memory_share">
		<h2>Share Your Memory of Coach</h2>
		<?php echo $this->Form->create('RequestAppearance', array('id'=>'request_form')); ?>
			<div class="float_left"><?php echo $this->Form->input('name', array('label' => false, 'value' => 'Name')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('email', array('type'=>'email','label' => false,  'value' => 'Email')); ?></div>
			<div class="float_left"><?php echo $this->Form->input('city_state', array('label' => false, 'value' => 'City/State')); ?></div>
			<?php echo $this->Form->input('message', array('label' => false, 'type' => 'textarea', 'value' => 'Your Message')); ?>
			<div class="captcha">
				<?php echo $this->Html->image(array('controller' => 'captcha', 'action' => 'get_image', 'plugin' => 'captcha'), array('id' => 'captcha')); ?><br /><br />
				<?php echo $this->Form->input('captcha', array('label' => false, 'value' => 'Security Code')); ?>
			</div>
			<div class="submit_area">
				<?php echo $this->Form->submit('Submit'); ?>
				<p class="submit_text">Send Message</p>
			</div>
			<div class="clear"></div>
		<?php echo $this->Form->end(); ?>
		
	</div>
	<div class="clear"></div>
</div>
<div class="comments bottom_padding">
	<h2 class="float_left">Comments</h2>
	<p class="float_right"><span>452</span>Memories Shared</p>
	<div class="clear"></div>
	<?php /*?><ul id="results"></ul><?php */?>
	<div class="animation_image" style="display:none" align="center"><?php //echo $this->Html->image("ajax-loader.gif", array('alt' => 'Loading ...')); ?>></div>
</div>
