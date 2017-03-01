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

</div>

<?php get_footer(); ?>
