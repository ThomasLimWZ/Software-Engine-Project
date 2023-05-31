<?php 
    include("../Admin/connection.php");
	
	$id = $_GET['selectedProdDetail'];
	
    $checkPrice = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_detail_id = '$id'");
    $checkRow = mysqli_fetch_assoc($checkPrice);
    
    echo $checkRow['prod_detail_price'];
?>