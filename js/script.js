$(".redirect").on("click", function( e ){
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "window":  e.target.innerText }
	}).done(function( data ){
		$(".main").replaceWith(data);
	});
})