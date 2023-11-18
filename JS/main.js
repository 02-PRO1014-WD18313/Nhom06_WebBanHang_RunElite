let currentIndex = 0;
const slideList = document.getElementsByClassName("slide");
slideList[currentIndex].style.display = "block";
function preview() {
  slideList[currentIndex].style.display = "none";
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = slideList.length - 1;
  }
  slideList[currentIndex].style.display = "block";
}

function next() {
  slideList[currentIndex].style.display = "none";
  currentIndex++;
  if (currentIndex > slideList.length - 1) {
    currentIndex = 0;
  }
  slideList[currentIndex].style.display = "block";
}

setInterval(next, 3000);



//đồng hồ sale đếm ngược
function startCountdown(duration) {
  let timer = duration, days, hours, minutes, seconds;

  const countdown = setInterval(function () {
      days = Math.floor(timer / (60 * 60 * 24));
      hours = Math.floor((timer % (60 * 60 * 24)) / (60 * 60));
      minutes = Math.floor((timer % (60 * 60)) / 60);
      seconds = Math.floor(timer % 60);

      days = days < 10 ? "0" + days : days;
      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      document.getElementById("days").textContent = days;
      document.getElementById("hours").textContent = hours;
      document.getElementById("minutes").textContent = minutes;
      document.getElementById("seconds").textContent = seconds;

      if (--timer < 0) {
          clearInterval(countdown);
      }
  }, 1000);
}

const countdownDuration = 172800; //đếm ngược 2 ngày
startCountdown(countdownDuration);


// Show password

function showPassword() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordInput.classList.add("hidden-password");
  } else {
    passwordInput.type = "password";
    passwordInput.classList.remove("hidden-password");
  }
}

// 


function hienmatkhau() {
const password = document.getElementById("matkhau");
const confirmPassword = document.getElementById("confirm-matkhau");
const showPassword = document.getElementById("show-matkhau");

if (showPassword.checked) {
  password.type = "text";
  confirmPassword.type = "text";
} else {
  password.type = "password";
  confirmPassword.type = "password";
}
}
