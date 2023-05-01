<?php
session_start();
$errorMsg = '';
if(isset($_POST['submit'])) {


    if(empty($_POST['email'])) {
        $errorMsg = 'Please enter your email.';
    } elseif(empty($_POST['new_password'])) {
        $errorMsg = 'Please enter a new password.';
    } elseif(empty($_POST['confirm_password'])) {
        $errorMsg = 'Please confirm your new password.';
    } elseif($_POST['new_password'] != $_POST['confirm_password']) {
        $errorMsg = 'Passwords did not match.';
    } else {

       
        if($_POST['email'] == 'sanzana@gmail.com') {
            setcookie('verification_code', '12345', time()+300);
            $successMsg = 'A verification code has been sent to your email';
        } else {
            $errorMsg = 'Incorrect email.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        fieldset {
            width: 50%;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 2px #ccc;
        }
        legend {
            font-size: 28px;
            font-weight: bold;
            color: #444;
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="email"], input[type="password"] {
            width: 70%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 1px #ccc;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        p.error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        p.success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <fieldset>
        <legend>Forgot Password</legend>
        <?php
        if(!empty($errorMsg)) {
            echo '<p class="error">'.$errorMsg.'</p>';
        } elseif(!empty($successMsg)) {
            echo '<p class="success">'.$successMsg.'</p>';
        }
        ?>
        <form method="post" name="forgotPasswordForm" onsubmit="return validateForm()">
            <label for="email"><b>Email:</b></label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email"><br>
            <div class="error-message" id="emailError"></div>
            <br>
            <label for="new_password"><b>New Password:</b></label><br>
            <input type="password" id="new_password" name="new_password" placeholder="Enter your password"><br>
            <div class="error-message" id="newPasswordError"></div>
            <br>
            <label for="confirm_password"><b>Confirm Password:</b></label><br>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"><br>
            <div class="error-message" id="confirmPasswordError"></div>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <a href="login.php"><b>Go back</b></a>
    </fieldset>
    <script src="js/for.js"></script>
</body>
</html>