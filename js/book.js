var cart = {};

function addToCart(packageName, numNights, price) {
	if (!cart[packageName]) {
		cart[packageName] = {numNights: numNights, price: price};
		updateCart();
	}
}

function removeFromCart(packageName) {
	if (cart[packageName]) {
		delete cart[packageName];
		updateCart();
	}
}

function updateCart() {
	var table = $("#cart");
	table.find("tr:gt(0)").remove();
	var total = 0;
	for (var packageName in cart) {
		var packageInfo = cart[packageName];
		var row = "<tr><td>" + packageName + "</td><td>" + packageInfo.numNights + "</td><td>$" + packageInfo.price + "</td></tr>";
		table.append(row);
		total += packageInfo.price;
	}
	$("#total").text(total);
}

function confirmOrder() {
	var confirmed = confirm("Are you sure you want to confirm your order?");
	if (confirmed) {
		alert("Order confirmed. Total cost: $" + $("#total").text());
		cart = {};
		updateCart();
	}
}
