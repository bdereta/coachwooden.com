// JavaScript Document

$(document).ready(function(){
	$('.hp_slider').bxSlider({
		mode: 'fade',
		controls: true,
		pager: true,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
		adaptiveHeight: true,
		responsive: true,
		touchEnabled: true
	});

	$('.book_slider').bxSlider({
		mode: 'horizontal',
		slideWidth: 290,
		controls: true,
		pager: false,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
		responsive: true,
		touchEnabled: true,
		adaptiveHeight: true
	});

	$('.quote_slider').bxSlider({
		mode: 'horizontal',
		controls: false,
		infiniteLoop: true,
		pager: true,
		auto: true,
		pause: 8000,
		responsive: true,
		touchEnabled: true
	});

});
