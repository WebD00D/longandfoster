<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">
  <div class="fs-18 fc-light-blue">Halifax County & South Boston</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Your Hometown<br class="mobile-break" /> Team</div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18">
  <?php echo get_field('hometown_team_copy'); ?>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18">
  <image src="<?php echo get_field('agency_image'); ?>" />
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50">
  <div class="fs-18 fc-light-blue">The Team</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Meet Our<br class="mobile-break" /> Agents</div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="pt-50 pb-64">

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
              <div class="fc-dark-blue f-24"><?php echo $name; ?></div>
              <div class="fc-dark-red f-18"><?php echo $title; ?></div>
              <div class="fc-dark-blue f-16">
                <?php echo $content; ?>
              </div>
              <div>
              <a href="<?php echo $url; ?>" class="btn-lg dib">Learn More</a>
            </div>
            </div>
          </div>
        </div>

        <?php $count++; ?>

      <?php endwhile;

    endif;

  ?>
</div>

<div class="ht-120 bg-light-grey">
  {About Halifax Section Goes Here}
</div>





<?php get_footer(); ?>
