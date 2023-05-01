function validateForm() {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const mobile = document.getElementById("mobile").value;
    const password = document.getElementById("password").value;
    const cpassword = document.getElementById("cpassword").value;
    const errorMsg = "";

    if (username == "") {
        errorMsg += "Please enter your name.\n";
    }

    if (email == "") {
        errorMsg += "Please enter your email address.\n";
    }

    if (mobile == "") {
        errorMsg += "Please enter your phone number.\n";
    }

    if (password == "") {
        errorMsg += "Please enter a password.\n";
    }

    if (cpassword == "") {
        errorMsg += "Please confirm your password.\n";
    }

    if (errorMsg != "") {
        alert(errorMsg);
        return false;
    }
}