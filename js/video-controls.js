var back = $('#goBack');
var ahead = $('#goAhead');
var del = $('#deleteVideo');
var jsData = $.parseJSON( getCookie('videoData') );

back.on('click', function (e){
	var videoCounter = parseInt(getCookie('videoPointer'));
	if(videoCounter > 0){
		$.ajax({
			type: "POST",
			url: "php/api.php",
			data: { "window":  "videos" }
		}).done(function( data ){
			videoCounter -= 1;
			createCookie('videoPointer', videoCounter);
			replaceBody(data, jsData, videoCounter);
		});
	} else {
		console.log("hi");
	}
});

ahead.on('click', function (e){
	var videoCounter = parseInt(getCookie('videoPointer'));
	var length = jsData.length - 1;
	if(videoCounter < length){
		$.ajax({
			type: "POST",
			url: "php/api.php",
			data: { "window":  "videos" }
		}).done(function( data ){
			videoCounter += 1;
			createCookie('videoPointer', videoCounter);
			replaceBody(data, jsData, videoCounter);
		});
	}
});