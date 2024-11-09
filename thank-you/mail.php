<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Set up the recipient emails
    $to = "gchauhan.dm@gmail.com, himanshu.lifelinkr@gmail.com, rk.abhishekbakshi@gmail.com";
    // Subject for the email to your team
    $subject = "Query From Not Just a Number LP";

    // Initialize the message
    $message = "";
    // Common function to reformat the date from yyyy-mm-dd to dd-mm-yyyy

    function formatDate($date) {
        return date("d-m-Y", strtotime($date));
    }


    // Get the form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $dateOfBirth = isset($_POST['date_of_birth']) ? htmlspecialchars($_POST['date_of_birth']) : '';
    $timeOfBirth = isset($_POST['time_of_birth']) ? htmlspecialchars($_POST['time_of_birth']) : '';

    // Reformat date of birth
    if ($dateOfBirth) {
        $dateOfBirth = formatDate($dateOfBirth);
    }

    // Create the email message to your team
    $message .= "Form Submission:\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Phone: " . $phone . "\n";
    $message .= "Location: " . $city . "\n";
    $message .= "Date of Birth: " . $dateOfBirth . "\n";
    $message .= "Time of Birth: " . $timeOfBirth . "\n";


    // Email headers for the email to your team
    $headers = "From: info@itsnotjustanumber.com" . "\r\n" .
               "Reply-To: info@itsnotjustanumber.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email to your team

    if (mail($to, $subject, $message, $headers)) {
        echo ""; // Success message for JS to detect
    } else {
        echo "Failed to send email."; // Error message if mail fails
    }



    // Send email to the user
    if (!empty($email)) {
        // Subject for the user email
        $userSubject = "Your Personalized Numerology Report Request Received!";
    
        // Message for the user email

        $userMessage = "Dear " . $name . ",\n\n";
        $userMessage .= "Thank you for submitting your details!\n\n";
        $userMessage .= "We are excited to create your personalized numerology report and we want to let you know that we've successfully received your request. ";
        $userMessage .= "Our team is now working on preparing your report and you can expect to receive it within the next 3-5 business days.\n\n";
        $userMessage .= "If you have any questions in the meantime or need assistance, feel free to reach out to us at info@itsnotjustanumber.com or simply reply to this email.\n\n";
        $userMessage .= "Thank you for choosing us for your numerology journey!\n\n";
        $userMessage .= "Best regards,\n";
        $userMessage .= "Not Just a Number";
       

        // Email headers for the user email
        $userHeaders = "From: info@itsnotjustanumber.com" . "\r\n" .
                       "Reply-To: info@itsnotjustanumber.com" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();

        // Send email to the user
        mail($email, $userSubject, $userMessage, $userHeaders);
    }
   

} else {
    echo "Invalid request method.";
}

?>











<html>



<style>

  *{

  box-sizing:border-box;

 /* outline:1px solid ;*/

}

body{

background: #ffffff;

background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );

    height: 100%;

        margin: 0;

        background-repeat: no-repeat;

        background-attachment: fixed;

  

}



.wrapper-1{

  width:100%;

  height:100vh;

  display: flex;

flex-direction: column;

}

.wrapper-2{

  padding :30px;

  text-align:center;

}

h1{

    font-family: 'Kaushan Script', cursive;

  font-size:4em;

  letter-spacing:3px;

  color: #8063a0 ;

  margin:0;

  margin-bottom:20px;

}

.wrapper-2 p{

  margin:0;

  font-size:1.3em;

  color:#aaa;

  font-family: 'Source Sans Pro', sans-serif;

  letter-spacing:1px;

}

.go-home{

  color:#fff;

  background: #8063a0;

  border:none;

  padding:10px 50px;

  margin:30px 0;

  border-radius:30px;

  text-transform:capitalize;

  /* box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1); */

}

.footer-like{

  margin-top: auto; 

  background:#D7E6FE;

  padding:6px;

  text-align:center;

}

.footer-like p{

  margin:0;

  padding:4px;

  color:#5892FF;

  font-family: 'Source Sans Pro', sans-serif;

  letter-spacing:1px;

}

.footer-like p a{

  text-decoration:none;

  color:#5892FF;

  font-weight:600;

}



@media (min-width:360px){

  h1{

    font-size:4.5em;

  }

  .go-home{

    margin-bottom:20px;

  }

}



@media (min-width:600px){

  .content{

  max-width:1000px;

  margin:0 auto;

}

  .wrapper-1{

  height: initial;

  max-width:620px;

  margin:0 auto;

  margin-top:50px;

  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);

}

  

}

  </style>

<body>



<div class=content>

  <div class="wrapper-1">

    <div class="wrapper-2">

      <h1>Thank you !</h1>

      <p>We have received your payment successfully.</p>

      <p>You will receive your personalized numerology report within 3-5 days.</p>

      <button class="go-home"><a href="tel:+91 92679 12801" style="color:white; text-decoration:none;">

      Call Now

      </button>

    </div>

</div>

</div>







<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">



</body>



<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MNL4CTBX');</script>

<!-- End Google Tag Manager -->





<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNL4CTBX"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->



















<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MNL4CTBX');</script>

<!-- End Google Tag Manager -->



<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNL4CTBX"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->



<script>

window.onload = function() {       

    setTimeout(function(){

        window.location.href = 'https://itsnotjustanumber.com/lp/get-your-lucky-number';

    }, 3000); 

}

</script>

</html>

