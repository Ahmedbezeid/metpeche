<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);
//$mail->SMTPDebug = SMTP::DEBUG__SERVER;

$mail->isSMTP();
$mail->SMTPAuth = TRUE;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;


$mail->Username = "a08836201@gmail.com";
$mail->Password = "lficwpufyyeuhrbo";
// recipient
$mail->setFrom($email, $name);
$mail->addAddress('bah.ahmed.bezeid@gmail.com', "ahmed");

$mail->Subject = $email;
$mail->Body = $message;
$mail->AltBody =$name;

$mail->send();

header("Location: sent.html");

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(
        !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['message'])
    ){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];


        $to = "bah.ahmed.bezeid@gmail.com";
        $subject = "New Contact Form Submission";
        $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nMessage: {$message}";
        $headers = "From: {$email}";


        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message.";
        }
    }
}*/
