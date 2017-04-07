var myPlayer = videojs("main-video");
togglePause = function(){
	if (myPlayer.paused()) {
		myPlayer.play();
	}
	else {
		myPlayer.pause();
	}
}

var datatype = "";
var path = "";
var name = "";
var description = "";
var created = "";

$.ajax({
	type: "POST",
	url: "php/api.php",
	data: { "getter":  "videos" }
}).done(function( data ){
	var jsData = $.parseJSON( data );
	console.log( jsData );
});

$(".videoButtons").on("click", function( e ){
	
})