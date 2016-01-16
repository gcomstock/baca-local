var $slider = jQuery('.frontPage__slider');

var $ = jQuery;
jQuery(function($){
	constructHomeSlider($slider);
});

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
		autoSlideHoverPause: true,
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
		args.sliderContainerObject.css('opacity','1'); //fade in
	}

	function resize(args) {
		var winHeight = $(window).innerHeight();
		args.sliderContainerObject.height(winHeight);
	}
}