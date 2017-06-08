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
  <div class="fs-18 fc-light-blue"><?php echo $title; ?></div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center"><?php echo get_the_title($postID); ?></div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-50">
  <image class="agent-image" src="<?php echo $featured_image; ?>" />
</div>


<div class="mw-85 m-auto fx fx-col fx-align-center">
  <div class="basic_copy" >

    <div class="copy fc-dark-blue fs-18 t-left" style="text-align: left">
      <?php echo $short_description; ?>
    </div>

  </div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center pb-50">
  <div class="basic_copy" >

    <div class="copy fc-dark-blue fs-18 t-left" style="text-align: left">
      <?php echo $content ?>
    </div>

  </div>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center pb-50">
  <div class="basic_copy" >


    <div class="copy fc-dark-blue fs-18 t-left" style="text-align: left">
      Contact <?php echo get_the_title($postID); ?><Br />
      <?php echo $contact ?>
    </div>

  </div>
</div>

<div class="agent-testimonials pt-24 pb-24">
  <div class="container">


    <div class="mw-85 m-auto fx fx-col fx-align-center pb-50">
      <div class="basic_copy" >

        <div class="fs-18 fc-light-blue">What others are saying about</div>
        <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center"> <?php echo get_the_title($postID); ?></div>
        <div class="bg-dark-red hz-separator"></div>

        <div class="testimonials">


          <?php
              // check if the repeater field has rows of data
              if( have_rows('testimonials') ):

                // loop through the rows of data
                  while ( have_rows('testimonials') ) : the_row(); ?>


                  <div class="t-center pt-24">
                    <div class="t-italic fc-dark-blue fw-1" ><?php echo get_sub_field('testimonial'); ?></div>
                    <div class="f-18 fc-dark-blue"><?php echo get_sub_field('given_by'); ?></div>
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

</div>




<?php get_footer() ?>
<script>

$(document).ready(function(){
  $('.testimonials').slick({
    arrows: false,
    dots: true,
    autoplay: true,
    autoPlaySpeed: 5000,
    slidesToShow: 1,

  });
});

</script>
