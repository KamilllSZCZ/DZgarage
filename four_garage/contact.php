<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'kontakt@fourgarage.pl';
    $subject = 'Wiadomość z formularza kontaktowego';
    $body = "Imię i nazwisko: $name\nEmail: $email\nWiadomość:\n$message";

    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=utf-8";

    if (mail($to, $subject, $body, $headers)) {
        echo "Dziękujemy za wiadomość! Skontaktujemy się z Tobą wkrótce.";
    } else {
        echo "Wystąpił błąd podczas wysyłania wiadomości.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
