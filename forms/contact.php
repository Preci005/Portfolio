<?php

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';



require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "tumisangmolapo01@gmail.com";
    $mail->Password = "ilit okmx xhut qrwk"; // 🔐 You should store this in an environment variable!

    $mail->setFrom("tumisangmolapo01@gmail.com", "Website Contact Form");
    $mail->addReplyTo($email, $name); // Allows replying to the real sender

    $mail->addAddress("tumisangmolapo01@gmail.com");

    $mail->Subject = $subject;
    $mail->Body = "Message from $name <$email>\n\n$message";

    $mail->send();
    echo "The email was sent successfully.";
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
