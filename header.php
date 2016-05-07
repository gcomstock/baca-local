<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo get_bloginfo ( 'name' ); ?></title>
	<meta name="description" content="<?php echo get_bloginfo ( 'description' ); ?>">

	<?php wp_head(); ?>

	<!--favicons-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo bloginfo('template_directory'); ?>/images/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo bloginfo('template_directory'); ?>/images/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo bloginfo('template_directory'); ?>/images/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

</head>
<body <?php body_class(); ?>>

<div class="wrapper">

	<div class="navbar-container">
	    <div id="mobile-menu">
		    <div id="menu-bar"></div>
    	    <div class="page-name">
    	    	<?php global $post; echo $post->post_name; ?>
    	    </div>
    	    <a href="<?php echo home_url(); ?>"><img id="logo-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo-mobile.png" alt="M.W.B"></a>
        </div>

		<a href="<?php echo home_url(); ?>">
			<img id="logo" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo.png" alt="M.W.B">
		</a>

		<?php 
			$args = array(
				'theme_location' => 'primary',
			); 
		?>
		<?php wp_nav_menu($args); ?>

		<?php if (!is_front_page()&&!is_page('about')) {?>
			<a href="#" class="scrollTop">back to top</a>
		<?php } ?>
	</div><!-- /navbar-container -->