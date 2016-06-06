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
		that.hideImage(gwrap);
		
	})
};

lightbox.prototype.hideImage = function(gwrap) {
	gwrap.css("opacity", 0);
		setTimeout(function(){
			gwrap.html("");
			gwrap.css("display", "none");
		}, 500);

}

lightbox.prototype.showImage = function(elem) {
	path = $(elem).data("path");
	console.log(path);
	gwrap = $(".galleryHolder");

	gwrap.append($('<img>', {src: path, class: "galleryImgBig"}));
	gwrap.css("display", "block");
	gwrap.css("opacity", "1");

	
};

$(document).ready(function() {
	lightbox = new lightbox();


	//Delete image function
	$(".deleteImage").click(function() {
		if(confirm("Wollen Sie dieses Bild wirklich löschen")) {
			
			//get image path
			wrapper = $(this).parent();
			path = wrapper.data("path");
			iid = wrapper.find("img").data("identifier");
			
			$.post( "../ajax-api.php", { action: "deleteImage", path:path, iid:iid })
			.done(function( data ) {
				console.log( "Image deleted: " + data );

				wrapper.parent().hide();
				lightbox.hideImage($(".galleryHolder"));

			});

		} else {
			console.log("penis");
		}
	});



});
