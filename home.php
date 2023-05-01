<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home2";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMsg = '';
if(isset($_POST['submit'])) {

    // Validate user inputs
    if(empty($_POST['email'])) {
        $errorMsg = 'Please enter place';
    } else {

        // Check if email and password are correct
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "SELECT * FROM User WHERE username='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION['email'] = $row['username'];
            $_SESSION['loggedIn'] = true;

            // Set cookie to remember user login for 1 minute, accessible across all subdomains
            setcookie('email', $row['username'], time() + 60, '/');
            // Redirect user to home page
            header('Location: hotel.php');
            exit;
        } else {
            $errorMsg = 'No such data';
        }
    }
}


// Check if the user is logged in, and if not redirect to the login page


// Check if the user clicked the logout button
if(isset($_POST['logout'])) {
    // Destroy all session data
    session_unset();
    session_destroy();

    // Redirect user to login page
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="home-header">

    <div class="home">
            <div class="hDt">
                <h3 onclick="location.href='head.php'">Home</h3>
               <div>
               <h3>Connect with us</h3>
                <a href="">012134567890</a>
               </div>
            </div>
            <div class="logout">
          <form method="post" action="">
         <button class="btn-logout" type="submit" name="logout">Logout</button>
        </form>
      </div>
        </div>
       <div class="search-box">
           <form method="post" action="">
           <?php if(!empty($errorMsg)) { echo '<p style="color: red;">'.$errorMsg.'</p>'; } ?>
           <input class="home-src" type="text" name="email" placeholder="where to?" required>
           <button class="home-src-submit" type="submit" name="submit">search</button>
           </form>
       </div>

    
    </header>
    <main>
        <section>
            <div>
                <img class="home-img" src="image/home1.avif" alt="">
            </div>
        </section>
    </main>
    
 <script src="js/home.js"></script>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>


