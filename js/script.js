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
					replaceBody(data, jsData, videoCounter);
				});
				break;
			case "Images":
				$.ajax({
					type: "POST",
					url: "php/api.php",
					data: { "getter":  "images" }
				}).done(function( videoData ){
					var jsData = $.parseJSON( videoData );
					var videoCounter = 0;
					replaceBody(data, jsData, videoCounter);
				});
				break;
		}
	});
})

function replaceBody(data, jsData, videoCounter){
	console.log( data );
	console.log( jsData );
	console.log( videoCounter );
	data = data.replace("PATH", jsData[ videoCounter ].path);
	data = data.replace("DATATYPE", jsData[ videoCounter ].datatype);
	data = data.replace("TITLE", jsData[ videoCounter ].name);
	data = data.replace("DESCRIPTION", jsData[ videoCounter ].description);
	$(".main").replaceWith(data);
}