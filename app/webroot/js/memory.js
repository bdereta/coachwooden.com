$(document).ready(function(){
	
	//Slider
	$('.memory').bxSlider({
		mode: 'fade',
		slideWidth: 736,
		controls: true,
		pager: false,
		auto: true,
		infiniteLoop: true,
		hideControlOnEnd: false,
		pause: 8000
	});

    size_li = $("#results li").size();
    x=5;
    $('#results li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#results li:lt('+x+')').show();
    });
		
});