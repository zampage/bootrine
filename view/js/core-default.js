$(document).ready(function(){

	//HANDLE "kill-me-later" ELEMENTS
	$('.kill-me-later').each(function(){
		var element = $(this);
		var timer = element.attr('data-timer');
		setTimeout(function(){
			element.fadeOut('slow');
		},timer);
	});

});