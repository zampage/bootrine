lightbox = function() {

	this.thumbs = $(".gallerythumb");

	this.init(); 

}

lightbox.prototype.init = function() {
	$("body").append($('<div>', {class: "galleryHolder"}))

	that = this;

	$(document).on("click", '.gallerythumb', function() {
		that.showImage(this);
	});

	gwrap = $(".galleryHolder");
	gwrap.on("click", function() {
		gwrap.css("opacity", 0);
		console.log(this);
		setTimeout(function(){
			gwrap.html("");
			gwrap.css("display", "none");
		}, 500);
		
	})
};

lightbox.prototype.showImage = function(elem) {
	path = $(elem).data("path");
	console.log(path);
	gwrap = $(".galleryHolder");

	gwrap.append($('<img>', {src: path, class: "galleryImgBig"}));
	gwrap.css("display", "block");
	gwrap.css("opacity", "1");

	
};

$(document).ready(function() {
	l = new lightbox();


	//Delete image function
	$(".deleteImage").click(function() {
		if(confirm("Wollen Sie dieses Bild wirklich löschen")) {
			
			//get image path
			path = $(this).parent().data("path");
			iid = $(this).data("identifier");
			console.log("iid: " + iid);
			
			$.post("../ajax-api.php", {action: "deleteImage", path:path, iid:iid});

		} else {
			console.log("penis");
		}
	});



});
