jQuery(document).ready(function($){

	$('#menu-bar').click(function(){

		$('.menu-primary-container').slideToggle(400, function(){

			$(this).toggleClass("nav-expanded").css('display', '');

		});

	});
	
});