<?php get_header(); ?>



<?php

$postID = $post->ID;
$url = get_permalink($postID);
$featured_image = get_field('photo', $postID);
$title = get_field('title', $postID);
$contact = get_field('contact', $postID);
$facebook = get_field('facebook', $postID);
$twitter = get_field('twitter', $postID);
$instagram = get_field('instagram', $postID);
$short_description = get_field('short_description', $postID);
$content = get_field('bio', $postID);


?>


<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50">
  <div class="fs-18 fc-light-blue t-sans"><?php echo $title; ?></div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif"><?php echo get_the_title($postID); ?></div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-50">
  <image class="agent-image" src="<?php echo $featured_image; ?>" />
</div>


<div class="mw-85  mw-100m  m-auto fx fx-col fx-align-center">
  <div class="basic_copy basic_copy_m" >

    <div class="copy fc-dark-blue fs-18 t-left basic_copy_m w-100m t-serif" style="text-align: left">
      <?php echo $short_description; ?>
    </div>

  </div>
</div>

<div class="mw-85  m-auto fx fx-col fx-align-center pb-50">
  <div class="basic_copy  " >

    <div class="copy fc-dark-blue fs-18 t-left w-100m basic_copy_m w-100m t-sans" style="text-align: left">
      <?php echo $content ?>
    </div>

  </div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-align-start-m pb-50">
  <div class="basic_copy basic_copy_m" >
    <div class="copy fc-dark-blue fs-18 t-left w-100m t-serif" style="text-align: left">
      Contact <?php echo get_the_title($postID); ?><Br />
      <?php echo $contact ?>
    </div>

  </div>
</div>

<div class="agent-testimonials pt-64 pb-100">
  <div class="container">
    <div class="mw-85 m-auto ">
        <div class="fs-18 fc-light-blue t-center t-sans">What others are saying about</div>
        <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif"> <?php echo get_the_title($postID); ?></div>
        <div class="fx fx-justify-center fx-align-center">
          <div class="bg-dark-red hz-separator"></div>
        </div>
        <div class="testimonials m-auto">

          <?php
              if( have_rows('testimonials') ):
                  while ( have_rows('testimonials') ) : the_row(); ?>
                  <div class="t-center pt-24">
                    <div class="t-italic fc-dark-blue fw-1 t-sans" ><?php echo get_sub_field('testimonial'); ?></div>
                    <div class="f-18 fc-dark-blue t-serif"><?php echo get_sub_field('given_by'); ?></div>
                  </div>
              <?php  endwhile;
              else :

                  // no rows found

              endif;
              ?>
        </div>
  </div>
</div>
</div>


<div class="pt-100 pb-100">

  <div class="container">
      <div class="mw-85 m-auto">
        <div class="fs-18 fc-light-blue t-center t-sans">Let's Chat</div>
        <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif"> Find Me Here</div>
        <div class="fx fx-justify-center fx-align-center">
          <div class="bg-dark-red hz-separator"></div>
        </div>
        <div class="fx pt-64 fx-justify-center">
          <div class="w-150p fx fx-align-center fx-justify-sb">
  					<a href="<?php echo the_field('instagram'); ?>"><img style="height:30px;" src="<?php echo get_template_directory_uri() ?>/images/instagram.png" /></a>
  					<a href="<?php echo the_field('facebook'); ?>"><img style="height:30px;" src="<?php echo get_template_directory_uri() ?>/images/facebook.png" /></a>
  					<a href="<?php echo the_field('twitter'); ?>"><img style="height:30px;" src="<?php echo get_template_directory_uri() ?>/images/twitter.png" /></a>
  				</div>
        </div>
      </div>
  </div>

</div>


<div class="pt-100 pb-100 bg-light-grey">

  <div class="container">
      <div class="m-auto t-center">
        <div class="fc-dark-blue f-24 t-serif"><?php echo get_the_title($postID); ?>'s Featured Properties</div>
        <div class="homepage__featured">
          <div class="container">
            <div class="listings">

              <?php
                  // check if the repeater field has rows of data
                  if( have_rows('agents_featured_listings') ):

                   	// loop through the rows of data
                      while ( have_rows('agents_featured_listings') ) : the_row(); ?>

                      <?php
                      $postobject = get_sub_field('listing');
                      $url = get_permalink($postobject->ID);
                      $title = $postobject->post_title;
                      $featured_image = get_field('featured_image', $postobject->ID);
                      $price = get_field('price', $postobject->ID);
                      $listing_type = wp_get_post_terms($postobject->ID, 'listing_types');
                      $bedrooms = get_field('bedrooms', $postobject->ID);
                      $bathrooms = get_field('bathrooms', $postobject->ID);
                      $square_footage = get_field('square_footage', $postobject->ID);
                      ?>

                      <a href="<?php echo $url; ?>" class="listing">
                        <div class="listing__bg relative" style="background-image:url(<?php echo $featured_image; ?>);background-position:center;background-size:cover">
                          <?php
                          if ( has_term( 'new', 'listing_types', $postobject->ID ) ) { ?>
                            <div class="absolute pl-8 pr-8 pt-4 pb-4 bg-dark-red fc-white fw-1 t-sans t-center f-12" style="width: 75px; right: 0; bottom:0;">NEW!</div>
                            <?php } ?>
                        </div>
                        <div class="listing__info fx-col" style="text-align: left">
                          <div class="fs-12 fc-light-blue t-sans"><?php echo $listing_type[0]->name; ?></div>
                          <div class="fs-16 fc-dark-blue t-serif"><?php echo $title; ?></div>
                          <div class="fs-18 fc-dark-red t-sans">$<?php echo number_format($price); ?></div>
                          <div class="fx-row as-sb">
                            <span class="fs-14 fc-light-blue t-sans"><?php echo $square_footage; ?> sq/ft</span>
                            <span class="fx">
                              <span class="fs-16 fc-dark-blue ml-5 mr-5"><img style="height:14px;" src="<?php echo get_template_directory_uri() ?>/images/bed.png" /> <?php echo $bedrooms; ?></span>
                              <span class="fs-16 fc-dark-blue ml-5 mr-5"><img style="height:14px;" src="<?php echo get_template_directory_uri() ?>/images/bath.png" /> <?php echo $bathrooms; ?></span>
                            </span>
                          </div>
                        </div>
                      </a>


                  <?php  endwhile;

                  else :

                      // no rows found

                  endif;

                  ?>
            </div>

            <div class="fx-row fx-center pt-50">
              <a href="/realestate" class="btn-lg t-sans">See all Listings</a>
            </div>

          </div>
        </div>
      </div>
  </div>

</div>






<?php get_footer() ?>
<script>

$(document).ready(function(){

  $('.testimonials').slick({
    arrows: false,
    dots: true,
    autoplay: false,
    autoPlaySpeed: 5000,
    slidesToShow: 1,
    responsive: [
    {
      breakpoint: 900,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }

  ]

  });



  $('.listings').slick({
    arrows: false,
    dots: true,
    autoplay: true,
    autoPlaySpeed: 5000,
    slidesToShow: 3,
    responsive: [
    {
      breakpoint: 900,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 700,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1,
        centerMode: false,
      }
    },

  ],
  });


});

</script>
