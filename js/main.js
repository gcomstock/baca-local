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
		navPrevSelector: $('.nav--prev'),
		navNextSelector: $('.nav--next'),
		onSliderLoaded: loaded,
		onSliderUpdate: update,
		onSliderResize: resize,
		onSlideChange: slideChange
	});


	var slideLength = $('.slide').length;

	function slideChange(args) {
		console.log(args);
		console.log('pull new slide info and add to slideshow');


		var slideNumber = args.currentSlideNumber%slideLength;
	}

	function update(args) {
		console.log('update');
	}

	function loaded(args) {
		console.log('loaded');
		sizeLightbox();
		//args.sliderContainerObject.css('opacity','1');
	}

	function resize(args) {
		sizeLightbox();
		$('.galleryDetail__lightbox__slider').iosSlider('update');

		//args.sliderObject.iosSlider('update');

		// args.sliderContainerObject.css({
		// 	 'height': winHeight*0.8,
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



var $slider = {};

var $ = jQuery;
jQuery(function($){


	//make appropriate img gallery for current page
	var frontpageSlider = document.querySelector('.frontPage__slider');
	var galleryLightboxSlider = document.querySelector('.galleryDetail__lightbox__slider');

	if (frontpageSlider) {
		$slider = $(frontpageSlider);
		constructHomeSlider($slider);
	}
	if (galleryLightboxSlider) {
		$slider = $(galleryLightboxSlider);
		constructGallerySlider($slider);
	}


	//thumbnail click handler
	$('.photoGrid__photo').on('click', function(){
		var $el     = $('.photoGrid__photo');
		var length  = $el.length;
		var index   = $el.index(this);

		var arr = [];
			arr.push(index);
			arr.push((index+1+length)%length); //next thumbnail
			arr.push((index-1+length)%length); //previous thumbnail

		$.each(arr, function(i, value) {
			var imgUrl = $el.eq(value).data('imgurl');
			var imgTitle = $el.eq(value).find('.photoGrid__overlay__title').text();

			var t = ''+
			'<div class="slide" data-title="'+imgTitle+'">'+
				'<div class="slideImg" style="background-image: url('+imgUrl+')">'+
				'</div>'+
			'</div>';

			$slider.iosSlider('addSlide', t, i); //addSlide, slide template, slide index
		});

		$slider.iosSlider('update');
		//$slider.iosSlider('goToSlide', 1);
		$('.galleryDetail').addClass('active');
	});


	//galleryDetail close button click handler
	$('.nav--close').on('click', function(){
		$('.galleryDetail').removeClass('active');

		//remove all slides
		$slider.find('.slide').remove();
	});
});

