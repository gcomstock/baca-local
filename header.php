<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wrapper">
	<div id="menu-bar">
		<span class='icon'>i</span>
		<span class='icon'>i</span>
		<span class='icon'>i</span>
	</div><!-- /menu-bar -->
	
	<div class="page-name"></div><!-- /page-name -->

	<div class="navbar-container">
		<a class= href="<?php echo home_url(); ?>">
			<img id="logo" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo.png" alt="M.W.B">
			<img id="logo-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo-mobile.png" alt="M.W.B">
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