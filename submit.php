<?php
	session_start();
	include 'admin/connect.php';
	
	$user_id = $_POST['userid'];
	$user_name = $_POST['username'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$payment = $_POST['payment_type'];
	$cardno = $_POST['cardno'];

	// Check stock availability before inserting order
	$insufficient_stock = false;
	foreach ($_SESSION['cart'] as $id => $qty) {
	    $id = mysqli_real_escape_string($connection, $id);
	    $getprice = mysqli_query($connection, "SELECT * FROM products WHERE productid='$id'");
	 
	    if (!$getprice) {
	        $_SESSION['error_message'] = "Error retrieving product details: " . mysqli_error($connection);
	        header("location:cart.php");
	        exit();
	    }
	 
	    $product = mysqli_fetch_array($getprice);
	 
	    if ($product) {
	        $db_qty = $product['Qty']; // Current quantity in stock
	 
	        if ($qty > $db_qty) {
	            $insufficient_stock = true;
	            break; // Exit loop if insufficient stock found
	        }
	    } else {
	        $_SESSION['error_message'] = "Product not found.";
	        header("location:cart.php");
	        exit();
	    }
	}
	 
	// If there is insufficient stock, redirect back with an error message
	if ($insufficient_stock) {
	    $_SESSION['error_message'] = "Insufficient stock for one or more products.";
	    header("location:cart.php");
	    exit();
	}

	// Insert order into orders table
	$query = "INSERT INTO orders (orderdate, customerid, deliveryname, deliveryphone, deliveryaddress, status) ";
	$query .= "VALUES (now(), '$user_id', '$user_name', '$phone', '$address', 0)";
	$go_query = mysqli_query($connection, $query);
	$order_id = mysqli_insert_id($connection);
 
	// Insert order details and update stock quantity
	foreach ($_SESSION['cart'] as $id => $qty) {
	    $getprice = mysqli_query($connection, "SELECT * FROM products WHERE productid='$id'");

	    if (!$getprice) {
	        $_SESSION['error_message'] = "Error retrieving product details: " . mysqli_error($connection);
	        header("location:cart.php");
	        exit();
	    }
	 
	    $product = mysqli_fetch_array($getprice);
	 
	    if ($product) {
	        $db_price = $product['price'];
	        $amount = $db_price * $qty;
	 
	        $query = "INSERT INTO orderdetails (orderid, productid, productqty, amount) ";
	        $query .= "VALUES ('$order_id', '$id', '$qty', '$amount')";
	        $go_query = mysqli_query($connection, $query);
	 
	        if (!$go_query) {
	            $_SESSION['error_message'] = "Error inserting order detail: " . mysqli_error($connection);
	            header("location:cart.php");
	            exit();
	        }

	        // Update the stock quantity in the products table
	        $new_qty = $product['Qty'] - $qty;
	        $update_query = "UPDATE products SET Qty = '$new_qty' WHERE productid = '$id'";
	        $update_result = mysqli_query($connection, $update_query);

	        if (!$update_result) {
	            $_SESSION['error_message'] = "Error updating product quantity: " . mysqli_error($connection);
	            header("location:cart.php");
	            exit();
	        }
	    } else {
	        $_SESSION['error_message'] = "Product not found.";
	        header("location:cart.php");
	        exit();
	    }
	}
 
	$_SESSION['order_id'] = $order_id;
	unset($_SESSION['cart']);
	header("location:show_success.php");
?>
