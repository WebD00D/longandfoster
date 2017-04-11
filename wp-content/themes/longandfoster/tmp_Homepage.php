<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="homepage">

  <div class="homepage__hero"></div>
  <div class="homepage__info-bar">
    <div class="info-bar__container">
      <div><a class="phone_number" href="tel:4345751100">434.575.1100</a></div>
      <div class="separator"></div>
      <div><a target="_blank" href="https://www.google.com/maps/place/3510+Old+Halifax+Rd,+South+Boston,+VA+24592/@36.7339301,-78.9151047,17z/data=!3m1!4b1!4m5!3m4!1s0x89ad63cc91554ea9:0xa5ed6f8f15f346dd!8m2!3d36.7339301!4d-78.912916">3510 Old Halifax Rd, South Boston, VA 24592</a></div>
      <div class="separator"></div>
      <div>M.-F. 9am–6pm <br/>Sat., Sun. 10am-4pm</div>
    </div>
  </div>

  <div class="homepage__about">
    <div class="fs-18 fc-light-blue">Long & Foster Halifax</div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Your Local <br class="mobile-break" /> Real Estate <br class="mobile-break" /> Team</div>
    <div class="bg-dark-red hz-separator"></div>
    <div class="copy fc-dark-blue fs-18">
      <?php echo get_field('about_us_intro'); ?>
    </div>
    <a href="#" class="btn-lg">Learn More</a>
  </div>

  <div class="homepage__featured">
    <div class="container">
      <div class="fs-34 fc-dark-blue t-center mb-60">Featured Listings</div>
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
                $listing_type = get_field('type_of_listing', $postobject->ID);
                $bedrooms = get_field('bedrooms', $postobject->ID);
                $bathrooms = get_field('bathrooms', $postobject->ID);
                $square_footage = get_field('square_footage', $postobject->ID);



                ?>


                <a href="<?php echo $url; ?>" class="listing">
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


            <?php  endwhile;

            else :

                // no rows found

            endif;

            ?>
      </div>

      <div class="fx-row fx-center pt-50">
        <a href="#" class="btn-lg">See all Listings</a>
      </div>

    </div>
  </div>

  <div class="homepage__your-home">
    <div class="fs-18 fc-light-blue">Your Home</div>
    <div class="fs-64 fs-40-m lh-44-m mb-16-m fc-dark-blue">Selling With Us</div>
    <div class="bg-dark-red hz-separator"></div>
    <div class="copy fc-dark-blue fs-18 mw-84">
      <?php echo get_field('selling_with_us'); ?>
    </div>
    <a href="#" class="btn-sm">Learn More</a>
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
