<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package longandfoster
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css" rel="stylesheet">
<script src="https://use.fontawesome.com/f9a957d2bf.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>





<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'longandfoster' ); ?></a>

	<nav class="navbar">
		<div class="w-100 fx fx-justify-sb ml-48 mr-48 ml-16-m mr-16-m">

			<div class="logo__container">
				<a href="/" class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png" /></a>
			</div>

			<div class="navbar__page-links d-none-m">
				<a href="#">About</a>
				<a href="#">Agents</a>
				<a href="/listings">Listings</a>
				<a href="#">Community</a>
			</div>

			<div class="navbar__contact d-none-m">
				<a href="#">Contact</a>
			</div>

			<div class="d-none-dt fx fx-align-center">
				<a href="#" id="js_mobile-menu-button"><img style="height:20px;" src="<?php echo get_template_directory_uri() ?>/images/mobile-menu.png" /></a>
			</div>

		</div>

	</nav>


	<div id="js_mobile-menu" class="fixed top-0 left-0 bottom-0 right-0 bg--white f pb-48 overflow-y-scroll d-none">
		<div class="d-none-dt fx fx-align-center fx-justify-center ht-75 b bb b--light-grey" ><a id="js_mobile-close-button" href="#"><img style="height: 20px;" src="<?php echo get_template_directory_uri() ?>/images/mobile-close.png" /></a></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue">Home</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue">About</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue">Agents</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue">Listings</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue">Community</a>
		<div class="w-25p ht-2 bg-dark-red mlra mb-24"></div>
	  <a href="/" class="logo fx fx-align-center fx-justify-center ht-75"><img style="height:25px;" src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png"></a>
	</div>


	<div id="content" class="site-content" style="padding-top: 96px;">
