<?php
include("../connection.php");

$prodId = $_POST['prodId'];

$sql = "SELECT * FROM product WHERE prod_id = '$prodId'";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $prodStatus = $row['prod_status'];

    $statusToUpdate = $prodStatus == 1 ? 0 : 1;
    mysqli_query($connect, "UPDATE product SET prod_status = $statusToUpdate WHERE prod_id = '$prodId'");
}
?>