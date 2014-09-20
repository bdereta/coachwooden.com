$(document).ready(function(){
	
	//fade out flash messages
	$('.alert').delay(5000).fadeOut(400);
	
});

function yt_load_video(url) {
	$("#yt_big").attr("src",url);
	return;
}
