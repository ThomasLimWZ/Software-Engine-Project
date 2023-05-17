<?php
include("../connection.php");

$sql = "SELECT * FROM admin";
$result = mysqli_query($connect, $sql);

$idCount = 0;
while($row = mysqli_fetch_assoc($result)) {
    $idCount = $row['id'];
}

echo sprintf("ADM%03d", $idCount + 1);
?>