<?php
session_start();
include 'dbcon.php';
$errorMsg = '';
if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $email_count=mysqli_num_rows($result);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($result);
        $db_pass= $email_pass['password'];
        $_SESSION['username']=$email_pass['username'];
        $pass_decode= password_verify($password, $db_pass);
        if($pass_decode){
            $_SESSION['login'] = true; // set login session variable
            echo "login successful";
        }
        else{
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
session_write_close(); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
</head>
<body>
<header class="log-head">
    <form name="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm()">
        <h1 class="userLog"></h1>
        <?php if(!empty($errorMsg)) { echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>
        <div class="login_elements">    
            <div>
                <div class="log-input">
                    <label><i class="fa-solid fa-user"></i></label>
                    <input type="email" name="email" id="email" placeholder="enter your email"><br>
                    <span id="emailError" style="color: red;"></span>
                </div>
                        
                <div class="log-input">
                    <label><i class="fa-solid fa-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="enter your password"><br>
                    <span id="passwordError" style="color: red;"></span>
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
    <script src="js/log.js"></script>
</header>
</body>
</html>
