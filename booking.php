<!DOCTYPE html>
<html>
<head>
	<title>Package Deals</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</head>
<body>
	<h1>Package Deals</h1>
	<table>
		<tr>
			<th>Package Name</th>
			<th>Number of Nights</th>
			<th>Price</th>
			<th>Actions</th>
		</tr>
		<tr>
			<td>Package A</td>
			<td>3</td>
			<td>$300</td>
			<td>
				<button onclick="addToCart('Package A', 3, 300)">Add to Cart</button>
				<button onclick="removeFromCart('Package A')">Remove from Cart</button>
			</td>
		</tr>
		<tr>
			<td>Package B</td>
			<td>5</td>
			<td>$500</td>
			<td>
				<button onclick="addToCart('Package B', 5, 500)">Add to Cart</button>
				<button onclick="removeFromCart('Package B')">Remove from Cart</button>
			</td>
		</tr>
	</table>
	<h2>Cart</h2>
	<table id="cart">
		<tr>
			<th>Package Name</th>
			<th>Number of Nights</th>
			<th>Price</th>
		</tr>
	</table>
	<p>Total: $<span id="total"></span></p>
	<button onclick="confirmOrder()">Confirm Order</button>

    <script src="js/book.js"></script>
</body>
</html>
