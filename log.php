<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
</head>
<body>
        
<?php
 include 'dbcon.php';
 if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $email_search=" select * from registration where email='$email'";
    $query=mysqli_query($conn, $email_search);
    $email_count=mysqli_num_rows($query);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass= $email_pass['password'];
        $_SESSION['username']=$email_pass['username'];
        $pass_decode= password_verify($password, $db_pass);
    
        if($pass_decode){
            echo "login successful";
        }
        else{
            ?>
             ?>
            <script>
                location.replace('hotel_filter.php');
            </script>
            <?php
            
        }
    }
    else {
        ?>
        <script>
            alert('Invalid user');
        </script>
        <?php
    }
}
    
?>
<header class="log-head">
    <form name="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm()">
        <h1 class="userLog"></h1>
        <?php if(!empty($errorMsg)) { echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>
        <div class="login_elements">    
            <div>
                <div class="log-input">
                    <label><i class="fa-solid fa-user"></i></label>
                    <input type="email" name="email" id="email" placeholder="enter your email"><br><br>
                </div>
                        
                <div class="log-input">
                    <label><i class="fa-solid fa-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="enter your password"><br><br>
                </div>
                <input class="login_submit" type="submit" name="submit" value="Login">
                <div class="forgot-new-container">
                   
                <div>
                <i class="fa-solid fa-square-person-confined"></i>
                <input type="button" value="Forgot password?" onclick="location.href='for.php'" style="background:none; border:none;">
                </div>
                <div>
                <i class="fa-solid fa-address-card"></i>
                <input type="button" value="Registration" onclick="location.href='reg.php'" style="background:none; border:none;">
                </div>
                </div>
            </div>
        </div>
    </form> 
</header>
 <script src="js/login.js"></script>
</body>
</html>
