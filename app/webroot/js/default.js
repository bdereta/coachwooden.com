// JavaScript Document

$(document).ready(function(){

	//Parallax
    $(window).bind('scroll',function(e){
    	parallaxScroll();
    });

});

//Parallax
function parallaxScroll(){
	var scrolled = $(window).scrollTop();
	$('#parallax-bg').css('top',(0-(scrolled*1.15))+'px');
}
