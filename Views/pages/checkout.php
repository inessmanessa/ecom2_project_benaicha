<?php 
	require_once('models/Product.php');
  	$grand_total = 0;
  	$allItems = '';
  	$items = [];
	$cart = Product::getCartForCheckout();
	while ($row = $cart->fetch_assoc()) {
		$grand_total += $row['total_price'];
    	$items[] = $row['ItemQty'];
	}
  	$allItems = implode(', ', $items);
	require_once('views/checkout.phtml');