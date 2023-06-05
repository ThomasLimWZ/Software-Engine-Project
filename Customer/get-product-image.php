<?php 
    include("../Admin/connection.php");
	
	$id = $_GET['selectedProdColor'];
	
    $checkPrice = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_color_id = '$id'");
    $checkRow = mysqli_fetch_assoc($checkPrice);

    echo $checkRow['prod_color_img'];
?>