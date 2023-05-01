<!DOCTYPE html>
<html>
<head>
    <title>Travel Packages</title>
</head>
<body>
    <h1>Available Travel Packages</h1>

    <?php foreach($packages as $index => $package) { ?>
        <div>
            <h3><?php echo $package['name']; ?></h3>
            <p><?php echo $package['description']; ?></p>
            <p>Price: $<?php echo $package['price']; ?></p>
            <button class="add-to-cart" data-index="<?php echo $index; ?>">Add to Cart</button>
        </div>
    <?php } ?>

    <h2>Cart</h2>
    <div id="cart">
        <?php foreach($cart as $package) { ?>
            <div>
                <h3><?php echo $package['name']; ?></h3>
                <p>Price: $<?php echo $package['price']; ?></p>
            </div>
        <?php } ?>
        <p>Total Cost: $<?php echo $total_cost; ?></p>
    </div>

    <script>
        var addToCartButtons = document.querySelectorAll('.add-to-cart');
        var cartDiv = document.getElementById('cart');
        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var packageIndex = button.getAttribute('data-index');
                var formData = new FormData();
                formData.append('package_index', packageIndex);
                fetch('add_to_cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(function(response) {
                    return response.text();
                })
                .then(function(html) {
                    cartDiv.innerHTML = html;
                })
                .catch(function(error) {
                    console.log(error);
                });
            });
        });
    </script>
</body>
</html>
