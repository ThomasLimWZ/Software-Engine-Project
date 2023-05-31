<?php 
    include("../Admin/connection.php");

    $name = $_POST['prodName'];

    $result = mysqli_query($connect,"SELECT * FROM product WHERE prod_name='$name'");
    $row = mysqli_fetch_assoc($result);

    echo $row['prod_id'];
?>