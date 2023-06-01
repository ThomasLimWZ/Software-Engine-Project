<?php 
    include("../Admin/connection.php");
	
	$cus = $_GET['cusId'];
	
    $getCart = mysqli_query($connect, "SELECT * FROM cart_item WHERE cus_id = '$cus' AND cart_item_status = '1'");
    $total = 0;

    while ($cartRow = mysqli_fetch_assoc($getCart)) {
        $total += $cartRow['cart_subtotal'];
    }

    echo number_format($total, 2);
?>