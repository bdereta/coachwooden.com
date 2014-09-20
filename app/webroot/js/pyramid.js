// JavaScript Document

$(document).ready(function(){

	$('#fullpage').fullpage({
		anchors: ['Menu', 'Info'],
		autoScrolling: false,
		css3: true,
	});
	
	$('.pyramid_slider').bxSlider({
		mode: 'horizontal',
		slideWidth: 1160,
		controls: true,
		pager: true,
		pagerCustom: '#bx-pager',
		auto: false,
	});
	
	$('#button_1').click(function(){
		slider.goToSlide(0);
		return false;
	});
	$('#button_2').click(function(){
		slider.goToSlide(1);
		return false;
	});
	$('#button_3').click(function(){
		slider.goToSlide(2);
		return false;
	});
	$('#button_4').click(function(){
		slider.goToSlide(3);
		return false;
	});
	$('#button_5').click(function(){
		slider.goToSlide(4);
		return false;
	});
	$('#button_6').click(function(){
		slider.goToSlide(5);
		return false;
	});
	$('#button_7').click(function(){
		slider.goToSlide(6);
		return false;
	});
	$('#button_8').click(function(){
		slider.goToSlide(7);
		return false;
	});
	$('#button_9').click(function(){
		slider.goToSlide(8);
		return false;
	});
	$('#button_10').click(function(){
		slider.goToSlide(9);
		return false;
	});
	$('#button_11').click(function(){
		slider.goToSlide(10);
		return false;
	});
	$('#button_12').click(function(){
		slider.goToSlide(11);
		return false;
	});
	$('#button_13').click(function(){
		slider.goToSlide(12);
		return false;
	});
	$('#button_14').click(function(){
		slider.goToSlide(13);
		return false;
	});
	$('#button_15').click(function(){
		slider.goToSlide(14);
		return false;
	});

});
