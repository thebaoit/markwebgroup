<?php 

require 'class.smtp.php';
require 'class.phpmailer.php';
require 'class.pop3.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'markwebvietnam@gmail.com';                 // SMTP username
$mail->Password = '!@#markweb$%^';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->SMTPDebug = 1;
$mail->setFrom($_GET['email'], $_GET['name']);
$mail->AddAddress('markwebvietnam@gmail.com', 'markweb');
$mail->CharSet = 'UTF-8';

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_GET['subject'];
$mail->Body    = $_GET['message'];


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
exit;
header('Location: index.php');


