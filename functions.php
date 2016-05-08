<?php 

//Get styles and scripts 

function get_files() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'content', get_template_directory_uri() . '/css/content.css' );
    wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	    
    wp_register_script( 'scrollTop', get_template_directory_uri() . '/js/scrollTop.js', array( 'jquery' ) );
    wp_register_script( 'menu-bar', get_template_directory_uri() . '/js/menu-bar.js', array( 'jquery' ) );
    wp_register_script( 'wrapMenus', get_template_directory_uri() . '/js/wrapMenus.js', array( 'jquery' ) );
    wp_register_script( 'showMore', get_template_directory_uri() . '/js/showMore.js', array( 'jquery' ) );
    wp_register_script( 'iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', array( 'jquery' ) );
    wp_register_script( 'imageScroller', get_template_directory_uri() . '/js/imageScroller.js', array( 'jquery' ) );

    wp_enqueue_script( 'scrollTop' );
    wp_enqueue_script( 'menu-bar' );
    wp_enqueue_script( 'wrapMenus' );
    wp_enqueue_script( 'showMore' );
    wp_enqueue_script( 'iosslider' );
    wp_enqueue_script( 'imageScroller' );
}
add_action('wp_enqueue_scripts', 'get_files');

function theme_setup() {

	//Featured Image Support
	add_theme_support('post-thumbnails');

    //this appears to be overidden in wordpress settings page: /wp-admin/options-media.php
    set_post_thumbnail_size( 600, 600 );

    register_nav_menus(array(
        'primary' => __('Primary Navigation')
    ));
}
add_action('after_setup_theme','theme_setup');
add_filter( 'show_admin_bar' , '__return_false' );
?>