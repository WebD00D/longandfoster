<?php get_header(); ?>

<?php

  $postID = $post->ID;
  $url = get_permalink($postID);
  $title = $postobject->post_title;
  $featured_image = get_field('featured_image', $postID);
  $price = get_field('price', $postID);
  $listing_type = get_field('type_of_listing', $postID);
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
<div class="container fx fx-row mt-48 mb-60">
  <div class="w-60 h-hero" style="background-image:url(<?php echo $featured_image ?>);background-size: cover; background-repeat:no-repeat;background-position: center"></div>
  <div class="w-40 pl-40 pr-40">
    <div class="ttu fc-light-blue f-12 ls-1">For Sale</div>
    <div class="fs-24 fc-dark-red">$<?php echo number_format($price); ?></div>
    <div class="fs-12 fc-light-blue mt-20"><?php echo $listing_type->name; ?></div>
    <div class="fs-24 fc-dark-blue mt-0 mt-10"><?php echo $address ?></div>
    <div class="w-75 fx-row fx-wrap fx-justify-sb mt-20">
      <div class="w-50 fx-col fx-align-start fx-justify-center">
        <div class="fs-24 fc-dark-red"><?php echo $year_built; ?></div>
        <div class="fc-light-blue f-12">Year Built</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center">
        <div class="fs-24 fc-dark-red"><?php echo number_format($square_footage); ?></div>
        <div class="fc-light-blue f-12">Square Feet</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center mt-10">
        <div class="fs-24 fc-dark-red"><?php echo $bedrooms; ?></div>
        <div class="fc-light-blue f-12">Bedrooms</div>
      </div>
      <div class="w-50 fx-col fx-align-start fx-justify-center mt-10">
        <div class="fs-24 fc-dark-red"><?php echo $bathrooms; ?></div>
        <div class="fc-light-blue f-12">Bathrooms</div>
      </div>
    </div>
    <div class="fx-row fx-align-center fx-justify-start mt-20">
      <a href="#" class="t-nodec"><div class="fx-col fx-align-center fx-justify-center mr-16">
        <div><i class="fa fa-share-alt fc-grey"></i></div>
        <div class="fs-14 fc-dark-red"><b>Share</b></div>
      </div></a>
      <a href="#" class="t-nodec"><div class="fx-col fx-align-center fx-justify-center ml-16">
        <div><i class="fa fa-print fc-grey"></i></div>
        <div class="fs-14 fc-dark-red"><b>Print</b></div>
      </div></a>
    </div>
  </div>
  </div>

  <div class="container fx fx-row mt-50 mb-50">
    <div class="w-60">
      <div class="f-14 fc-light-blue mb-24">Listing Updated <?php the_modified_date( 'F j, Y g:i a' ); ?></div>
      <div class="f-18 fc-dark-blue mb-8">Status: Active</div>
      <div class="f-18 fc-dark-blue mb-8">MLS#: 59221</div>
      <div class="f-18 fc-dark-blue mb-8">Type: Residential - Single Family</div>
      <div class="f-18 fc-dark-blue mb-8">Style: Contemporary, 2 Story</div>
      <div class="f-18 fc-dark-blue mb-8">Subdivision: None</div>
      <div class="f-18 fc-dark-blue mb-24">County: Halifax</div>
      <div class="f-18 fc-dark-blue">
        <?php
          $post = get_post($postID);
          $content = apply_filters('the_content', $post->post_content);
          echo $content;
        ?>
      </div>
    </div>
    <div class="w-40 pl-40 pr-40">
      <?php the_modified_date( 'F j, Y g:i a' ); ?>
    </div>
  </div>


</div>




<?php get_footer(); ?>
