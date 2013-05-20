<?php
$email_from = "troy@scenerymusic.com";
$email_subject = "A PHP Mail Test";
$email_message = "Hey cool it worked this time";
$email_to = "support@loneyeti.com";


$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>