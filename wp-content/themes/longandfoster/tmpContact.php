<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

<?php

  //response generation function
  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }
?>

<?php

  $missing_content = "Some fields contain invalid or empty information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  $name = $_POST['firstname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $interest = $_POST['interest'];

  $to = get_option('admin_email');
  $subject = "Someone sent a message from Long and Foster Website!";
  $headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

  $test = "no";
  $response;
  $color;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $test = "yes";

        $name = strip_tags(trim($_POST["firstname"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            //http_response_code(400);
            $response =  $missing_content;
            $color = "red";
          //  exit;
        } else {

          $recipient = "hello@getboardbox.com";
          $subject = "New contact from $name";

          // Build the email content.
          $email_content = "Name: $name\n";
          $email_content .= "Email: $email\n";
          $email_content .= "Interest :$interest\n";
          $email_content .= "Message:\n$message\n";

          // Build the email headers.
          $email_headers = "From: $name <$email>";

          // Send the email.
          if (mail($recipient, $subject, $email_content, $email_headers)) {
              // Set a 200 (okay) response code.
              http_response_code(200);
              $response =  "Thank You! Your message has been sent.";
              $color = "green";
          } else {
              // Set a 500 (internal server error) response code.
              http_response_code(500);
              $response = "Oops! Something went wrong and we couldn't send your message.";
              $color = "red";
          }

        }



  } else {
    $message = "not a post";
  }


?>

<div class="container m-auto fx fx-col fx-align-center fx-justify-center pt-50 pb-48">

  <div class="fs-24  lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">I am interested in:</div>
  <div class="ht-48 bg-light-grey mt-24 w-50 w-100m br-50p fx fx-justify-sb">
    <div data-interest="buying" class="interested-btn ht-48 w-175px bg-dark-red fc-white fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">Buying</div>
    <div data-interest="selling" class="interested-btn ht-48 w-175px bg-light-grey fc-light-blue fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">Selling</div>
    <div data-interest="general" class="interested-btn ht-48 w-175px bg-light-grey fc-light-blue fx fx-justify-center fx-align-center fw-3 br-50p c-pointer">General Info</div>
  </div>

</div>

<form id="frmContact" method="post" class="container contact-form m m-auto fx fx-justify-sa fx-col pb-4 mb-44">
  <div class="fx fx-row w-100 ">
    <div class="w-50 pa-4">
      <label for="name" class="pb-4 fc-dark-blue fw-3 f-16">First & Last Name</label>
      <input id="name" name="firstname"  type="text" class="ht-48 bg-light-grey b-none w-100 pl-8" required />
    </div>
    <div class="w-50 pa-4">
      <label for="email" class="pb-4 fc-dark-blue fw-3 f-16">Email</label>
      <input id="email" name="email"  type="text" class="ht-48 bg-light-grey b-none w-100 pl-8" required />
    </div>
  </div>
  <div class="fx fx-row w-100 mt-24">
    <div class="w-100 pa-4">
      <label class="pb-4 fc-dark-blue fw-3 f-16">Ask a question, or send us a message.</label>
      <textarea id="message" name="message" required class="ht-200 bg-light-grey b-none w-100 mb-16 pl-8"></textarea>
    </div>
  </div>
  <input id="txtTypeValue" hidden name="interest" value="buying" type="text" />
  <div class="fx fx-row w-100 mt-24 fx-justify-end">
    <button  class="contact-submit" style="float:right">Submit</button>
  </div>
  <div id="form-messages" style="color:<?php echo $color; ?>"><?php echo $response; ?></div>
</form>

<!-- <div class="mw-85 m-auto fx fx-col fx-align-center fx-justify-center pt-50">
  <div class="fs-18 fc-light-blue">Let's Chat</div>
  <div class="fs-64 fs-40-m lh-44-m mb-16-m mt-16-m fc-dark-blue t-center">Find us here</div>
  <div class="bg-dark-red hz-separator"></div>

  <div></div>

</div> -->



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

        $("#txtTypeValue").val(interest);

      })








    })

</script>
