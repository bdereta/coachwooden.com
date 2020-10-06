$(document).ready(function(){
	
	//Slider
	$('.award_facts').bxSlider({
		mode: 'horizontal',
		slideWidth: 966,
		controls: true,
		pager: false,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
	});

	//Accordion
	$('#st-accordion').accordion({
		oneOpenedItem	: true
	});

	//Fancybox
	$('.fancybox').fancybox();	
});