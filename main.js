const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
    navLinks.classList.toggle("open");
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
  });

navLinks.addEventListener("click", (e) => {
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
  });
  const scrollRevealOption = {
    origin: "bottom",
    distance: "50px",
    duration: 1000,
  };
  
  ScrollReveal().reveal(".header__image img", {
    ...scrollRevealOption,
    origin: "right",
  });
  ScrollReveal().reveal(".header__content p", {
    ...scrollRevealOption,
    delay: 500,
  });
  ScrollReveal().reveal(".header__content h1", {
    ...scrollRevealOption,
    delay: 1000,
  });
  ScrollReveal().reveal(".header__btns", {
    ...scrollRevealOption,
    delay: 1500,
  });
  ScrollReveal().reveal(".destination__card", {
    ...scrollRevealOption,
    interval: 50,
  });

  ScrollReveal().reveal(".discover__card", {
    ...scrollRevealOption,
    interval: 50,
  });

  function calculateFare() {
    const distance = parseFloat(document.getElementById('distance').value);
    const vehicle = document.getElementById('vehicle').value;
    let fare;

    if (isNaN(distance) || distance <= 0) {
        document.getElementById('result').innerText = 'Please enter a valid distance.';
        return;
    }

    if (vehicle === 'cab') {
        fare = (distance * 18.66) + 28; // 18.66 per km + 28 base fare
    } else {
        fare = (distance * 15.33) + 23; // 15.33 per km + 23 base fare
    }

    document.getElementById("result").innerText = `Estimated Fare: ₹${fare.toFixed(2)}`;
}



