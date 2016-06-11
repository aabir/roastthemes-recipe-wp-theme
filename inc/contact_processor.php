<?php
extract($_POST);
$data = $_POST;
$contact_name = $data['contactname'];
$contact_email = $data['contactemail'];
$contact_message = $data['contactmessage'];

$contact_form_recipient = $data['email_recepient'];
$adminEmail = $contact_form_recipient;
//$domain = $_SERVER["SERVER_NAME"];
$domain = $data['site_name'];

$contact_subject = $contact_name . "has submitted following information using". $domain ."contact form";
$body = "
Hello Admin, $contact_name has submitted following information using our website's contact form.
Name: $contact_name
Email Address: $contact_email
Message: $contact_message

Have a good day,
$domain
";
$body = nl2br($body);
//send email to admin
   $message = nl2br($body);
   $subject = "An inquire From $domain";
   //send html mail
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: \"$domain\" <$contact_email>" . "\r\n";
   $headers .= "Reply-To: $contact_email" . "\r\n" ;
   mail($to=$adminEmail, $contact_subject, $message, $headers);

    $response = array(
      'success'=>true,
      'msg' => 'your informations has been sent.'
   );
   exit (json_encode($response));
