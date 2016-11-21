<?php

class send_mail{
	//public $send_mail_funct;
function __construct($recipient, $subject){
/*---------------PHP mailer -------------------*/
ini_set('SMTP', 'localhost'); 
ini_set('smtp_port', 25); 
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'seafreshdirect.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'itsupport';                 // SMTP username
$mail->Password = '$e4fresh';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'noreply@seafreshdirect.com';
$mail->FromName = 'Testing OOP'; //Set this to name of app or name of sender
//$mail->addAddress($emailaddress);     // Add a recipient
$mail->addAddress($recipient);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = '<html><head><style></style></head><body><h1>No need to freak out...this is just a test</h1>';
$mail->Body   .= '<p>And yes you passed!</p>';
$mail->AltBody = 'Your new password is now: ';

if(!$mail->send()) {
    $alert = '<div class="alert alert-warning" role="alert">Message could not be sent. <br/>Mailer Error: ' . $mail->ErrorInfo . '</div>';
} else {
    $alert =  '<div class="alert alert-success" role="alert">A new password has been sent to your email address.</div>';
}; 
}
};



?>