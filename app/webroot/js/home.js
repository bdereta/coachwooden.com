// JavaScript Document

$(document).ready(function(){
	$('.hp_slider').bxSlider({
		mode: 'fade',
		slideWidth: 1196,
		controls: true,
		pager: true,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
	});

	$('.book_slider').bxSlider({
		mode: 'horizontal',
		slideWidth: 400,
		controls: true,
		pager: false,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000,
	});

	$('.quote_slider').bxSlider({
		mode: 'horizontal',
		slideWidth: 900,
		controls: false,
		pager: true,
		auto: true,
		pause: 8000,
	});

});
