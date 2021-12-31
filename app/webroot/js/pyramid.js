// JavaScript Document

$(document).ready(function(){

	$('#fullpage').fullpage({
		anchors: ['Pyramid', 'Info'],
		autoScrolling: false,
		css3: true,
	});


	var slider = $('.pyramid_slider_mb').bxSlider({
		mode: 'fade',
		controls: true,
		pager: true,
		pagerCustom: '.bx-pager',
		auto: false,
		adaptiveHeight: true,
		responsive: true,
		touchEnabled: true
	});

});

