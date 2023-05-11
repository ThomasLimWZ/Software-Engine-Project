<?php
$connect = mysqli_connect("localhost", "root", "", "4ppl_telco");

if ($connect) {
    // echo "Connected";
} else {
    echo "Connection failed";
}
?>