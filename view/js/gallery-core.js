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
		}, 500);
		
	})
};

lightbox.prototype.showImage = function(elem) {
	path = $(elem).data("path");
	console.log(path);
	gwrap = $(".galleryHolder");

	gwrap.append($('<img>', {src: path, class: "galleryImgBig"}));
	gwrap.css("opacity", "1");

	
};

$(document).ready(function() {
	l = new lightbox();
});
