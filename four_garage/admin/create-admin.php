<?php
require_once 'db/connection.php'; // lub '../db/connection.php' jeśli plik będzie w folderze admin

$hash = password_hash('TwojeSilneHaslo123', PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO admin_users (username, password_hash) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $hash);
$user = 'admin';
$stmt->execute();
$stmt->close();
$conn->close();

echo "Admin dodany!";
?>
