<?php 
    include("../Admin/connection.php");
	
	$id = $_GET['selectedProdDetail'];
	
    $checkPrice = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '$id'");
    
    $prodColorArr = array();

    while ($checkRow = mysqli_fetch_assoc($checkPrice)) {
        array_push($prodColorArr, $checkRow['prod_color_id']);
    };

    echo json_encode($prodColorArr);
?>