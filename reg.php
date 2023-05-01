
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
    
   
</head>
<body class="reg-body">
    
<?php
 include 'dbcon.php';
 if(isset($_POST['submit'])){
    $username= mysqli_real_escape_string($conn, $_POST['username']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $mobile= mysqli_real_escape_string($conn, $_POST['mobile']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword= mysqli_real_escape_string($conn, $_POST['cpassword']);

    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
    $emailquery= "select * from registration where email= '$email'";
    $query=mysqli_query($conn, $emailquery);
    $emailcount=mysqli_num_rows($query);

    if($emailcount>0){
        echo "email already exists";
    }
    else{
        if($password === $cpassword){

            $insertquery ="insert into registration(username,email,mobile,password,cpassword) values('$username','$email','$mobile','$pass','$cpass')";
            $iquery=mysqli_query($conn, $insertquery);
            if($iquery){
                ?>
                <script>
                    alert('inserted successful')
                </script>
                <?php
             }
             else{
                ?>
                <script>
                    alert('inserted not successful')
                </script>
                <?php
            
             }

        }
        else{
            ?>
                <script>
                    alert('wrong password')
                </script>
                <?php
        }

    }
 }
?>
<section>
    <div>
        <h1 class="reg-title">Create Account</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validateForm()">
            <div class="reg-input">
                <div>
                <label><i class="fa-solid fa-file-signature"></i></label>
                    <input class="reg-in" type="text" name="username" id="username" placeholder="enter your name"><br><br>
                    <label><i class="fa-solid fa-user"></i></label>
                    <input class="reg-in" type="email" name="email" id="email" placeholder="enter your email"><br><br>
                    <label><i class="fa-solid fa-phone"></i></label>
                    <input class="reg-in" type="tel" name="mobile" id="mobile" placeholder="enter your phone number"><br><br>
                    <label><i class="fa-solid fa-lock"></i></label>
                    <input class="reg-in" type="password" name="password" id="password" placeholder="enter your password"><br><br>
                    <label><i class="fa-solid fa-check"></i></label>
                    <input class="reg-in" type="password" name="cpassword" id="cpassword" placeholder="confirm your password"><br><br>
                
                    <div>
                        <input class="reg-submit" type="submit" name="submit" value="Register">
                        <div style="margin-top:70px;">
                        <input class="reg-submit" type="button" value="login here" onclick="location.href='login.php'" >
                      
                    </div>
                    </div>

                    
                </div>
            </div>
        </form>
    </div>
</section>

<script>
function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    var errorMsg = "";

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
</script>
    

</body>
</html>






