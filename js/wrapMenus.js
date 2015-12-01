jQuery(document).ready(function($){

	// wrap div around list items
	var navlist = $(".navbar-container ul li");
	var arr = [];
	var last, secondLast;

	for(var i = 1; i <= navlist.length; i++){
		arr.push(i);
	}
	last = arr.pop();
	secondLast = last - 2; 
	navlist.slice(0, secondLast).wrapAll("<div class='top-menu'></div>");
	navlist.slice(secondLast, last).wrapAll("<div class='bottom-menu'></div>");

});