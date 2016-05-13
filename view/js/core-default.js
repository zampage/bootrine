$(document).ready(function(){

	//SET FOCUS TO FIRST INPUT FIELD
	//IF SITE HAS INPUT
	$('input').get(0).focus();

	//HANDLE "kill-me-later" ELEMENTS
	$('.kill-me-later').each(function(){
		var element = $(this);
		var timer = element.attr('data-timer');
		setTimeout(function(){
			element.fadeOut('slow');
		},timer);
	});

	//STOP COLLAPSING NEW GALLERY DROPDOWN ON ADD CLICK
	$('.new-gallery-dropdown-bullet').bind('click', function(event){
		event.stopPropagation();
	});

	$('.new-gallery-dropdown').on('hidden.bs.dropdown', function(event){
		$('.new-gallery-name').val("");
		$('.new-gallery-name').prop('disabled', false);
		var icon = new Icon( $('.add-gallery').find('.glyphicon') );
		icon.reset('glyphicon-pencil');
	});

	//ADD GALLERY
	$('.add-gallery').on('click', function(event){
		var gname = $('.new-gallery-name').val();
		var icon = new Icon( $(this).find('.glyphicon') );
		if(gname.length > 0){
			icon.toggleLoad();
			$('.new-gallery-name').prop('disabled', true);
			$.post(ROOT + 'ajax-api.php', {action: 'addGallery', gname: gname}, function(data){
				$('.display-gallerys').append(data);
				icon.toggleLoad('glyphicon-ok');
			});
		}
	});

});



//CLASS Icon
var Icon = function(element){
	this.element = element;
	//find current glyphicon
	var classes = element.attr('class').split(' ');
	var g;
	classes.forEach(function(c){
		if(c.indexOf('glyphicon-') >= 0){
			g = c;
		}
	});
	//set default glyphicon
	this.glyphicon = g;
}
Icon.prototype.toggleLoad = function(glyphicon){
	if(glyphicon && this.element.hasClass(this.glyphicon)){
		//change default glyphicon
		this.element.toggleClass(this.glyphicon);
		this.glyphicon = glyphicon;
		this.element.toggleClass(this.glyphicon);
	}
	this.glyphicon = glyphicon || this.glyphicon;
	this.element.toggleClass(this.glyphicon);
	this.element.toggleClass('glyphicon-refresh glyphicon-loading');
}
Icon.prototype.reset = function(glyphicon){
	this.element.toggleClass(this.glyphicon);
	this.glyphicon = glyphicon;
	this.element.toggleClass(glyphicon);
}