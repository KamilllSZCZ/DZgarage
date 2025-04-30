// Przełączanie motywu
const toggleButton = document.getElementById("theme-toggle");
toggleButton.addEventListener("click", () => {
  document.body.classList.toggle("light");
  localStorage.setItem("theme", document.body.classList.contains("light") ? "light" : "dark");
});

// Zachowanie preferencji motywu
window.addEventListener("DOMContentLoaded", () => {
  const theme = localStorage.getItem("theme");
  if (theme === "light") {
    document.body.classList.add("light");
  }
});

// Skrypt do formularza rezerwacji

  document.getElementById('booking-form').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Rezerwacja przyjęta! Potwierdzenie zostanie wysłane e-mailem.');
    this.reset();
  });


// Skrypt walidacji formularza kontaktowego

  document.querySelector('.contact-form').addEventListener('submit', function (e) {
    const email = this.querySelector('input[type="email"]');
    if (!email.value.includes('@')) {
      e.preventDefault();
      alert('Podaj poprawny adres e-mail.');
    }
  });