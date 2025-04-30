<?php
session_start();
if (isset($_SESSION['booking_message'])):
    $msg = $_SESSION['booking_message'];
    unset($_SESSION['booking_message']);
?>
  <div id="booking-message" class="message <?= htmlspecialchars($msg['type']) ?>">
    <?= htmlspecialchars($msg['text']) ?>
  </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/four_garage/assets/LOGO.ico" type="image/x-icon">
  <title>FOUR GARAGE – Auto Detailing & Serwis</title>
  <link rel="stylesheet" href="styles.css">
  <script defer src="script.js"></script>
</head>
<body>
  <header>
    <div class="container header-container">
      <h1>FOUR GARAGE</h1>
      <p class="tagline">Twoje auto w najlepszych rękach</p>
    </div>
  </header>

  <nav>
    <ul class="nav-links">
      <li><a href="#services">Usługi</a></li>
      <li><a href="#pricing">Cennik</a></li>
      <li><a href="#booking">Rezerwacja</a></li>
      <li><a href="#contact-info">Kontakt</a></li>
    </ul>
  </nav>

  <main>
    <section class="hero">
      <div class="container">
        <h2>Kompleksowy detailing, wulkanizacja i naprawy</h2>
        <p>Profesjonalne podejście, nowoczesny sprzęt, pasja do motoryzacji.</p>
        <a href="#booking" class="btn-primary">Zarezerwuj wizytę</a>
      </div>
    </section>

    <section id="services" class="section">
      <div class="container">
        <h2>Nasze usługi</h2>
        <div class="services-grid">
          <?php
          $services = [
            "Detailing wnętrza" => "Dokładne czyszczenie, impregnacja i odświeżenie tapicerki i plastiku.",
            "Detailing zewnętrzny" => "Mycie, dekontaminacja, korekta lakieru i zabezpieczenie ceramiczne.",
            "Wulkanizacja" => "Sezonowa wymiana opon, wyważanie, naprawa przebitych kół.",
            "Naprawy bieżące" => "Wymiana oleju, filtrów, płynów eksploatacyjnych i inne drobne naprawy."
          ];
          foreach ($services as $title => $description): ?>
            <div class="service-card">
              <h3><?= htmlspecialchars($title) ?></h3>
              <p><?= htmlspecialchars($description) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="pricing" class="section">
      <div class="container">
        <h2>Cennik</h2>
        <table class="pricing-table">
          <thead>
            <tr><th>Usługa</th><th>Cena od</th></tr>
          </thead>
          <tbody>
            <?php
            $pricing = [
              "Detailing wnętrza" => "200 zł",
              "Detailing zewnętrzny" => "300 zł",
              "Wulkanizacja" => "60 zł",
              "Naprawy bieżące" => "wycena indywidualna"
            ];
            foreach ($pricing as $service => $price): ?>
              <tr>
                <td><?= htmlspecialchars($service) ?></td>
                <td><?= htmlspecialchars($price) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section id="booking" class="section">
      <div class="container">
        <h2>Rezerwacja online</h2>
        <p>Zarezerwuj dogodny termin. System dostępny 24/7.</p>
        <form id="booking-form" action="/four_garage/booking.php" method="POST">
          <?php
          $formFields = [
            "date" => ["label" => "Data:", "type" => "date", "required" => true],
            "hour" => ["label" => "Godzina:", "type" => "select", "options" => ["Wybierz godzinę"], "required" => true],
            "minute" => ["label" => "Minuta:", "type" => "select", "options" => ["00", "30"], "required" => true],
            "service" => ["label" => "Usługa:", "type" => "select", "options" => ["Detailing wnętrza", "Detailing zewnętrzny", "Wulkanizacja", "Naprawy bieżące"], "required" => true],
            "customer_email" => ["label" => "Adres e-mail:", "type" => "email", "required" => true],
            "customer_phone" => ["label" => "Numer telefonu:", "type" => "tel", "required" => true, "placeholder" => "np. 123 456 789"]
          ];
          foreach ($formFields as $name => $field): ?>
            <div class="form-field">
              <label for="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($field['label']) ?></label>
              <?php if ($field['type'] === "select"): ?>
                <select id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" <?= $field['required'] ? "required" : "" ?>>
                  <?php foreach ($field['options'] as $option): ?>
                    <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                  <?php endforeach; ?>
                </select>
              <?php else: ?>
                <input
                  type="<?= htmlspecialchars($field['type']) ?>"
                  id="<?= htmlspecialchars($name) ?>"
                  name="<?= htmlspecialchars($name) ?>"
                  <?= $field['required'] ? "required" : "" ?>
                  <?= isset($field['placeholder']) ? "placeholder='" . htmlspecialchars($field['placeholder']) . "'" : "" ?>
                >
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
          <div class="form-field full-width">
            <button type="submit" class="btn-primary">Zarezerwuj</button>
          </div>
        </form>
      </div>
    </section>

    <section id="map" class="section">
      <div class="container">
        <h2>Znajdź nas</h2>
        <div style="width: 50%; height: 400px;">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10254.152432406396!2d22.38462163197308!3d50.020011987615824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c92f5215c3ca5%3A0xec5f01f63cbd73aa!2zT3N0csOzdyA2NywgMzctMjA3IE9zdHLDs3c!5e0!3m2!1spl!2spl!4v1745933208832!5m2!1spl!2spl"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container footer-container">
      <p>&copy; FOUR GARAGE. Wszelkie prawa zastrzeżone.</p>
      <p><a href="/four_garage/admin/admin-login.php">Panel administratora</a></p>
    </div>
  </footer>

  <script defer src="script.js"></script>
</body>
</html>