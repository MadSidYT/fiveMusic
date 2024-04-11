function validForm() {
  var userName = document.getElementById("userName").value.trim();
  var password = document.getElementById("password").value.trim();

  // Regular expression for password format
  var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;

  // Check if username and password are not empty
  if (userName === "" || password === "") {
      displayErrorMessage("Please fill in all fields");
      return false;
  }

  // Check if username (email) matches the format
  if (!validateEmail(userName)) {
      displayErrorMessage("Please enter a valid email address", "error-message-username");
      return false;
  } else {
      updateIcon("username-icon", true);
  }

  // Check if password matches the format
  if (!passwordRegex.test(password)) {
      displayErrorMessage("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*)", "error-message-password");
      return false;
  } else {
      updateIcon("password-icon", true);
  }
  
  // Redirect to master.html if all validations pass
  window.location.href = "http://localhost/PROJECT/master.php";
  return false; // Prevent form submission (since you're redirecting)
}

// Function to validate email address format
function validateEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Function to display error messages
function displayErrorMessage(message, elementId) {
  var errorMessageElement = document.getElementById(elementId);
  errorMessageElement.innerHTML = message;
  errorMessageElement.style.display = "block";
}

// Function to update icon based on correctness
function updateIcon(iconId, isCorrect) {
  var iconElement = document.getElementById(iconId);
  iconElement.classList.remove("correct", "wrong");
  iconElement.classList.add(isCorrect ? "correct" : "wrong");
}
