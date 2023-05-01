
function validateForm() {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");

    if (email == "" && password == "") {
        emailError.textContent = "Please enter your email";
        passwordError.textContent = "Please enter your password";
        return false;
    } else if (email == "") {
        emailError.textContent = "Please enter your email";
        passwordError.textContent = "";
        return false;
    } else if (password == "") {
        emailError.textContent = "";
        passwordError.textContent = "Please enter your password";
        return false;
    }
}
