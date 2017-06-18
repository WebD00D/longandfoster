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
<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700" rel="stylesheet">
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
				<a href="<?php echo get_page_link( get_page_by_title( 'Home Page' )->ID ); ?>" class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png" /></a>
			</div>

			<div class="navbar__page-links d-none-m">
				<a class="nav-link t-sans" href="<?php echo get_page_link( get_page_by_title( 'About' )->ID ); ?>">About</a>
				<a class="nav-link t-sans" href="<?php echo get_page_link( get_page_by_title( 'Real Estate' )->ID ); ?>">Listings</a>
				<div class="t-sans relative agent-link" href="#">

					Agents

					<div class="agent-menu bg-white absolute top-25 w-225px fx fx-col pt-12 pb-12 ">



						<?php
						$lastposts = get_posts( array(
						    'posts_per_page' => -1,
								'post_type'  => 'agents'
						) );

						if ( $lastposts ) {
						    foreach ( $lastposts as $post ) :
						        setup_postdata( $post ); ?>

										<a href="<?php the_permalink(); ?>" class="t-sans pb-8 pt-8 tt-none pa-8 c-pointer fc-dark-red td-none">
											<?php the_title(); ?>
										</a>

						    <?php
						    endforeach;
						    wp_reset_postdata();
						}

						?>


					</div>


				</div>
				<a class="nav-link t-sans" href="<?php echo get_page_link( get_page_by_title( 'Community' )->ID ); ?>">Community</a>
			</div>

			<div class="navbar__contact d-none-m">
				<a class="t-sans" href="<?php echo get_page_link( get_page_by_title( 'Contact' )->ID ); ?>">Contact</a>
			</div>

			<div class="d-none-dt fx fx-align-center">
				<a href="#" id="js_mobile-menu-button"><img style="height:20px;" src="<?php echo get_template_directory_uri() ?>/images/mobile-menu.png" /></a>
			</div>

		</div>

	</nav>


	<div id="js_mobile-menu" class="fixed top-0 left-0 bottom-0 right-0 bg--white f pb-48 overflow-y-scroll d-none">
		<div class="d-none-dt fx fx-align-center fx-justify-center ht-75 b bb b--light-grey" ><a id="js_mobile-close-button" href="#"><img style="height: 20px;" src="<?php echo get_template_directory_uri() ?>/images/mobile-close.png" /></a></div>
		<a  href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue t-sans">Home</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue t-sans">About</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue t-sans">Agents</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue t-sans">Listings</a>
		<div class="w-25p ht-2 bg-dark-red mlra"></div>
		<a href="#" class="w-100 fx fx-justify-center fx-align-center ht-75 td-none fc-dark-blue t-sans">Community</a>
		<div class="w-25p ht-2 bg-dark-red mlra mb-24"></div>
	  <a href="/" class="logo fx fx-align-center fx-justify-center ht-75"><img style="height:25px;" src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png"></a>
	</div>


	<div id="content" class="site-content" style="padding-top: 96px;">
