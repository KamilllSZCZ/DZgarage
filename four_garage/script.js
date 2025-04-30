document.addEventListener("DOMContentLoaded", function () {
  // Booking form submission
  const bookingForm = document.getElementById("booking-form");
  if (bookingForm) {
    bookingForm.addEventListener("submit", function (e) {
      e.preventDefault();
      alert("Rezerwacja przyjęta! Potwierdzenie zostanie wysłane e-mailem.");
      this.reset();
    });
  }

  // Contact form validation
  const contactForm = document.querySelector(".contact-form");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      const email = this.querySelector('input[type="email"]');
      if (!email.value.includes("@")) {
        e.preventDefault();
        alert("Podaj poprawny adres e-mail.");
      }
    });
  }

  // Hide messages after 3 seconds
  const msg = document.getElementById("booking-message");
  if (msg) {
    setTimeout(() => {
      msg.style.opacity = "0";
      setTimeout(() => msg.remove(), 500); // Remove from DOM after fade-out
    }, 3000);
  }

  // Generate available hours for booking form
  const dateInput = document.getElementById("date");
  const hourSelect = document.getElementById("hour");
  const minuteSelect = document.getElementById("minute");

  const generateHours = (day) => {
    const hours = day >= 1 && day <= 5 ? [...Array(11).keys()].map(h => h + 8) : day === 6 ? [...Array(7).keys()].map(h => h + 10) : [];
    hourSelect.innerHTML = "<option value=''>Wybierz godzinę</option>";
    hours.forEach(hour => {
      const option = document.createElement("option");
      option.value = String(hour).padStart(2, "0");
      option.textContent = option.value;
      hourSelect.appendChild(option);
    });
  };

  if (dateInput) {
    const today = new Date();
    const minDate = today.toISOString().split("T")[0];
    dateInput.setAttribute("min", minDate);

    dateInput.addEventListener("change", function () {
      const selectedDate = new Date(this.value);
      const day = selectedDate.getDay();
      if (day === 0) {
        alert("Niedziela jest niedostępna.");
        this.value = "";
        return;
      }
      generateHours(day);
      hourSelect.value = "";
      minuteSelect.value = "00";
    });
  }

  if (minuteSelect) {
    minuteSelect.addEventListener("change", function () {
      if (!hourSelect.value) {
        alert("Najpierw wybierz godzinę.");
        this.value = "00";
      }
    });
  }
});