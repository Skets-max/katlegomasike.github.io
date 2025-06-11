<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';        // Use Gmail SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'masikekatlego774@gmail.com';   // ✅ Your Gmail address
    $mail->Password = 'gzkctbvxgmugxfxp';     // ✅ Gmail App Password (not your login password)
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender & recipient
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('masikekatlego774@gmail.com'); // ✅ Your receiving email

    // Content
    $mail->isHTML(false);
    $mail->Subject = "Message from " . $_POST['name'];
    $mail->Body    = "Name: " . $_POST['name'] . "\n"
                   . "Email: " . $_POST['email'] . "\n"
                   . "Message:\n" . $_POST['message'];

    $mail->send();
    echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href='contact.html';</script>";
}
?>
