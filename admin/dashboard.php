<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit;
}

require_once '../db/connection.php';

// Dodawanie nowej usługi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_service'])) {
    $name = $_POST['service_name'];
    $price = $_POST['service_price'];
    $desc = $_POST['service_description'];

    $stmt = $conn->prepare("INSERT INTO services (name, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $name, $price, $desc);
    $stmt->execute();
    $stmt->close();
    header("Location: dashboard.php");
    exit;
}

// Edycja usługi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_service'])) {
    $id = $_POST['service_id'];
    $name = $_POST['service_name'];
    $price = $_POST['service_price'];
    $desc = $_POST['service_description'];

    $stmt = $conn->prepare("UPDATE services SET name = ?, price = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sdsi", $name, $price, $desc, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: dashboard.php");
    exit;
}

// Usuwanie usługi
if (isset($_GET['delete_service'])) {
    $id = $_GET['delete_service'];
    $stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: dashboard.php");
    exit;
}

// Pobieranie rezerwacji
$reservations = $conn->query("SELECT * FROM bookings ORDER BY date ASC, time ASC");

// Pobieranie usług
$services = $conn->query("SELECT * FROM services ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Panel administratora</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
  <div class="container">
    <h1>Panel administratora – FOUR GARAGE</h1>
    <p><a href="logout.php">Wyloguj się</a></p>

    <h2>Rezerwacje</h2>
    <table>
      <tr>
        <th>Data</th>
        <th>Godzina</th>
        <th>Usługa</th>
      </tr>
      <?php while ($row = $reservations->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['date']) ?></td>
          <td><?= htmlspecialchars($row['time']) ?></td>
          <td><?= htmlspecialchars($row['service']) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>

    <h2>Usługi</h2>
    <table>
      <tr>
        <th>Nazwa</th>
        <th>Cena</th>
        <th>Opis</th>
        <th>Akcje</th>
      </tr>
      <?php 
      $services = $conn->query("SELECT * FROM services ORDER BY name ASC");
      while ($row = $services->fetch_assoc()): ?>
        <tr>
          <form method="POST">
            <input type="hidden" name="service_id" value="<?= $row['id'] ?>">
            <td><input type="text" name="service_name" value="<?= htmlspecialchars($row['name']) ?>" required></td>
            <td><input type="number" step="0.01" name="service_price" value="<?= number_format($row['price'], 2) ?>" required></td>
            <td><textarea name="service_description"><?= htmlspecialchars($row['description']) ?></textarea></td>
            <td>
              <button type="submit" name="edit_service">Zapisz</button>
              <a href="?delete_service=<?= $row['id'] ?>" onclick="return confirm('Czy na pewno chcesz usunąć tę usługę?')">Usuń</a>
            </td>
          </form>
        </tr>
      <?php endwhile; ?>
    </table>

    <h3>Dodaj nową usługę</h3>
    <form method="POST">
      <input type="text" name="service_name" placeholder="Nazwa usługi" required>
      <input type="number" step="0.01" name="service_price" placeholder="Cena" required>
      <textarea name="service_description" placeholder="Opis usługi"></textarea>
      <button type="submit" name="add_service">Dodaj usługę</button>
    </form>

  </div>
</body>
</html>
