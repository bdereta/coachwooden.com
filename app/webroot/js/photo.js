// JavaScript Document

$(document).ready(function(){

	$('.photo_slider').bxSlider({
		mode: 'fade',
		controls: true,
		pager: false,
		auto: false,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
		responsive: true,
		touchEnabled: true,
		adaptiveHeight: true
	});
	
});
