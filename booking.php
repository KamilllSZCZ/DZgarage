<?php
// Połączenie z bazą danych
$host = 'localhost';
$db = 'fourgarage';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];

    // Sprawdzenie czy slot jest dostępny
    $stmt = $conn->prepare("SELECT COUNT(*) FROM bookings WHERE date = ? AND time = ?");
    $stmt->bind_param("ss", $date, $time);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "Ten termin jest już zajęty.";
        exit;
    }

    $to = $_POST['customer_email'];  // Adres klienta
$subject = 'Potwierdzenie rezerwacji w FOUR GARAGE';
$body = "
    <h1>Potwierdzenie rezerwacji</h1>
    <p>Twoja rezerwacja została potwierdzona. Szczegóły:</p>
    <ul>
        <li>Data: {$_POST['reservation_date']}</li>
        <li>Godzina: {$_POST['reservation_time']}</li>
        <li>Usługa: {$_POST['service_name']}</li>
    </ul>
    <p>Do zobaczenia w FOUR GARAGE!</p>
";

// Wywołanie funkcji wysyłającej e-mail
sendEmail($to, $subject, $body);

    // Zapisanie rezerwacji
    $stmt = $conn->prepare("INSERT INTO bookings (date, time, service) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $date, $time, $service);

    if ($stmt->execute()) {
        // Wysłanie e-maila potwierdzającego (przykładowy adres)
        mail("klient@przyklad.pl", "Potwierdzenie rezerwacji", "Zarezerwowałeś usługę: $service dnia $date o $time.");
        echo "Rezerwacja zapisana!";
    } else {
        echo "Błąd podczas zapisu.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
