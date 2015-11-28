var $slider = jQuery('.galleryDetail__lightbox__slider');

var $ = jQuery;
jQuery(function($){
	constructGallerySlider($slider);

	//thumbnail click handler
	$('.photoGrid__photo').on('click', function(){
		var thumbIndex = $('.photoGrid__photo').index(this);
		addSlides(thumbIndex);
		$('.galleryDetail').addClass('active');
	});

	//galleryDetail close button click handler
	$('.nav--close').on('click', function(){
		$('.galleryDetail').removeClass('active');
		$slider.find('.slide').remove();
	});

	$('.galleryDetail').on('click', function(e){
		if(e.target != this) return;

		$('.galleryDetail').removeClass('active');
		$slider.find('.slide').remove();
	});
});


function addSlides(thumbIndex) {
	//clear old slides
	$slider.find('.slide').remove();

	var $el     = $('.photoGrid__photo');
	var length  = $el.length;

	var arr = [];
		arr.push(thumbIndex);
		arr.push((thumbIndex-1+length)%length); //previous thumbnail
		arr.push((thumbIndex+1+length)%length); //next thumbnail

	$.each(arr, function(i, thumbIndex) {
		var imgUrl = $el.eq(thumbIndex).data('imgurl');
		var imgTitle = $el.eq(thumbIndex).find('.photoGrid__overlay__title').text();

		var t = ''+
		'<div class="slide" data-title="'+imgTitle+'" data-thumbindex='+thumbIndex+'>'+
			'<div class="slideImg" style="background-image: url('+imgUrl+')">'+
			'</div>'+
		'</div>';

		$slider.iosSlider('addSlide', t, 1); //addSlide, slide template, slide index
	});

	$slider.iosSlider('update');
}


function constructGallerySlider ($slider) {
	sizeLightbox();

	$slider.iosSlider({
		snapToChildren: true,
		desktopClickDrag: true,
		startAtSlide: 2,
		infiniteSlider: true,
		snapSlideCenter: true,
		autoSlideHoverPause: false,
		navPrevSelector: $('.nav--prev'),
		navNextSelector: $('.nav--next'),
		onSlideChange: slideChange,
		onSliderResize: resize,
		onSlideComplete: slideComplete
	});

	function slideChange() {
		$('.nav--next').hide();
		$('.nav--prev').hide();
	}

	function slideComplete(args) {
		var thumbIndex = args.currentSlideObject.data('thumbindex');
		addSlides(thumbIndex);

		$('.nav--next').show();
		$('.nav--prev').show();
	}

	function resize(args) {
		sizeLightbox();
		$('.galleryDetail__lightbox__slider').iosSlider('update');
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