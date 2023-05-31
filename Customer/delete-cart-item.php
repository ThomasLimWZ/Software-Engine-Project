<?php 
    include("../Admin/connection.php");
	
	$id = $_POST['cartItemId'];
	
    $checkPrice = mysqli_query($connect, "DELETE FROM cart_item WHERE cart_item_id = '$id' AND cart_item_status='1'");
    $checkRow = mysqli_fetch_assoc($checkPrice);
?>