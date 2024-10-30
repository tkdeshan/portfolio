<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tkdeshan1103@gmail.com'; // Replace with your Gmail address
    $mail->Password   = 'wugm leeh uehf shtd'; // Replace with your Gmail password or App Password if 2FA is on
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipient
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('tkdeshan1103@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = "Name: {$_POST['name']}\nEmail: {$_POST['email']}\n\nMessage:\n{$_POST['message']}";

    $mail->send();
    echo 'Message sent successfully!';
} catch (Exception $e) {
    echo "Error: Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
