$(document).ready(function(){

	//SET FOCUS TO FIRST INPUT FIELD
	//IF SITE HAS INPUT
	if($("input")[0]) { 
		$('input').get(0).focus();
	}
	

	//CHECKBOX TO SWITCH
	$.fn.bootstrapSwitch.defaults.onText = "Private";
	$.fn.bootstrapSwitch.defaults.offText = "Public";
	$('input[type="checkbox"]').bootstrapSwitch();

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
    	for(var i = 0; i < files.length; i++){
	    	fd.append('images[]', files[i], files[i].name);
	    }
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

    //GALLERY EDITING
    $('.toggle-gallery-editing').on('click', function(event){
    	$('.gallery-editing-zone').slideToggle('fast');
    });
    //SAVE GALLERY EDIT
    $('.save-gallery-edit').on('click', function(event){
    	var name = $('.gallery-name').val();
    	var priv = ($('.gallery-private').prop('checked')) ? 1 : 0;
    	var gid = parseInt($('.gallery-gid').val());
    	$.post(ROOT+'ajax-api.php', {action:'saveGalleryEdit', name:name, priv:priv, gid:gid},function(data){
    		console.log(data);
    		$('.gallery-title').text(name);
    		var lbl = (priv == 1) ? '&nbsp;<sup><span class="label label-primary">private</span></sup>' : '' ;
    		$('.gallery-label-placeholder').html(lbl);
    		$('.gallery-editing-zone').slideToggle('fast');
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