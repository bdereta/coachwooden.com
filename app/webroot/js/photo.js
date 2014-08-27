// JavaScript Document

$(document).ready(function(){

	$('.photo_slider').bxSlider({
		mode: 'fade',
		slideWidth: 1194,
		controls: true,
		pager: false,
		auto: false,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
	});

	$(".trigger").click(function(){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
	
});
