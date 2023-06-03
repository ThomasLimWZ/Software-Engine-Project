<?php 
    include("../Admin/connection.php");

    $id = $_GET['cus_id'];
	
    $cus_res = mysqli_query($connect, "SELECT * FROM customer WHERE cus_id = '$id'");
    $cus_row = mysqli_fetch_assoc($cus_res);

    $address = $cus_row['cus_address'];
    $city = $cus_row['cus_city'];
    $state = $cus_row['cus_state'];
    $postcode = $cus_row['cus_postcode'];

    echo json_encode(array($address, $city, $state, $postcode));
?>