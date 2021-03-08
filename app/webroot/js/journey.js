$(document).ready(function(){
	
	//Slider
	$('.quote_slider').bxSlider({
		mode: 'horizontal',
		controls: true,
		pager: true,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
		responsive: true,
		touchEnabled: true,
	});
	
	//IosSlider
	$('.iosSlider').iosSlider({
		desktopClickDrag: true
	});
	
});