function constructHomeSlider ($slider) {
	$slider.iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		startAtSlide: 1,
		infiniteSlider: true,
		autoSlideTransTimer: 800,
		autoSlide: true,
		autoSlideTimer: 2500,
		snapSlideCenter: true,
		autoSlideHoverPause: false,
		onSliderLoaded: loaded,
		onSliderResize: resize,
		onSlideChange: slideChange
	});

	//draw dots
	var slideLength = $('.slide').length;
	for (var i = 0; i < slideLength; i++) {
		$('.sliderDots').append('<div class="dot"></div>');
	};
	$('.dot').eq(0).addClass('active');


	function slideChange(args) {
		var slideNumber = args.currentSlideNumber%slideLength;
		$('.dot').removeClass('active');
		$('.dot').eq(slideNumber-1).addClass('active');
	}

	function loaded(args) {
		resize(args);
		args.sliderContainerObject.css('opacity','1');
	}

	function resize(args) {
		var winHeight = $(window).innerHeight();
		args.sliderContainerObject.height(winHeight);
	}
}


function constructGallerySlider ($slider) {
	$slider.iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		startAtSlide: 1,
		infiniteSlider: true,
		//autoSlideTransTimer: 800,
		//autoSlide: true,
		//autoSlideTimer: 2500,
		snapSlideCenter: true,
		autoSlideHoverPause: false,
		onSliderLoaded: loaded,
		onSliderResize: resize,
		onSlideChange: slideChange
	});

	function slideChange(args) {
		var slideNumber = args.currentSlideNumber%slideLength;
		// $('.dot').removeClass('active');
		// $('.dot').eq(slideNumber-1).addClass('active');
	}

	function loaded(args) {
		resize(args);
		args.sliderContainerObject.css('opacity','1');
	}

	function resize(args) {
		var winHeight = $(window).innerHeight();
		var galleryDetailWidth = $('.galleryDetail').outerWidth(true);
		

		// args.sliderContainerObject.width(galleryDetailWidth*0.8);
		// args.sliderContainerObject.height(winHeight*0.8);

		args.sliderContainerObject.css({
			'height': winHeight*0.8,
			'width' : galleryDetailWidth*0.8,
			'top'   : winHeight*0.1,
			'left'  : galleryDetailWidth*0.1,
		});
	}
}




var $ = jQuery;
jQuery(function($){

	$('.tabImage').on('click', function(){
		console.log('clciked');
	});
	//constructHomeSlider($('.frontPage__slider'));

	constructGallerySlider($('.galleryDetail__slider'));
	



});