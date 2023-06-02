<?php
include("../connection.php");

$brandName = $_POST['brandName'];

$sql = "SELECT * FROM brand WHERE brand_name = '$brandName'";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $brandStatus = $row['brand_status'];

    $statusToUpdate = $brandStatus == 1 ? 0 : 1;
    mysqli_query($connect, "UPDATE brand SET brand_status = $statusToUpdate WHERE brand_name = '$brandName'");
}
?>