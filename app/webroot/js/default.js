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

function load_video(id) {
	var url = 'http://www.youtube.com/embed/'+ id + '?rel=0&autoplay=1';
	$('#youtube_iFrameVideo').attr('src', url);
}
