

<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

$countries = array("USA", "Canada", "Mexico", "Brazil", "France", "Germany", "Italy", "Spain");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

    
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.btn_container{
            margin-top: 50px;
            padding:20px;
            text-align: right;
            background-color:green;
            
}


    #destination-btn-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 80px);
    }

    #destination-btn-container button {
        background-color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 20px;
        cursor: pointer;
    }

    .centered-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
    z-index: 1;
}


    </style>
</head>
<body>
<header>
    <div class="btn_container">
        <button style="color:green; height:40px; border-radius:5px ;" onclick="window.location.href='login.php'">Travel With Us</button>
    </div>
    <div class="centered-text">
        <h1>Amazing Tours</h1>
        <p>Travel safely and enjoy with us</p>
    </div>
    <img src="image/header_frontpage_2.jpg" alt="">
    <div id="destination-btn-container">
        <!-- <button onclick="openModal()">Visit our page</button> -->
        <button onclick="location.href='home.php'">Visit our page</button>
    </div>
</header>

  
 <main>
 <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2>Countries</h2>
      <?php foreach($countries as $country) { ?>
        <p><?php echo $country; ?></p>
      <?php } ?>
      
      <div id="see-more" style="display: none;">
        <?php foreach($countries as $country) { ?>
          <p><?php echo $country; ?></p>
        <?php } ?>
      </div>
      
      <?php if(count($countries) > 3) { ?>
        <button onclick="showMore()">See More</button>
      <?php } ?>
    </div>
  </div>

  <div>
      <h1 class="title">About Us</h1>
      <p>Amazing Tours is leading tour operator of Bangladesh. Amazing Tours established in 2009 with a view to develop sustainable tours to various destinations in this beautiful Bangladesh and as such you can meet the generous peoples of this country. Our team is committed to give you a new light of tourism experiences which you had never before.</p> 
  </div>
 
 </main>
  <script src="js/head.js"></script>
</body>
</html>
