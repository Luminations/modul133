$(".delete").on("click", function(){
	var del = confirm("Are you sure that you want to delete this Note?");
	var id = this.id;
	if (del) {
		$.ajax({
			type: "POST",
			url: "php/api.php",
			data: { "manipulate":  {"deleteNote": id} }
		}).done(function( data ){
			console.log(data);
			$("." + id).detach();
		});
	}

})