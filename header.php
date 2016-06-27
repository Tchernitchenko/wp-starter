<?php
/**
 * Starter header
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo get_theme_mod( 'sidebar_layout', 'sidebar-right' ); ?>">

	<div class="nav-top-bar">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a id="nav-toggle" aria-controls="primary-menu" aria-expanded="false" href="#"><span></span></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', ) ); ?>
		</nav><!-- #site-navigation -->
	</div>

	<div class="site-branding-container">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
	</div>


<!-- 
	<?php if ( get_header_image() ) : ?>
		<style>

		h1.site-title a {
			text-shadow: 0px 0px 50px rgba(0, 0, 0, .6);
		}

		.site-description {
			text-shadow: 0px 0px 15px rgba(0, 0, 0, .7);
		}

		</style>
		
		<header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
	<?php else: ?>
		<header id="masthead" class="site-header" role="banner">
	<?php endif; ?> -->


	<div id="content" class="site-content">
