<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until id="main-core".
 *
 * @package UpeoThemes
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<?php upeo_hook_header(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?><?php upeo_bodystyle(); ?>>
<?php /* Body hook */ upeo_hook_bodyhtml(); ?>
<div id="body-core" class="hfeed site">

	<header>
	<div id="site-header">

		<?php if ( get_header_image() ) : ?>
			<div class="custom-header"><img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt=""></div>
		<?php endif; // End header image check. ?>
	
		<div id="pre-header">
		<div class="wrap-safari">
		<div id="pre-header-core" class="main-navigation">
  
			<?php if ( has_nav_menu( 'pre_header_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'pre-header-links-inner', 'theme_location' => 'pre_header_menu' ) ); ?>
			<?php endif; ?>

			<?php /* Social Media Icons */ upeo_input_socialmediaheader(); ?>

		</div>
		</div>
		</div>
		<!-- #pre-header -->

		<?php /* Add header - above slider */ upeo_input_headerlocationabove(); ?>

		<?php /* Add responsive header menu */ upeo_input_responsivehtml2(); ?>

		<?php /* Add sticky header */ upeo_input_headersticky(); ?>

		<?php /* Custom Slider */ upeo_input_sliderhome(); ?>

		<?php /* Custom Intro - Above */ upeo_custom_introabove(); ?>

		<?php /* Add header - above slider */ upeo_input_headerlocationbelow(); ?>

		<?php /* Custom Intro - Below */ upeo_custom_introbelow(); ?>

	</div>


	</header>
	<!-- header -->

	<?php /*  Call To Action - Intro */ upeo_input_ctaintro(); ?>
	<?php /*  Pre-Designed HomePage Content */ upeo_input_homepagesection(); ?>

	<div id="content">
	<div id="content-core">

		<div id="main">
		<div id="main-core">