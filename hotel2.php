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
    <style>


    </style>
</head>
<body>

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
<form action="" method="post" id="search-form">
  <label for="get_id"></label>
  <input type="text" id="get_id" name="filter_value" placeholder="where to go?">
  <button type="submit" name="filter_btn">Search</button>
</form>
</div>
<div id="search-results">
  <!-- search results will appear here -->
</div>
</section>
</section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // handle search form submission
  $('#search-form').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var filterValue = form.find('#get_id').val();
    var url = form.attr('action');
    var data = {
      'filter_value': filterValue,
      'filter_btn': true
    };
    // send AJAX request
    $.ajax({
      type: 'POST',
     
      data: data,
      beforeSend: function() {
        // show loading spinner or message
        $('#search-results').html('<p>Loading results...</p>');
      },
      success: function(response) {
        // display search results
        $('#search-results').html(response);
      },
      error: function(xhr, status, error) {
        // handle errors
        console.log('Error: ' + error.message);
      }
    });
  });
});
</script>

</body>
</html>
