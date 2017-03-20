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









<?php get_footer(); ?>
