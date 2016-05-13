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
		try{
			$('.new-gallery-name').val("");
			$('.new-gallery-name').prop('disabled', false);
			var icon = new Icon( $('.add-gallery').find('.glyphicon') );
			icon.reset('glyphicon-pencil');
		}catch(e){}

		try{
			$('.img-upload-button').prop('disabled', 'true');
			var icon = new Icon( $('.img-upload-button').find('.glyphicon') );
			icon.reset('glyphicon-upload');
		}catch(e){}
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

	//HANDE FILE INPUT BUTTONS
	$(document).on('change', '.btn-file :file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	});
	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });

    //UPLOAD IMAGE
    $('.img-upload-button').on('click', function(event){
    	var files = $('.img-upload-file').get(0).files;
    	var fd = new FormData();
    	var icon = new Icon($(this).find('.glyphicon'));
    	icon.toggleLoad();
    	fd.append('images[]', files[0], files[0].name);
    	fd.append('action', 'uploadImage');
    	fd.append('gid', document.location.pathname.split('/')[document.location.pathname.split('/').length - 1]);
    	$.ajax({
			url: ROOT + 'ajax-api.php',
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data){
				console.log(data);
				icon.toggleLoad('glyphicon-ok');
				$('.img-upload-file').val("");
				$('.img-upload-file-text').val("");
				$('.img-upload-button').prop('disabled', 'true');
				$('.gallery-content').prepend(data);
			}
		});
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