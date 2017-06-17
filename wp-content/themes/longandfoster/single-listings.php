<?php get_header(); ?>

<?php

  $postID = $post->ID;
  $url = get_permalink($postID);
  $title = $postobject->post_title;
  $featured_image = get_field('featured_image', $postID);
  $price = get_field('price', $postID);
  $listing_type = wp_get_post_terms($post->ID, 'listing_types');
  $address = get_field('address', $postID);
  $county = get_field('county', $postID);
  $subdivision = get_field('subdivision', $postID);
  $year_built = get_field('year_built', $postID);
  $square_footage = get_field('square_footage', $postID);
  $bedrooms = get_field('bedrooms', $postID);
  $bathrooms = get_field('bathrooms', $postID);
  $style = get_field('style', $postID);
  $mls_number = get_field('mls_number', $postID);
  $lot_size = get_field('lot_size', $postID);

  $agent = get_field('agent', $postID);
  $agent_name = $agent->post_title;
  $agent_photo = get_field('photo', $agent->ID);
  $agent_title = get_field('title', $agent->ID);
  $agent_contact = get_field('contact', $agent->ID);

  $video_url = get_field('video', $postID);

  // Have repeaters for schools, and photos. We'll just use them in the DOM

?>

<div class="single-listing">
<div class="container fx fx-row fx-col-m mt-48 mb-60">
  <div class="w-60 w-100m"  >
    <div class="w-100  h-hero relative" style="background-image:url(<?php echo $featured_image ?>);background-size: cover; background-repeat:no-repeat;background-position: center">

      <?php
      if ( has_term( 'new', 'listing_types' ) ) { ?>
        <div class="absolute pl-8 pr-8 pt-4 pb-4 bg-dark-red fc-white fw-1 t-sans t-center f-12" style="width: 75px; right: 0; bottom:0;">NEW!</div>
        <?php } ?>

    </div>

    <div class="fx fx-row mt-12 ">
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
  <div class="w-40 w-100m pl-40 pl-0m pr-40 mt-24m">
    <div class="ttu fc-light-blue f-12 ls-1 t-sans">For Sale</div>
    <div class="fs-24 fc-dark-red t-sans">$<?php echo number_format($price); ?></div>
    <div class="fs-12 fc-light-blue mt-20 t-sans"><?php echo $listing_type[0]->name;?></div>
    <div class="fs-24 fc-dark-blue mt-0 mt-10 t-serif"><?php echo $address ?></div>
    <div class="f-14 fc-light-blue mb-24 d-none-m t-sans">Listing Updated <?php the_modified_date( 'F j, Y g:i a' ); ?></div>
    <div class="w-75 fx-row fx-wrap fx-justify-sb mt-20">
      <div class="w-50 fx-col fx-align-start fx-justify-center">
        <div class="fs-24 fc-dark-red t-sans"><?php echo $year_built; ?></div>
        <div class="fc-light-blue f-12 t-serif">Year Built</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center">
        <div class="fs-24 fc-dark-red t-sans"><?php echo number_format($square_footage); ?></div>
        <div class="fc-light-blue f-12 t-serif">Square Feet</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center mt-10">
        <div class="fs-24 fc-dark-red t-sans"><?php echo $bedrooms; ?></div>
        <div class="fc-light-blue f-12 t-serif">Bedrooms</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center mt-10">
        <div class="fs-24 fc-dark-red t-sans"><?php echo $bathrooms; ?></div>
        <div class="fc-light-blue f-12 t-serif">Bathrooms</div>
      </div>
    </div>
    <div class="fx-row fx-align-center fx-justify-start mt-20">
      <a href="#" class="t-nodec"><div class="fx-col fx-align-center fx-justify-center mr-16">
        <div><i class="fa fa-share-alt fc-grey"></i></div>
        <div class="fs-14 fc-dark-red t-sans"><b>Share</b></div>
      </div></a>
      <a href="#" class="t-nodec"><div class="fx-col fx-align-center fx-justify-center ml-16">
        <div><i class="fa fa-print fc-grey"></i></div>
        <div class="fs-14 fc-dark-red t-sans"><b>Print</b></div>
      </div></a>
      <?php if( get_field('video') ): ?>
         <a href="<?php echo get_field('video'); ?>" target="_blank" class="t-nodec"><div class="fx-col fx-align-center fx-justify-center ml-24">
           <div><i class="fa fc-grey fa-youtube"></i></div>
             <div class="fs-14 fc-dark-red t-sans"><b>Video</b></div>
         </div>
         </a>
    <?php endif; ?>

    </div>
  </div>
  </div>


  <div class="container fx fx-row fx-col-m mt-48 mb-48">
    <div class="w-50 w-100m">
      <div class="f-18 fc-dark-blue mb-8 t-sans">Status: <?php echo get_field('status'); ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">MLS#: <?php echo get_field('mls_number') ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">Style: <?php echo get_field('style'); ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">Subdivision: <?php echo get_field('subdivision'); ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">County: <?php echo get_field('county'); ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">Lot Size: <?php echo get_field('lot_size'); ?></div>
      <div class="f-18 fc-dark-blue mb-8 t-sans">Lot Size: <?php echo get_field('lot_size'); ?></div>

              <?php
                  // check if the repeater field has rows of data
                  if( have_rows('schools') ): ?>

                    <div class="f-18 fc-dark-blue mb-8 t-sans">Schools:</div>

                    <?php  while ( have_rows('schools') ) : the_row(); ?>

                          <div class="f-12 fc-light-blue t-sans"><?php the_sub_field('school_name'); ?></div>
                          <div class="f-12 fc-light-blue t-italic mb-16 t-sans"><?php the_sub_field('school_details'); ?></div>

                    <?php
                      endwhile;

                  else :

                      // no rows found

                  endif;

        ?>




    </div>
    <div class="w-50 w-100m pl-0m pr-0m  ">

      <?php



            $postobject = get_field('agent');
            $agent_url = get_permalink($postobject->ID);
            $name = $postobject->post_title;
            $featured_image = get_field('photo', $postobject->ID);
            $title = get_field('title', $postobject->ID);
            $content = apply_filters('the_content', $postobject->post_content); ?>




      <div class="ht-300p ht-auto-m w-100 fx fx-col-m  fx-justify-center fx-align-center">
        <div class="w-40 w-100m pt-8 pb-8">
          <img class="single-listing-agent-image"  src="<?php echo $featured_image; ?>" />
        </div>
        <div class="w-60 w-100m pl-16 pl-0m pt-8 pb-8">
          <div class="fs-12 fc-light-blue">Listed By</div>
          <div class="fs-24 fc-dark-blue mt-0 mt-10 mb-12"><?php echo $name; ?></div>
          <div class="f-16 fc-dark-blue mb-24">
            3510 Old Halifax Road <Br />
            South Boston, VA
          </div>
          <a href="<?php echo $agent_url; ?>" class="bg-light-grey ht-48 fc-light-blue w-150p fx fx-align-center fx-justify-center br-50p td-none">About</a>
          <div class="fs-12 fc-light-blue mt-20">Contact</div>
          <div class="fx w-100 ">
            <div class="fs-12 fc-dark-red mr-12">804.555.5555</div>
            <div class="fs-12 fc-dark-red">rva.christian91@gmail.com</div>
          </div>

        </div>
      </div>


    </div>
  </div>

  <div class="container fx fx-row fx-col-m mt-24 mb-48">

    <div class="w-50 w-100m">
      <div class="fs-24 fc-dark-red">Highlights</div>

      <div class="w-50 w-100m">
        <?php
          if( have_rows('appliance_highlights') ): ?>
              <div class="f-20 fc-dark-blue mb-16 mt-24">Appliances</div>
          <?php
              while ( have_rows('appliance_highlights') ) : the_row(); ?>
                  <div class="f-16 fc-dark-blue mb-4"><?php echo the_sub_field('highlight'); ?></div>
          <?php  endwhile;
          endif;
          ?>
      </div>

      <div class="w-50 w-100m">
        <?php
          if( have_rows('interior_highlights') ): ?>
              <div class="f-20 fc-dark-blue mb-16 mt-24">Interior</div>
          <?php
              while ( have_rows('interior_highlights') ) : the_row(); ?>
                  <div class="f-16 fc-dark-blue mb-4"><?php echo the_sub_field('highlight'); ?></div>
          <?php  endwhile;
          endif;
          ?>
      </div>

      <div class="w-50 w-100m">
        <?php
          if( have_rows('utility_highlights') ): ?>
              <div class="f-20 fc-dark-blue mb-16 mt-24">Utilities</div>
          <?php
              while ( have_rows('utility_highlights') ) : the_row(); ?>
                  <div class="f-16 fc-dark-blue mb-4"><?php echo the_sub_field('highlight'); ?></div>
          <?php  endwhile;
          endif;
          ?>
      </div>

      <div class="w-50 w-100m">
        <?php
          if( have_rows('basement_highlights') ): ?>
              <div class="f-20 fc-dark-blue mb-16 mt-24">Basement</div>
          <?php
              while ( have_rows('basement_highlights') ) : the_row(); ?>
                  <div class="f-16 fc-dark-blue mb-4"><?php echo the_sub_field('highlight'); ?></div>
          <?php  endwhile;
          endif;
          ?>
      </div>


    </div>

    <div class="w-50 w-100m">
      <div class="f-18 fc-dark-blue">
        <?php
          $post = get_post($postID);
          $content = apply_filters('the_content', $post->post_content);
          echo $content;
        ?>
      </div>
    </div>

  </div>


  <div class="pt-100 pb-100 pl-24 pr-24 bg-light-grey fx fx-justify-center fx-align-center">
    <img style="height: auto;" src="<?php echo get_template_directory_uri() ?>/images/halifax-county.svg" />
    <div class="absolute mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">
      <div class="fs-18 fc-light-blue">South Boston & Halifax</div>
      <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">About Halifax<br class="mobile-break" /> Virginia</div>
      <div class="bg-dark-red hz-separator"></div>
      <div class="fc-dark-blue f-18 mt-32 mb-32 t-center">Halifax is located in Virginia. Halifax, Virginia has a population of 1,109.</div>
      <a href="<?php echo get_page_link( get_page_by_title( 'Community' )->ID ); ?>" class="learn-more-btn">Explore Community</a>
    </div>
  </div>


</div>


<?php get_footer(); ?>
