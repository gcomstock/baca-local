jQuery(document).ready(function($){

	$('.showMore').click(function(){
		var $this = $(this); 
		var $content = $this.closest(".vimeoVid");

	    if(!$content.hasClass('show')){
	        var linkText = "SHOW LESS";
	    } else {
	        var linkText = "SHOW MORE";
	    };
		$content.toggleClass('show');
	    $this.text(linkText);
	});

}); 