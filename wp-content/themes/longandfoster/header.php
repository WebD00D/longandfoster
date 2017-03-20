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


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'longandfoster' ); ?></a>



	<nav class="navbar">
		<div class="navbar__container">

			<div class="logo__container">
				<a class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png"></a>
			</div>

			<div class="navbar__page-links">
				<a href="#">About</a>
				<a href="#">Agents</a>
				<a href="#">Listing</a>
				<a href="#">Community</a>
			</div>

			<div class="navbar__contact">
				<a href="#">Contact</a>
			</div>

		</div>

	</nav>


	<div id="content" class="site-content">
