lightbox = function() {

	this.thumbs = $(".gallerythumb");

	this.init(); 

}

lightbox.prototype.init = function() {
	$("body").append($('<div>', {class: "galleryHolder"}))

	
	that = this;

	this.thumbs.on("click", function() {
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
	gwrap = $(".galleryHolder");

	gwrap.append($('<img>', {src: path, class: "galleryImgBig"}));
	gwrap.css("opacity", "1");

	
};

$(document).ready(function() {
	l = new lightbox();
});
