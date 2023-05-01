<?php
session_start();

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="style/hote.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
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
</header>
<main>

<section  class="main">

<section> 
<div>
<h1 class="travel">Travel With Us</h1>
  <img class="img" src="image/log8.jpg" alt="">
  
</div>
</section>

<section>
<div class="search">
<form action="" method="post">
  <label for="get_id"></label>
  <input type="text" id="get_id" name="filter_value" placeholder="where?">
  <button type="submit" name="filter_btn">Search</button>
</form>
</div>
<div>
<table>
  <tbody>
  <?php
if(isset($_POST['filter_btn']))
{
    $value_filter= $_POST['filter_value'];
    $query= "SELECT * FROM employee WHERE CONCAT(place) LIKE '%$value_filter%'";
    $query_run= mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run)>0)
    {
        while($row = mysqli_fetch_array($query_run))
        {
?>
            <tr>
                <td>
                    <div class="items">
                        <h1><?php echo $row['name']; ?></h1>
                        <p><?php echo $row['phone']; ?></p>
                        <p><?php echo $row['email']; ?></p>
                        <p><?php echo $row['address']; ?></p>
                        <p><?php echo '<img src="data:image/jpeg;base64,' .base64_encode($row['image']).'" alt="Image" style="width:200px; height:100px">'; ?></p>
                        <button type="submit" name="add_to_cart">
                            <a href="book.html">Book Now</a>
                        </button>
                    </div>
                </td>
                <td></td>
            </tr>
<?php
        }
    }
    else
    {
?>
        <tr>
            <td>No Record Found</td>
        </tr>
<?php
    }
}
?>
  
  </tbody>
</table>
</div>
</section>
</section>
</main>
 <script>
    $(document).ready(function() {
    $('#filterForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "filter.php",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                $('#employeeTable tbody').html(''); // clear table data
                var data = JSON.parse(response);
                if (data.length > 0) {
                    $.each(data, function(i, item) {
                        $('#employeeTable tbody').append('<tr><td><div class="items"><h1>' + item.name + '</h1><p>' + item.phone + '</p><p>' + item.email + '</p><p>' + item.address + '</p><p><img src="data:image/jpeg;base64,' + item.image + '" alt="Image" style="width:200px; height:100px"></p><button type="submit" name="add_to_cart"><a href="book.html">Book Now</a></button></div></td><td></td></tr>');
                    });
                } else {
                    $('#employeeTable tbody').append('<tr><td>No Record Found</td></tr>');
                }
            }
        });
    });
});

 </script>
</body>
</html>
