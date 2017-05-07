var back = $('#goBack');
var ahead = $('#goAhead');
var del = $('#deleteVideo');
var jsData = $.parseJSON( getCookie('videoData') );
var videoCounter = parseInt(getCookie('videoPointer'));
var length = jsData.length - 1;

if(videoCounter == 0){
	back.fadeTo("slow", 0.5);	
}

if(length < 1){
	ahead.fadeTo("slow", 0.5);
	console.log("disappear");
}

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
			replaceBodyVideos(data, jsData, videoCounter);
			if(videoCounter == 0){
				back.fadeTo("slow", 0.5);
				console.log("disappear");
			}
		});
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
			replaceBodyVideos(data, jsData, videoCounter);
			if(videoCounter == length){
				ahead.fadeTo("slow", 0.5);
				console.log("disappear");
			}
			if(videoCounter > 0){
				back.fadeTo("slow", 1);
				console.log("appear");
			}
		});
	}
});