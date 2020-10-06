$(document).ready(function(){
	
	//Slider
	$('.history_records').bxSlider({
		mode: 'horizontal',
		slideWidth: 966,
		controls: true,
		pager: true,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
	});
	
	//IosSlider
	$('.iosSlider').iosSlider({
		desktopClickDrag: true
	});
	
});