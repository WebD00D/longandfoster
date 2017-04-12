<?php
/*
Template Name: Listings Page
*/
?>

<?php

  $key = '';
  $order = '';

  if ( !empty( $_GET['key'] ) && !empty( $_GET['order'] ) ) {
    $key = $_GET['key'];
    $order = $_GET['order'];
    $posts = get_posts(array(
    	'post_type'			=> 'listings',
    	'posts_per_page'	=> -1,
    	'meta_key'			=> $key,
    	'orderby'			=> $key,
    	'order'				=> $order
    ));

  } else {
    $posts = get_posts(array(
    	'post_type'			=> 'listings',
    	'posts_per_page'	=> -1,
    	'meta_key'			=> 'price',
    	'orderby'			=> 'price',
    	'order'				=> 'DESC'
    ));
  }

?>

<?php get_header(); ?>

<div class="mt-48 mw-75 mlra fx fx-justify-center fx-align-center fx-col">
  <div class="fc-light-blue fw-3">Halifax County &amp; South Boston</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Real Estate for Sale</div>
  <div class="bg-dark-red hz-separator"></div>
  <div class="mt-32 mb-32 fw-3 fc-dark-blue ttu">Filter By</div>
  <div class="w-100 fx fx-row fx-align-center fx-justify-sa mb-32">
    <div class="bg-dark-red ht-48 fc-white fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer">All</div>
    <div class="bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer">New Listings</div>
    <div class="bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer">Homes</div>
    <div class="bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer">Commercial</div>
    <div class="bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer">Land &amp; Farm</div>
  </div>
  <div class="mt-48 mb-48">
    <label class="select-label ">
      <select class="js_price-filter ttu fc-dark-red pl-16 pr-16">
        <option val="high">Price: High to Low</option>
        <option val="low">Price: Low to High</option>
      </select>
    </label>
  </div>
</div>

<div class="w-100 bg-light-grey pt-48 pb-48 ">
  <div class="mw-75 mlra fx fx-justify-start fx-wrap container">
    <?php echo $test; ?>
    <?php

    if( $posts ): ?>

	   <?php foreach( $posts as $post ):
		    setup_postdata( $post );
        $url = get_permalink($post->ID);
        $title = $post->post_title;
        $featured_image = get_field('featured_image', $post->ID);
        $price = get_field('price', $post->ID);
        $listing_type = get_field('type_of_listing', $post->ID);
        $bedrooms = get_field('bedrooms', $post->ID);
        $bathrooms = get_field('bathrooms', $post->ID);
        $square_footage = get_field('square_footage', $post->ID);
		 ?>

      <a href="<?php echo $url; ?>" class="listing ma-16">
        <div class="listing__bg" style="background-image:url(<?php echo $featured_image; ?>);background-position:center;background-size:cover"></div>
        <div class="listing__info fx-col">
          <div class="fs-12 fc-light-blue"><?php echo $listing_type->name; ?></div>
          <div class="fs-16 fc-dark-blue"><?php echo $title; ?></div>
          <div class="fs-18 fc-dark-red">$<?php echo number_format($price); ?></div>
          <div class="fx-row as-sb">
            <span class="fs-14 fc-light-blue"><?php echo $square_footage; ?> sq/ft</span>
            <span class="fx">
              <span class="fs-16 fc-dark-blue ml-5 mr-5"><img style="height:14px;" src="<?php echo get_template_directory_uri() ?>/images/bed.png" /> <?php echo $bedrooms; ?></span>
              <span class="fs-16 fc-dark-blue ml-5 mr-5"><img style="height:14px;" src="<?php echo get_template_directory_uri() ?>/images/bath.png" /> <?php echo $bathrooms; ?></span>
            </span>
          </div>
        </div>
      </a>

    	<?php endforeach; ?>

  	<?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>

<script>

  $(document).ready(function(){

    $.urlParam = function(name){
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
      if ( results ) {
          return results[1] || 0;
      } else {
        return '';
      }
    }

    var keyParam = $.urlParam('key');
    var orderParam = $.urlParam('order');

    if (  $.trim(keyParam) != '' && $.trim(orderParam) != '' ) {
      if ( orderParam === 'DESC' ) {
        $(".js_price-filter").val('Price: High to Low');
      } else {
        $(".js_price-filter").val('Price: Low to High');
      }
    }

    $(".js_price-filter").change(function(){
      var filterBy = $(".js_price-filter option:selected").attr("val");
      var order = '';
      if ( filterBy === "high" ) {
        order = 'DESC'
      } else {
        order = 'ASC'
      }
      var onlyURL = window.location.href.replace(window.location.search,'');
      window.location.href = onlyURL + "?key=price&order=" + order
    })
  })

</script>
