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

	sizeLightbox();

	$slider.iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		startAtSlide: 1,
		infiniteSlider: true,
		snapSlideCenter: true,
		autoSlideHoverPause: false,
		onSliderLoaded: loaded,
		onSliderUpdate: update,
		onSliderResize: resize,
		onSlideChange: slideChange
	});


	var slideLength = $('.slide').length;

	function slideChange(args) {
		console.log(args);
		//var slideNumber = args.currentSlideNumber%slideLength;
		// $('.dot').removeClass('active');
		// $('.dot').eq(slideNumber-1).addClass('active');
	}

	function update(args) {
		console.log('update');
	}

	function loaded(args) {
		console.log('loaded');

		//args.sliderContainerObject.css('opacity','1');
	}






	function resize(args) {
		sizeLightbox();
		$('.galleryDetail__lightbox__slider').iosSlider('update');

		//args.sliderObject.iosSlider('update');

		//debugger;



		// args.sliderContainerObject.css({
		// 	 'height': winHeight*0.8,z
		// 	 'width' : galleryDetailWidth*0.8
		// 	'height': $galleryDetail.height,
		// 	'width' : $galleryDetail.width
		// });


		// args.sliderContainerObject.find('.slider').css({
		// 	'height': galleryDetailHeight,
		// 	'width' : galleryDetailWidth
		// });
	}

	function sizeLightbox() {
		var galleryDetailWidth = $('.galleryDetail').outerWidth(true);
		var galleryDetailHeight = $('.galleryDetail').outerHeight(true);
		
		$frame = $('.galleryDetail__lightbox');
		$frame.css({
			'margin-top': galleryDetailHeight*0.1,
			'margin-left': galleryDetailWidth*0.1,
			'height': galleryDetailHeight*0.8,
			'width' : galleryDetailWidth*0.8
		});
	}
}




var $ = jQuery;
jQuery(function($){

	// $('.tabImage').on('click', function(){
	// 	console.log('clciked');
	// });

	var frontpageSlider = document.querySelector('.frontPage__slider');
	var galleryLightboxSlider = document.querySelector('.galleryDetail__lightbox__slider');

	if (frontpageSlider) {
		constructHomeSlider($(frontpageSlider));
	}
	if (galleryLightboxSlider) {
		constructGallerySlider($(galleryLightboxSlider));
	}
	
});

