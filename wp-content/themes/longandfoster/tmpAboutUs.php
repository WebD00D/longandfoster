<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">
  <div class="fs-18 fc-light-blue t-sans">Halifax County & South Boston</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif">Your Hometown<br class="mobile-break" /> Team</div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18 t-sans">
  <?php echo get_field('hometown_team_copy'); ?>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18">
  <image src="<?php echo get_field('agency_image'); ?>" />
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50">
  <div class="fs-18 fc-light-blue t-sans">The Team</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif">Meet Our<br class="mobile-break" /> Agents</div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="pt-50 ">

  <?php

    if( have_rows('agents') ):

        $count = 0;

        while ( have_rows('agents') ) : the_row();

        $postobject = get_sub_field('agent');
        $url = get_permalink($postobject->ID);
        $name = $postobject->post_title;
        $featured_image = get_field('photo', $postobject->ID);
        $title = get_field('title', $postobject->ID);
        $content = apply_filters('the_content', $postobject->post_content); ?>

        <?php
        $bg = '#FFFFFF';

        if ($count % 2 != 0) {
          $bg = '#EBEDF1';
        }



         ?>

        <div class="pt-100 pb-100" style="background-color: <?php echo $bg; ?>">
          <div class="mw-75 m-auto fx fx-col-m">
            <div class="w-30 w-100--md fx fx-justify-center fx-justify-start-m">
              <image class="agent-image" src="<?php echo $featured_image; ?>" />
            </div>
            <div class="w-70 w-100--md pl-16 pl-0m pr-16 pt-12">
              <div class="fc-dark-blue f-24 t-serif"><?php echo $name; ?></div>
              <div class="fc-dark-red f-18 t-sans"><?php echo $title; ?></div>
              <div class="fc-dark-blue f-16 t-sans">
                <?php echo $content; ?>
              </div>
              <div>
              <a href="<?php echo $url; ?>" class="btn-lg dib t-sans">Learn More</a>
            </div>
            </div>
          </div>
        </div>

        <?php $count++; ?>

      <?php endwhile;

    endif;

  ?>
</div>

<div class="pt-100 pb-100 pl-24 pr-24 bg-light-grey fx fx-justify-center fx-align-center">
  <img style="height: auto;" src="<?php echo get_template_directory_uri() ?>/images/halifax-county.svg" />
  <div class="absolute mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">
    <div class="fs-18 fc-light-blue t-sans">South Boston & Halifax</div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif">About Halifax<br class="mobile-break" /> Virginia</div>
    <div class="bg-dark-red hz-separator"></div>
    <div class="fc-dark-blue f-18 mt-32 mb-32 t-center t-sans">Halifax is located in Virginia. Halifax, Virginia has a population of 1,109.</div>
    <a href="<?php echo get_page_link( get_page_by_title( 'Community' )->ID ); ?>" class="learn-more-btn t-sans">Explore Community</a>
  </div>
</div>





<?php get_footer(); ?>
