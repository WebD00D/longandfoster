<?php
/*
Template Name: Listings Page
*/
?>

<?php

  $key = '';
  $order = '';
  $filter = '';


  // TODO: Check for case where both filter and keys do not exist..
  if ( empty( $_GET['key'] ) && empty( $_GET['order'] ) && empty( $_GET['filter'] ) ) {

    $posts = get_posts(array(
      'post_type'			=> 'listings',
      'posts_per_page'	=> -1,
      'meta_key'			=> 'price',
      'orderby'			=> 'price',
      'order'				=> 'DESC',
    ));

  } elseif ( !empty( $_GET['key'] ) && !empty( $_GET['order'] ) && !empty( $_GET['filter'] ) ) {

    $key = $_GET['key'];
    $order = $_GET['order'];
    $filter = $_GET['filter'];

    if ( $filter == 'all' ) {
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
        'meta_key'			=> $key,
        'orderby'			=> $key,
        'order'				=> $order,
        'tax_query' => array(
          array(
            'taxonomy' => 'listing_types',
            'field' => 'slug',
            'terms' => $filter,
            'include_children' => false
          )
        )
      ));
    }



  } elseif ( !empty( $_GET['key'] ) && !empty( $_GET['order'] ) && empty( $_GET['filter'] ) ) {

    $key = $_GET['key'];
    $order = $_GET['order'];
    $posts = get_posts(array(
      'post_type'			=> 'listings',
      'posts_per_page'	=> -1,
      'meta_key'			=> $key,
      'orderby'			=> $key,
      'order'				=> $order
    ));
  } elseif ( empty( $_GET['key'] ) && empty( $_GET['order'] ) && !empty( $_GET['filter'] ) ) {

    $filter = $_GET['filter'];

    if ( $filter == 'all' ) {
      $posts = get_posts(array(
        'post_type'			=> 'listings',
        'posts_per_page'	=> -1,
        'meta_key'			=> 'price',
        'orderby'			=> 'price',
        'order'				=> 'DESC',
      ));
    } else {
      $posts = get_posts(array(
        'post_type'			=> 'listings',
        'posts_per_page'	=> -1,
        'meta_key'			=> 'price',
        'orderby'			=> 'price',
        'order'				=> 'DESC',
        'tax_query' => array(
          array(
            'taxonomy' => 'listing_types',
            'field' => 'slug',
            'terms' => $filter,
            'include_children' => false
          )
        )
      ));
    }


  }


?>

<?php get_header(); ?>

<div id="loading" style="background-color: rgb(255, 255, 255); flex-direction: row; align-items: center; justify-content: center; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 1;display:flex;flex-direction:column">
  <img style="height: 50px; margin-right: 20px" src="<?php echo get_template_directory_uri() ?>/images/loading.gif">
  <div class="mt-24 t-serif fc-dark-blue"> Finding Homes...</div>
</div>

<div class="mt-48 mw-75 mlra fx fx-justify-center fx-align-center fx-col">
  <div class="fc-light-blue fw-3 t-sans">Halifax County &amp; South Boston</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center t-serif">Real Estate for Sale</div>
  <div class="bg-dark-red hz-separator mb-32"></div>

  <div class="w-100 fx fx-row fx-align-center fx-justify-sa mb-20" style="flex-wrap: wrap">
    <div data-filter="all" class="filter-btn bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer t-sans big-hover mb-12 ">All</div>
    <div data-filter="new" class="filter-btn bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer t-sans big-hover mb-12 ">New Listings</div>
    <div data-filter="home" class="filter-btn bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer t-sans big-hover mb-12 ">Homes</div>
    <div data-filter="commercial" class="filter-btn bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer t-sans big-hover mb-12 ">Commercial</div>
    <div data-filter="land-and-farm" class="filter-btn bg-light-grey ht-48 fc-light-blue fw-3 w-150p br-50p fx fx-align-center fx-justify-center c-pointer t-sans big-hover mb-12 ">Land &amp; Farm</div>
  </div>
  <div class="mt-24 mb-24">
    <label class="select-label ">
      <select class="js_price-filter ttu fc-dark-red pl-16 pr-16 t-sans">
        <option val="high">Price: High to Low</option>
        <option val="low">Price: Low to High</option>
      </select>
    </label>
  </div>
