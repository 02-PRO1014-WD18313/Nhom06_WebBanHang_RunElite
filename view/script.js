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
  

  