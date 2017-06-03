<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

<div class="container m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">

  <div class="fs-24  lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">I am interested in:</div>

  <div class="ht-48 bg-light-grey mt-24 w-50 br-50p fx fx-justify-sa">
    <div data-interest="buying" class="interested-btn ht-48 w-175px bg-dark-red fc-white fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">Buying</div>
    <div data-interest="selling" class="interested-btn ht-48 w-175px bg-light-grey fc-light-blue fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">Selling</div>
    <div data-interest="general" class="interested-btn ht-48 w-175px bg-light-grey fc-light-blue fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">General Info</div>
  </div>

</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18">
  <?php echo get_field('hometown_team_copy'); ?>
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-24 pb-48 t-center copy fc-dark-blue fs-18">
  <image src="<?php echo get_field('agency_image'); ?>" />
</div>

<div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50">
  <div class="fs-18 fc-light-blue">Let's Chat</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Find us here</div>
  <div class="bg-dark-red hz-separator"></div>
</div>

<div class="pt-50 pb-64">


</div>

<div class="ht-120 bg-light-grey">
  {About Halifax Section Goes Here}
</div>

<?php get_footer(); ?>



<script>


    $(document).ready(function(){

      $(".interested-btn").click(function(){
        var interest = $(this).attr("data-interest");

        $(".interested-btn").removeClass("bg-dark-red").removeClass("fc-white").addClass("fc-light-blue")
        $(this).addClass("bg-dark-red").addClass("fc-white").removeClass("bg-light-grey")
        
      })




    })

</script>
