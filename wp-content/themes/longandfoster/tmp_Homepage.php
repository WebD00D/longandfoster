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
      <div><a href="tel:4345751100">434.575.1100</a></div>
      <div class="separator"></div>
      <div><a target="_blank" href="https://www.google.com/maps/place/3510+Old+Halifax+Rd,+South+Boston,+VA+24592/@36.7339301,-78.9151047,17z/data=!3m1!4b1!4m5!3m4!1s0x89ad63cc91554ea9:0xa5ed6f8f15f346dd!8m2!3d36.7339301!4d-78.912916">3510 Old Halifax Rd, South Boston, VA 24592</a></div>
      <div class="separator"></div>
      <div>M.-F. 9am–6pm <br/>Sat., Sun. 10am-4pm</div>
    </div>
  </div>

  <div class="homepage__about">
    <div class="fs-18 fc-light-blue">Long & Foster Halifax</div>
    <div class="fs-64 fc-dark-blue">Your Local Real Estate Team</div>
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

        <div class="listing">
          <div class="listing__bg"></div>
          <div class="listing__info fx-col">
            <div class="fs-12 fc-light-blue">Listing Type</div>
            <div class="fs-24 fc-dark-blue">607 Forest Ave</div>
            <div class="fs-18 fc-dark-red">$650,000</div>
            <div class="fx-row as-sb">
              <span class="fs-14 fc-light-blue">2080 sq/ft</span>
              <span>
                <span class="fs-18 fc-dark-blue ml-5 mr-5"><img style="height:18px;" src="<?php echo get_template_directory_uri() ?>/images/bed.png" /> 3</span>
                <span class="fs-18 fc-dark-blue ml-5 mr-5"><img style="height:18px;" src="<?php echo get_template_directory_uri() ?>/images/bath.png" /> 2.5</span>
              </span>
            </div>
          </div>
        </div>



      </div>

    </div>
  </div>



</div>

<?php get_footer(); ?>
