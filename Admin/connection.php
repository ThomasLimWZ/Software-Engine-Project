<?php
$connect = mysqli_connect("localhost", "root", "", "4ppl_telco");

if ($connect) {
    // echo "Connected";
} else {
    die("Connection failed".mysqli_connect_error());
}
?>