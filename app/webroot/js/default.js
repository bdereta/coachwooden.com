$(document).ready(function(){
	
	//fade out flash messages
	$('.alert').delay(5000).fadeOut(400);
	
});

function yt_load_video(url) {
	var url = url + '?rel=0&autoplay=1';
	$("#yt_big").attr("src",url);
	return;
}

$(function(){
    /* Hide form input values on focus*/ 
    $('input').each(function(){
        var txtval = $(this).val();
        $(this).focus(function(){
            if($(this).val() == txtval){
                $(this).val('')
            }
        });
        $(this).blur(function(){
            if($(this).val() == ""){
                $(this).val(txtval);
            }
        });
    });
	$('textarea').each(function(){
        var txtval = $(this).val();
        $(this).focus(function(){
            if($(this).val() == txtval){
                $(this).val('')
            }
        });
        $(this).blur(function(){
            if($(this).val() == ""){
                $(this).val(txtval);
            }
        });
    });

});