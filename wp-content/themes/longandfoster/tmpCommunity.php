<?php
/*
Template Name: Community
*/
?>

<?php get_header(); ?>

<div class="homepage">

  <div class="hero" style="background-image:url(<?php echo get_field('hero_background'); ?>); background-attachment: fixed;background-repeat: no-repeat;  background-position: center center;  background-size: cover;">
    <div class="fs-18 fc-white mt-100 t-sans">Halifax County & South Boston, Virginia</div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-serif">Community</div>
    <div class="bg-dark-red hz-separator"></div>
  </div>
  <div class="homepage__info-bar">
    <div class="info-bar__container">
      <div><a class="phone_number" href="tel:4345751100 t-serif">434.575.1100</a></div>
      <div class="separator"></div>
      <div><a class="t-serif" target="_blank" href="https://www.google.com/maps/place/3510+Old+Halifax+Rd,+South+Boston,+VA+24592/@36.7339301,-78.9151047,17z/data=!3m1!4b1!4m5!3m4!1s0x89ad63cc91554ea9:0xa5ed6f8f15f346dd!8m2!3d36.7339301!4d-78.912916">3510 Old Halifax Rd, South Boston, VA 24592</a></div>
      <div class="separator"></div>
      <div class="t-serif">M.-F. 9am–6pm <br/>Sat., Sun. 10am-4pm</div>
    </div>
  </div>

  <div class="homepage__about">
    <div class="fs-18 fc-light-blue t-sans">Living In</div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif">South Boston, <br class="mobile-break" /> Virginia</div>
    <div class="bg-dark-red hz-separator"></div>
    <div class="copy fc-dark-blue fs-18 mt-24 t-sans">
      <?php echo get_field('living_in_south_boston'); ?>
    </div>

    <div class="copy mt-60">
      <img src="<?php echo get_field('living_in_south_boston_primary_photo'); ?>" style="width: 100%; height: auto" />


        <div class="w-100 ht-100 ht-70-m  fx fx-justify-sb pics">
          <?php
            if( have_rows('photos') ): ?>

            <?php
                $count = 1;
                while ( have_rows('photos') ) : the_row(); ?>


                <?php if ( $count > 5 ) { ?>

                  <!-- Any more photos after 4, we'll add a display none so it doesn't show up in the grid. -->
                  <a class="listing_img_thumb br-tl-3 br-tr-3" style="outline:none;display:none" href="<?php echo the_sub_field('photo'); ?>" data-fancybox="group"  data-caption="<?php echo the_sub_field('caption'); ?>">
                     <div class="br-tl-3 br-tr-3 ht-100 ht-70-m w-100" style="background-image:url(<?php echo the_sub_field('photo'); ?>);background-size: cover; background-repeat:no-repeat;background-position: center" ></div>
                  </a>

                <?php } ?>


                <?php if ( $count <= 4 ) { ?>

                  <a class="listing_img_thumb br-tl-3 br-tr-3" style="outline:none" href="<?php echo the_sub_field('photo'); ?>" data-fancybox="group" data-caption="<?php echo the_sub_field('caption'); ?>">
                     <div class="br-tl-3 br-tr-3 ht-100 ht-70-m w-100" style="background-image:url(<?php echo the_sub_field('photo'); ?>);background-size: cover; background-repeat:no-repeat;background-position: center" ></div>
                  </a>

                <?php } ?>

                <?php if ( $count == 5 ) { ?>

                  <!-- The 'More' photo will get appeneded last. -->
                  <a class="listing_img_thumb br-tl-3 br-tr-3 relative" style="outline:none" href="<?php echo the_sub_field('photo'); ?>" data-fancybox="group" data-caption="<?php echo the_sub_field('caption'); ?>">
                     <div class="br-tl-3 br-tr-3 ht-100 ht-70-m w-100" style="background-image:url(<?php echo the_sub_field('photo'); ?>);background-size: cover; background-repeat:no-repeat;background-position: center" >
                       <div class="absolute more-pic-blue ht-100p ht-70-m w-100 br-tl-3 br-tr-3 fx fx-align-center fx-justify-center">
                         <div class="fc-white f-14 t-serif">More</div>
                       </div>
                     </div>
                  </a>

                <?php } ?>


            <?php $count++;  endwhile;
            endif;
            ?>
        </div>



    </div>




  </div>

  <div class="homepage__featured">
    <div class="container">
      <div class="fs-34 fc-dark-blue t-center mb-24 t-serif">Things To Do</div>
      <div class="bg-dark-red hz-separator" style="margin:auto"></div>

      <div class="basic_copy">

        <div class="copy fc-dark-blue fs-18 mt-24 t-center t-sans">
          <?php echo get_field('things_to_do'); ?>
        </div>

      </div>

    </div>
  </div>

  <div class="homepage__your-home">
    <div class="fs-18 fc-light-blue t-sans">Overview of </div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m fc-dark-blue t-serif">Halifax, Virginia</div>
    <div class="bg-dark-red hz-separator"></div>
    <div class="copy fc-dark-blue fs-18 mw-84 mt-24 t-sans">
      <?php echo get_field('overview_of_halifax'); ?>
    </div>
  </div>


  <div class="homepage__featured">
    <div class="container">
      <div class="fs-34 fc-dark-blue t-center mb-60 t-serif">Featured Listings</div>
      <div class="listings">


        <?php
            // check if the repeater field has rows of data
            if( have_rows('featured_properties') ):

             	// loop through the rows of data
                while ( have_rows('featured_properties') ) : the_row(); ?>

                <?php
                $postobject = get_sub_field('listing');
                $url = get_permalink($postobject->ID);
                $title = $postobject->post_title;
                $featured_image = get_field('featured_image', $postobject->ID);
                $price = get_field('price', $postobject->ID);
                $listing_type = wp_get_post_terms($post->ID, 'listing_types');
                $bedrooms = get_field('bedrooms', $postobject->ID);
                $bathrooms = get_field('bathrooms', $postobject->ID);
                $square_footage = get_field('square_footage', $postobject->ID);



                ?>


                <a href="<?php echo $url; ?>" class="listing">
                  <div class="listing__bg" style="background-image:url(<?php echo $featured_image; ?>);background-position:center;background-size:cover"></div>
                  <div class="listing__info fx-col">
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
        <a href="<?php echo get_page_link( get_page_by_title( 'Real Estate' )->ID ); ?>" class="btn-lg t-sans">See all Listings</a>
      </div>

    </div>
  </div>


</div>

<?php get_footer(); ?>

<script>

$(document).ready(function(){
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
