// JavaScript Document

$(document).ready(function(){
	
	// "scrollTop" plugin
	$.scrollUp();
	
	// "colio" plugin
	var colio_run = function(){
		$('#demo_1').remove();
		$('.portfolio .list').colio({
			id: 'demo_1',
			theme: 'white',
			placement: 'before',
			onContent: function(content){
				// init "flexslider" plugin
				$('.flexslider', content).flexslider({slideshow: false, animationSpeed: 300});
			}
		});
	};
	
	colio_run();
				
	// "quicksand" plugin
	var quicksand_run = function(items){
		$('.portfolio .list').quicksand(items, {
			retainExisting: false, adjustWidth:false, duration: 500
		}, colio_run);
	};
	
	$('.portfolio .list li').each(function(n){
		$(this).attr('data-id', n);
	});
	
	var copy = $('.portfolio .list li').clone();
	
	$('.portfolio .filters a').click(function(){
		$(this).addClass('filter-active').siblings().removeClass('filter-active');
		var href = $(this).attr('href').substr(1);
		filter = href ? '.' + href : '*';
		quicksand_run(copy.filter(filter));
		return false;
	});
	
});
