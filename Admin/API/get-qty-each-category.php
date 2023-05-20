<?php
include("../connection.php");

$sql = "SELECT * FROM product INNER JOIN brand ON product.brand_id = brand.brand_id WHERE prod_status = 1";
$result = mysqli_query($connect, $sql);

$phoneCount = 0;
$tabletCount = 0;
$audioCount = 0;
$watchCount = 0;
$accessoriesCount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['cat_id'] == 1) {
        $phoneCount++;
    } else if ($row['cat_id'] == 2) {
        $tabletCount++;
    } else if ($row['cat_id'] == 3) {
        $audioCount++;
    } else if ($row['cat_id'] == 4) {
        $watchCount++;
    } else if ($row['cat_id'] == 5) {
        $accessoriesCount++;
    }
}

echo json_encode(array($phoneCount, $tabletCount, $audioCount, $watchCount, $accessoriesCount));
?>