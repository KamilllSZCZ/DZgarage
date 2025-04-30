<?php
// Połączenie z bazą danych MySQL
$host = 'localhost';
$db = 'fourgarage';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
?>
