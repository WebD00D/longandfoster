<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package longandfoster
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer bg-light-grey pb-24" role="contentinfo">

			<div class="w-100 100m ht-100 pt-24  fx fx-align-center fx-justify-center">
				<div class="logo__container">
					<a href="/" class="logo"><img style="height:42px;" src="<?php echo get_template_directory_uri() ?>/images/Logo@2x.png" /></a>
				</div>
			</div>

			<div class="w-100 100m ht-100 fx fx-align-center fx-justify-center">
				<div class="w-150p fx fx-align-center fx-justify-sb">
					<a href="/"><img style="height:20px;" src="<?php echo get_template_directory_uri() ?>/images/instagram.png" /></a>
					<a href="/"><img style="height:20px;" src="<?php echo get_template_directory_uri() ?>/images/facebook.png" /></a>
					<a href="/"><img style="height:20px;" src="<?php echo get_template_directory_uri() ?>/images/twitter.png" /></a>
				</div>
			</div>

			<div class="mw-75 w-100m mt-24 fx fx-align-start fx-justify-sb mlra fxd-column-m">

				<div class="w-33 w-100m">
					<div class="mw-75 mlra">
						<div class="fs-14 fc-light-blue fw-3 w-100 t-sans">Address</div>
						<div class="mt-16 fc-dark-blue t-serif">
							3510 Old Halifax Rd, <br />
							South Boston, VA 24592
						</div>
						<div class="fs-14 fc-light-blue fw-3 w-100 mt-24 t-sans">Hours</div>
						<div class="mt-16 fc-dark-blue t-serif">
							Monday-Friday: 9am-6pm <br />
							Saturday-Sunday: 10am-5pm
						</div>
					</div>
				</div>

				<div class="w-33 w-100m">
					<div class="mw-75 mlra">
						<div class="fs-14 fc-light-blue fw-3 w-100 mt-24-sm t-sans">Contact</div>
						<div class="mt-16 fc-dark-blue t-serif">
							o. 434 - 575 - 1100 <br />
							c. 434 - 572 - 0150 <br />
							f.  434 - 575 - 1110 <br />
							e. contact@halifaxl&f.com <br />
						</div>
					</div>
				</div>

				<div class="w-33 w-100m">
					<div class="mw-75 mlra">
						<div class="fs-14 fc-light-blue fw-3 w-100  mt-24-sm t-sans">Site Navigation</div>
						<div class="mt-16 ">
							<a  href="<?php echo get_page_link( get_page_by_title( 'About' )->ID ); ?>" class="db td-none fc-dark-blue mb-4 t-serif">About</a>
							<a href="<?php echo get_page_link( get_page_by_title( 'Real Estate' )->ID ); ?>" class="db td-none fc-dark-blue mb-4 t-serif">Listings</a>
							<a href="<?php echo get_page_link( get_page_by_title( 'Community' )->ID ); ?>" class="db td-none fc-dark-blue mb-4 t-serif">Community</a>
						</div>
					</div>
				</div>
			</div>

				<div class="mw-75 mlra ht-100 pt-24  fx fx-align-center fx-justify-center fx-justify-start-m">
					<div class="fc-dark-blue t-serif">Copyright © 2017 Long & Foster</div>
				</div>



	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.js"></script>


</body>
</html>
