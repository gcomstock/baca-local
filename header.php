<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="centered">
	<img class="xbutton" src="<?php echo bloginfo('template_directory'); ?>/images/xbutton.png" alt="xbutton">
	<div class="mainImage"></div><!-- /mainImage -->
	<div class="navLeft">
		<img src="<?php echo bloginfo('template_directory'); ?>/images/navLeft.png" alt="left">
	</div><!-- /navLeft -->
	<div class="navRight">
		<img src="<?php echo bloginfo('template_directory'); ?>/images/navRight.png" alt="right">
	</div><!-- /navRight -->  
</div><!-- /centered -->

<div class="goback">
	<img src="<?php bloginfo('template_directory'); ?>/images/goback.png" alt="back">
</div><!-- /goback -->

<div class="wrapper">

	<div id="menu-bar">
		<img src="<?php echo bloginfo('template_directory'); ?>/images/menu-bar.png" alt="menu">	
	</div><!-- /menu-bar -->

	<div class="navbar-container clearfix">

		<a href="<?php echo home_url(); ?>">
			<img id="logo" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo.png" alt="M.W.B">
			<img id="logo-mobile" src="<?php echo bloginfo('template_directory'); ?>/images/MWB-logo-mobile.png" alt="M.W.B">
		</a>

		<?php 
			$args = array(
				'theme_location' => 'primary',
			); 
		?>
		<?php wp_nav_menu($args); ?>

		<div class="scrollTop">
			<img src="<?php echo bloginfo('template_directory'); ?>/images/scrollTop.png" alt="X">	
		</div><!-- /scrollTop -->
	</div><!-- /navbar-container -->