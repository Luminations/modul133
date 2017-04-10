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
				/*$.ajax({
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
				});*/
				var result =  {
					images: [
						{
							"name": "filename1",
							"imageType": "image/png",
							"content": "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==",
						},
						{
							"name": "filename2",
							"imageType": "image/png",
							"content": "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==",
						},
						{
							"name": "filename3",
							"imageType": "image/png",
							"content": "iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==",
						}
						
    		
					]
				}
				
				var content = []
				for(var i = 0; i < result.images.length; i++){
					var figure = $('<figure>');
					var image = $('<img width="16" height="16" src="data:' + result.images[i].imageType + ';base64,' + result.images[i].content + '">')
					var figcaption = $('<figcaption>')
					figcaption.append(result.images[i].name)
					
					figure.append(image)
					figure.append(figcaption)
					
					content.push(figure);
				}
				
				var mainDiv = $('<div class="main">');
				mainDiv.append(content)
				
				$(".main").replaceWith(mainDiv);
				break;
		}
	});
})