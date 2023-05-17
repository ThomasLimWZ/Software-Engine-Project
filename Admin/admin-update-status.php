<?php
include("connection.php");

$admId = $_POST['admId'];

$sql = "SELECT * FROM admin WHERE adm_id = '$admId'";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $admStatus = $row['adm_status'];

    $statusToUpdate = $admStatus == 1 ? 0 : 1;
    mysqli_query($connect, "UPDATE admin SET adm_status=$statusToUpdate where adm_id='$admId'");
}
?>