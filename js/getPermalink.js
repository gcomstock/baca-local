jQuery(document).ready(function($){

function getPath() {

    var $loc = window.location.pathname;
    var $n1 = $loc.indexOf('/');
    var $n2 = $loc.indexOf('/',parseInt($n1+1));
    var $n3 = $loc.lastIndexOf('/'); 
    var $path = $loc.substring($n2+1, $n3);

    if($path == "/") {
        $path = "";
    }

    return $path;
}

// Displays page name on right corner of menu > 768px

	var pageName = $('.page-name');

	pageName.html(getPath());

});
