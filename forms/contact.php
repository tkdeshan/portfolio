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
    $mail->setFrom('tkdeshan1103@gmail.com', 'Kavinda');
    $mail->addAddress('tkdeshan1103@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']); // User's email to reply to

    // Content
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body = "{$_POST['message']}\n\n" .
              "Name: {$_POST['name']}\n" . 
              "Email: {$_POST['email']}";


    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent.";
}
?>
