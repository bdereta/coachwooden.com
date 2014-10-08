$(document).ready(function(){
	
	// Load More
    size_li = $("#results li").size();
    x=5;
    $('#results li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#results li:lt('+x+')').show();
    });
		
});