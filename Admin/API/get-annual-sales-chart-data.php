<?php
include("../connection.php");

$eachMonthSales = array();

for ($i=1; $i<=12; $i++) {
    $monthlySalesRes = mysqli_query($connect, "SELECT SUM(order_grandtotal) FROM `order`
                                                INNER JOIN shipping ON `order`.order_id = shipping.order_id
                                                WHERE MONTH(`order`.order_datetime) = $i AND shipping.ship_status = '3'");
    $monthlySales = mysqli_fetch_array($monthlySalesRes);

    if ($monthlySales[0] == null) {
        $monthlySales[0] = 0;
    }
    
    array_push($eachMonthSales, $monthlySales[0]);
}

echo json_encode($eachMonthSales);
?>