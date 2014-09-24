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

/*
* This function will maintain proper toggle for the info trigger button
* We added this function in jquery.bxslider.js on line 716 and line 730.
* 
*/

function toggleTrigger() {
	if ($(".panel").attr("style") == 'display: block;') {
		$(".trigger").addClass("active");
	} else {
		$(".trigger").removeClass("active");
	}	
}