function validateForm() {
    var email = document.forms["forgotPasswordForm"]["email"].value;
    var newPassword = document.forms["forgotPasswordForm"]["new_password"].value;
    var confirmPassword = document.forms["forgotPasswordForm"]["confirm_password"].value;

    var error = false;

    // Validate email
    if (email == "") {
        document.getElementById("emailError").innerHTML = "Please enter your email.";
        error = true;
    } else {
        document.getElementById("emailError").innerHTML = "";
    }

    // Validate new password
    if (newPassword == "") {
        document.getElementById("newPasswordError").innerHTML = "Please enter a new password.";
        error = true;
    } else {
        document.getElementById("newPasswordError").innerHTML = "";
    }

    // Validate confirm password
    if (confirmPassword == "") {
        document.getElementById("confirmPasswordError").innerHTML = "Please confirm your new password.";
        error = true;
    } else if (confirmPassword != newPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords did not match.";
        error = true;
    } else {
        document.getElementById("confirmPasswordError").innerHTML = "";
    }

    if (error) {
        return false;
    }
}