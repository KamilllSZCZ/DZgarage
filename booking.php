<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'fourgarage';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    setSessionMessage('Błąd połączenia z bazą danych.', 'error');
    redirectToBooking();
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING);
    $minute = filter_input(INPUT_POST, 'minute', FILTER_SANITIZE_STRING);
    $time = $hour . ':' . $minute;
    $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'customer_email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'customer_phone', FILTER_SANITIZE_STRING);
    

    if (!$date || !$time || !$service || !$email || !$phone) {
        setSessionMessage('Nieprawidłowe dane formularza.', 'error');
        redirectToBooking();
    }

    // Check availability
    $stmt = $conn->prepare("SELECT COUNT(*) FROM bookings WHERE date = ? AND time = ?");
    $stmt->bind_param("ss", $date, $time);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        setSessionMessage('Ten termin jest już zajęty.', 'error');
        redirectToBooking();
    }

    // Save booking
    $stmt = $conn->prepare("INSERT INTO bookings (date, time, service, customer_email, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $date, $time, $service, $email, $phone);

    if ($stmt->execute()) {
        setSessionMessage('Rezerwacja zapisana!', 'success');
    } else {
        setSessionMessage('Błąd podczas zapisu.', 'error');
    }

    $stmt->close();
    $conn->close();
    redirectToBooking();
} else {
    setSessionMessage('Nieprawidłowe żądanie.', 'error');
    redirectToBooking();
}

// Helper functions
function setSessionMessage($text, $type) {
    $_SESSION['msg'] = ['text' => $text, 'type' => $type];
}

function redirectToBooking() {
    header("Location: index.php#booking");
    exit;
}
?>