var ee = "";
$(".redirect").on("click", function( e ){
	ee = e.target.innerText;
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "window":  e.target.innerText }
	}).done(function( data ){
		switch(ee){
			case "Videos":
				$.ajax({
					type: "POST",
					url: "php/api.php",
					data: { "getter":  "videos" }
				}).done(function( videoData ){
					createCookie('videoData', videoData);
					createCookie('videoPointer', 0);
					var jsData = $.parseJSON( getCookie('videoData') );
					var videoCounter = getCookie('videoPointer');
					replaceBodyVideos(data, jsData, videoCounter);
				});
				break;
			case "Images":
				$.ajax({
					type: "POST",
					url: "php/api.php",
					data: { "getter":  "images" }
				}).done(function( videoData ){
					var jsData = $.parseJSON( videoData );
					var imageCounter = jsData.length;
					replaceBodyImages(data, jsData, imageCounter);
				});
				break;
		}
	});
})

function replaceBodyVideos(data, jsData, videoCounter){
	data = data.replace("PATH", jsData[ videoCounter ].path);
	data = data.replace("DATATYPE", jsData[ videoCounter ].datatype);
	data = data.replace("TITLE", jsData[ videoCounter ].name);
	data = data.replace("DESCRIPTION", jsData[ videoCounter ].description);
	$(".main").replaceWith(data);
}

function replaceBodyImages(data, jsData, imgCounter){
	var result = "<div class='main wrapper clearfix'><div class='gallery cf'>";
	var arg = "";
	for(i = 0; i < imgCounter; i++){
		arg = data;
		arg = arg.replace("PATH", jsData[ i ].path);
		arg = arg.replace("TITLE", jsData[ i ].name);
		arg = arg.replace("DESCRIPTION", jsData[ i ].description);
		result += arg;
		arg = "";
	}
	result += "</div></div>";
	$(".main").replaceWith(result);
}