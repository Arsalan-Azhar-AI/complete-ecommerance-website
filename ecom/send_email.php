<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'path_to_phpmailer/PHPMailer.php';
require 'path_to_phpmailer/SMTP.php';

// Replace these with your Gmail credentials
$smtpUsername = 'arsalanazhar2003@gmail.com';
$smtpPassword = 'arsalan2003';

$to = 'recipient@example.com';  // Recipient's email address
$subject = 'New Message from Contact Form';
$message = "user_name: $user_name\nuser_email: $user_email\nuser_message: $user_message \ndate&time: $datetime";

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->setFrom($smtpUsername);
$mail->addAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;

if ($mail->send()) {
    echo "Email sent successfully!";
} else {
    echo "Email could not be sent.";
}
?>
