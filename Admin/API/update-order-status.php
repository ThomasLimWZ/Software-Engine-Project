<?php
include("../connection.php");

$orderId = $_POST['orderId'];
$statusToUpdate = $_POST['shippingStatus'];

$sql = "UPDATE shipping SET ship_status = '$statusToUpdate' WHERE order_id = '$orderId'";
$result = mysqli_query($connect, $sql);

if ($statusToUpdate == 1) 
    echo "Shipped Out";
else if ($statusToUpdate == 2) 
    echo "Delivery In Progress";
else
    echo "Delivered";
?>