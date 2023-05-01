<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/7a7f68cef6.js" crossorigin="anonymous"></script>
</head>
<body>

<main>
    <div class="search">
        <form action="" method="post">
            <label for="get_id"></label>
            <input type="text" id="get_id" name="filter_value" placeholder="where to go?">
            <button type="submit" name="filter_btn">Search</button>
        </form>
    </div>
    <div>
        <table>
            <tbody>
            <?php
                $connection=mysqli_connect("localhost", "root", "", "filter3");
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
    <a href="book.php">Book Now</a>
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
</main>
</body>
</html>
