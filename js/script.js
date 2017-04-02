var ee = "";
$(".redirect").on("click", function( e ){
	ee = e.target.innerText;
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "window":  e.target.innerText }
	}).done(function( data ){
		if(ee == "Videos"){
			$.ajax({
				type: "POST",
				url: "php/api.php",
				data: { "getter":  "videos" }
			}).done(function( videoData ){
			var jsData = $.parseJSON( videoData );
				data = data.replace("PATH", jsData[0].path);
				data = data.replace("DATATYPE", jsData[0].datatype);
				data = data.replace("TITLE", jsData[0].name);
				data = data.replace("DESCRIPTION", jsData[0].description);
				console.log(data);
				$(".main").replaceWith(data);
			});
		}
	});
})