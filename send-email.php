<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        // Konfiguracja serwera SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // lub inny serwer SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Twój e-mail SMTP
        $mail->Password = 'your-email-password'; // Hasło SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Nadawca i odbiorca
        $mail->setFrom('your-email@gmail.com', 'FOUR GARAGE');
        $mail->addAddress($to); // Adres e-mail klienta

        // Treść e-maila
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Wysyłanie
        $mail->send();
        echo 'Wiadomość wysłana.';
    } catch (Exception $e) {
        echo "Błąd: {$mail->ErrorInfo}";
    }
}
?>
