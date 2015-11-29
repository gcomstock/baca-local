<?php 

//Get styles and scripts 

function get_files() {
	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'iosslider', get_template_directory_uri() . '/css/iosslider.css' );
    wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	    
    //wp_register_script( 'isotope.pkgd.min', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ) );
    //wp_register_script( 'masonry-layout', get_template_directory_uri() . '/js/masonry-layout.js', array( 'jquery' ) );
    //wp_register_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array( 'jquery' ) );
    wp_register_script( 'scrollTop', get_template_directory_uri() . '/js/scrollTop.js', array( 'jquery' ) );
    wp_register_script( 'menu-bar', get_template_directory_uri() . '/js/menu-bar.js', array( 'jquery' ) );
    wp_register_script( 'addArrow', get_template_directory_uri() . '/js/addArrow.js', array( 'jquery' ) );
    wp_register_script( 'showMore', get_template_directory_uri() . '/js/showMore.js', array( 'jquery' ) );
    wp_register_script( 'iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', array( 'jquery' ) );
   
    //wp_enqueue_script( 'isotope.pkgd.min' );
    //wp_enqueue_script( 'masonry-layout' );
    wp_enqueue_script( 'lightbox' );
    wp_enqueue_script( 'scrollTop' );
    wp_enqueue_script( 'menu-bar' );
    wp_enqueue_script( 'addArrow' );
    wp_enqueue_script( 'showMore' );
    wp_enqueue_script( 'iosslider' );
    //wp_enqueue_script( 'main' );


}
add_action('wp_enqueue_scripts', 'get_files');

function theme_setup() {

	//Featured Image Support
	add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Primary Navigation')
    ));

}
add_action('after_setup_theme','theme_setup');
add_filter( 'show_admin_bar' , '__return_false' );
?>