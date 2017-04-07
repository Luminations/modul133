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
				var jsData = $.parseJSON( videoData );
					data = data.replace("PATH", jsData[1].path);
					console.log(jsData[1].path);
					data = data.replace("DATATYPE", jsData[1].datatype);
					data = data.replace("TITLE", jsData[1].name);
					data = data.replace("DESCRIPTION", jsData[1].description);
					$(".main").replaceWith(data);
				});
				break;
			case "Images":
				$.ajax({
					type: "POST",
					url: "php/api.php",
					data: { "getter":  "images" }
				}).done(function( videoData ){
				var jsData = $.parseJSON( videoData );
					data = data.replace("PATH", jsData[1].path);
					data = data.replace("DATATYPE", jsData[1].datatype);
					data = data.replace("TITLE", jsData[1].name);
					data = data.replace("DESCRIPTION", jsData[1].description);
					$(".main").replaceWith(data);
				});
				break;
		}
	});
})