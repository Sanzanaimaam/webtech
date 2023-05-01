<?php
 $server = "localhost";
 $user = "root";
 $password = "";
 $db="signup2";
 $conn = mysqli_connect($server, $user, $password, $db);
 if($conn){
    ?>
    <script>
        alert('connection successful')
    </script>
    <?php
 }
 else{
    ?>
    <script>
        alert('connection not successful')
    </script>
    <?php

 }
?>

 