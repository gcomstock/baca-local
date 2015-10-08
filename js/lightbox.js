jQuery(document).ready(function($){

    jQuery.fn.center = function() {

        this.css("position","absolute");

        this.css("top", Math.max(0, (($(window).height()

        - $(this).outerHeight()) / 2) +

        $(window).scrollTop()) + "px");

        this.css("left", Math.max(0, (($(window).width()

        - $(this).outerWidth()) / 2) +

        $(window).scrollLeft()) + "px");

        return this;

    }

    function getPath() {

        var $loc = window.location.pathname;
        var $n1 = $loc.indexOf('/');
        var $n2 = $loc.indexOf('/',parseInt($n1+1));
        var $n3 = $loc.lastIndexOf('/'); 
        var $path = $loc.substring($n2+1, $n3);

        if($path == "/") {
            $path = "featured";
        }

        return $path;
    }

    $('.grid-item .tabImage img').addClass('thumb');
    var numImgs = $('.grid-item').length;
    var prevImages = $('.tabImage').prevAll().length;
    var imageClicked;

    
    if($(window).width()>=415){

        var $overlay = $("<div class='overlay'></div>");
        $("body").append($overlay);

        $('.tabImage').click(function(){
            var prevImages = $(this.parentNode).prevAll().find('.tabImage').length;
            if(prevImages > 0){
                $('.navLeft').show();
            }else{
                $('.navLeft').hide();
            }
            if(prevImages == (numImgs - 1)){
                $('.navRight').hide();
            }else{
                $('.navRight').show();
            }
        });

        $(".thumb").click(function(){
            imageClicked = $(this);
            $(".mainImage").find('img').remove();
            $(".mainImage").append("<img src='"+imageClicked.attr('src')+"' />");

            var $width = $(window).width();
            var $height = $(window).height()-100;

            $('.centered').css({
               'z-index' : '7000',
               'position' : 'fixed',
               'top'  : '50%',
               'left' : '50%',
               'transform' : 'translate(-50%, -55%)',
               'transition' : 'width .5s, height .5s, top .5s, left .5s',
               'box-shadow' : '2px 2px 4px rgba(0,0,0,.9)' 
            });

            $('.xbutton, .navRight, .navLeft').css({
                'display' : 'inline'
            });

            $('.mainImage, .mainImage img').css({
                'display' : 'block',
                'width' : 'auto',
                'max-width' : $width,
                'max-height' : $height
            });

            $overlay.center();      

            $(window).resize(function() {
                $overlay.center();
            });

            $overlay.show();
            $('.centered').hide();
            $('.centered').show();
        });

        $(document).keyup(function(e) {
            switch(e.keyCode) {
              case 37 : imageClicked.closest('.grid-item').prev().find('img').trigger('click'); break;
              case 39 : imageClicked.closest('.grid-item').next().find('img').trigger('click'); break;   
            }
        });

        $('.navRight').click(function(){
            imageClicked.closest('.grid-item').next().find('img').trigger('click');
        });

        $('.navLeft').click(function(){
            imageClicked.closest('.grid-item').prev().find('img').trigger('click');
        });

        $('.xbutton').click(function(){
            $overlay.hide();
            $('.centered').hide(800);
        });

        $overlay.click(function(){

            $(this).hide();
            $('.centered').hide(800);

        });

    }

    if($(window).width()<415){

        var $goback = $('.goback img').attr('src');
        var $overlayMobileNav = $("<div class='overlayMobileNav'><img src='" + $goback + "'/><p>|</p> <span>" + getPath() + "</span></div>");  
        $(".centered").append($overlayMobileNav);
        
        var $overlayMobile = $("<div class='overlayMobile'></div>");
        $("body").append($overlayMobile);

        $(".thumb").click(function(){
       
            var $text = $(this.parentNode).parent().find('.excerpt h1').text().toLowerCase(); 
            imageClicked = $(this);
            
            $(".mainImage").find('img').remove();
            $(".mainImage").find('h1').remove();
            $(".mainImage").append("<img src='"+imageClicked.attr('src')+"' />");
            $(".mainImage").append("<h1>" + $text + "</h1>");
            var $width = $(window).width();
            var $height = $(window).height()-100;

            $('.centered').css({
               'z-index' : '7000',
               'position' : 'absolute',
               'top'  : '0',
               'left' : '0',
               'right' : '0'
            });

            $('.mainImage, .mainImage img').css({
                'display' : 'block',
                'width' : 'auto',
                'margin-top' : '50px',
                'max-width' : $width,
                'max-height' : $height
            });

            $overlayMobile.center();      

            $(window).resize(function() {
                $overlayMobile.center();
            });

            $overlayMobile.show();
            $overlayMobileNav.show();
            $('.centered').hide();
            $('.centered').show();
        });

        $overlayMobileNav.click(function(){

            $(this).hide();
            $('.centered').hide();
            $overlayMobile.hide();

        });

    }

});