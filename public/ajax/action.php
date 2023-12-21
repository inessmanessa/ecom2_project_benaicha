<?php
	session_start();
	include  '../../config/DB.php';
	$conn = DB::getConnection();
	// Add products into the cart table
	if (isset($_POST['item_id'])) {
	    $item_id = $_POST['item_id'];
	    $item_name = $_POST['item_name'];
	    $item_price = $_POST['item_price'];
	    $item_image = $_POST['item_image'];
	    $item_code = $_POST['item_code'];
	    $pqty = 1;
	    $total_price = $item_price * $pqty;

	    if (!isset($_SESSION['cart'])) {
	           $_SESSION['cart'] = array();
	       }

	    // Check if item already exists in cart
	    $code_exists = false;
	    foreach ($_SESSION['cart'] as $key => $value) {
	        if ($value['item_code'] == $item_code) {
	            $code_exists = true;
	            // Increase quantity and total price if item already exists in cart
	            $_SESSION['cart'][$key]['qty'] += $pqty;
	            $_SESSION['cart'][$key]['total_price'] = $_SESSION['cart'][$key]['qty'] * $item_price;
	            echo '<div class="alert alert-success alert-dismissible mt-2">
	                      <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Item quantity increased in your cart!</strong>
	                    </div>';
	            break;
	        }
	    }

	    // Add item to cart if it doesn't already exist
	    if (!$code_exists) {
	        $item = array(
	            'id' => $item_id,
	            'item_name' => $item_name,
	            'item_price' => $item_price,
	            'item_image' => $item_image,
	            'qty' => $pqty,
	            'total_price' => $total_price,
	            'item_code' => $item_code
	        );
	        $_SESSION['cart'][] = $item;
	        echo '<div class="alert alert-success alert-dismissible mt-2">
	                      <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Item added to your cart!</strong>
	                    </div>';
	    }
	}



	// Get no.of items available in the session cart
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $cart_items = $_SESSION['cart'] ?? array();
	  $rows = count($cart_items);

	  echo $rows;
	}


	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];
	  session_start();
	  unset($_SESSION['cart'][$id]);
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:../../index.php');
	}


	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	    unset($_SESSION['cart']);
	    $_SESSION['showAlert'] = 'block';
	    $_SESSION['message'] = 'All items removed from the cart!';
	    header('location:cart.php');
	}


	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $item_price = $_POST['item_price'];

	  $tprice = $qty * $item_price;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	  $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $conn->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
?>