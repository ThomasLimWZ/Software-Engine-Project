<?php 
    include("../Admin/connection.php");

    $cusId = $_POST['cusId'];
	$id = $_POST['cartItemId'];
	$price = $_POST['price'];
	$qty = $_POST['quantity'];
	
	$subtotal = $price * $qty;
	
	mysqli_query($connect,"UPDATE cart_item SET quantity = '$qty', cart_subtotal = '$subtotal' 
                            WHERE cart_item_id = '$id' AND cus_id = '$cusId' AND cart_item_status = '1'");
	
	echo number_format($subtotal, 2);
?>