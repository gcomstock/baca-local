jQuery(document).ready(function($){

	$('.showMore p').click(function(){
		var $this = $(this); 
		var $content = $this.parent().prev(".vimeoDescription");
		var linkText = $this.text().toUpperCase();    
		    
	    if(linkText === "SHOW MORE"){
	        linkText = "Show Less";
	        $content.removeClass('hideContent').addClass('showContent');
	    } else {
	        linkText = "Show More";
	        $content.removeClass('showContent').addClass('hideContent');
	    };
	    $this.text(linkText);

	});


}); 