</div>

<div class="w-100 bg-light-grey pt-48 pb-48 ">
  <div class="listing-wrapper  mlra fx fx-justify-start fx-wrap ">

    <?php if ( $posts ): ?>
	   <?php foreach( $posts as $post ):
		    setup_postdata( $post );
        $url = get_permalink($post->ID);
        $title = $post->post_title;
        $featured_image = get_field('featured_image', $post->ID);
        $price = get_field('price', $post->ID);
        $listing_type = wp_get_post_terms($post->ID, 'listing_types');
        $bedrooms = get_field('bedrooms', $post->ID);
        $bathrooms = get_field('bathrooms', $post->ID);
        $square_footage = get_field('square_footage', $post->ID);
		 ?>

      <a href="<?php echo $url; ?>" class="listing ma-16">
        <div class="listing__bg relative" style="background-image:url(<?php echo $featured_image; ?>);background-position:center;background-size:cover">

          <?php
          if ( has_term( 'new', 'listing_types' ) ) { ?>
            <div class="absolute pl-8 pr-8 pt-4 pb-4 bg-dark-red fc-white fw-1 t-sans t-center f-12" style="width: 75px; right: 0; bottom:0;">NEW!</div>
            <?php } ?>

        </div>
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

    	<?php endforeach; ?>

  	<?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>

<script>

  $(document).ready(function(){

    setTimeout(function(){
      $("#loading").fadeOut()
    },500);

    $.urlParam = function(name){
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
      if ( results ) {
          return results[1] || 0;
      } else {
        return '';
      }
    }


    var filterBy = $.urlParam('filter');

    $(".filter-btn").removeClass("bg-dark-red").removeClass("fc-white");
    $(".filter-btn").addClass("bg-light-grey").addClass("fc-light-blue");

    $('*[data-filter="'+ filterBy +'"]').removeClass("bg-light-grey").removeClass("fc-light-blue");
    $('*[data-filter="'+ filterBy +'"]').addClass("bg-dark-red").addClass("fc-white");

    var keyParam = $.urlParam('key');
    var orderParam = $.urlParam('order');

    if (  $.trim(keyParam) != '' && $.trim(orderParam) != '' ) {
      if ( orderParam === 'DESC' ) {
        $(".js_price-filter").val('Price: High to Low');
      } else {
        $(".js_price-filter").val('Price: Low to High');
      }
    }


    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;

      for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');

          if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : sParameterName[1];
          }
      }
  };

    $(".js_price-filter").change(function(){

      var filterBy = $(".js_price-filter option:selected").attr("val");
      var order = '';
      if ( filterBy === "high" ) {
        order = 'DESC'
      } else {
        order = 'ASC'
      }

      var onlyURL = window.location.href.replace(window.location.search,'');
      // CHECK TO SEE IF ANY FILTER PARAMS EXIST.
      var filter = getUrlParameter('filter');

      if ( filter ) {
        window.location.href = onlyURL + "?filter=" + filter + "&key=price&order=" + order;
      } else {
        window.location.href = onlyURL + "?key=price&order=" + order
      }


    })



    $(".filter-btn").click(function(e){

      e.preventDefault();

      var filter = $.trim($(this).attr("data-filter"));

      $(".filter-btn").removeClass("bg-dark-red").removeClass("fc-white");
      $(".filter-btn").addClass("bg-light-grey").addClass("fc-light-blue");
      $(this).removeClass("bg-light-grey").removeClass("fc-light-blue");
      $(this).addClass("bg-dark-red").addClass("fc-white");

      // check to see if any of the other keys exists too..
      var onlyURL = window.location.href.replace(window.location.search,'');

      // ON FILTER BUTTON CLICK , CHECK TO SEE IF WE NEED TO INCLUDE AND KEY / ORDERS..

      var key = getUrlParameter('key');
      var order = getUrlParameter('order');

      if ( key && order ) {
        window.location.href = onlyURL + "?filter=" + filter + "&key=price&order=" + order;
      } else {
        window.location.href = onlyURL + "?filter=" + filter;
      }

    })



  })

</script>
