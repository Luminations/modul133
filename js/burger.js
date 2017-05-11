$(".burger").on("click", function(){
	if($(".header-container").hasClass("expanded")){
		$(".header-container").removeClass("expanded");
	} else{
		$(".header-container").addClass("expanded");
		console.log("hi");
	}
})