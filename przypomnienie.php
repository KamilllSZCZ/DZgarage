<?php
require 'send-email.php';
require_once 'db/connection.php';  // Połączenie z bazą danych

// Data 3 dni przed rezerwacją
$date = new DateTime();
$date->modify('+3 days');
$reminder_date = $date->format('Y-m-d');

// Pobieranie rezerwacji na ten dzień
$query = "SELECT * FROM bookings WHERE date = '$reminder_date'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $to = $row['customer_email'];  // E-mail klienta
    $subject = 'Przypomnienie o wizycie w FOUR GARAGE';
    $body = "
        <h1>Przypomnienie o wizycie</h1>
        <p>Twoja wizyta w FOUR GARAGE już za 3 dni! Szczegóły:</p>
        <ul>
            <li>Data: {$row['date']}</li>
            <li>Godzina: {$row['time']}</li>
            <li>Usługa: {$row['service']}</li>
        </ul>
        <p>Prosimy o punktualność. Do zobaczenia!</p>
    ";
    
    // Wysyłanie przypomnienia
    sendEmail($to, $subject, $body);
}
?>
