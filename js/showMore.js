jQuery(document).ready(function($){

	$('.showMore p').click(function(){
		var $this = $(this); 
		var $content = $this.parent().prev(".vimeoDescription");
		var linkText = $this.text().toUpperCase();    
		    
	    if(linkText === "SHOW MORE"){
	        linkText = "SHOW LESS";
	        $content.removeClass('hideContent').addClass('showContent');
	    } else {
	        linkText = "SHOW MORE";
	        $content.removeClass('showContent').addClass('hideContent');
	    };
	    $this.text(linkText);

	});


}); 