<?php 
    include("../Admin/connection.php");
	
	$code1 = $_GET['prod1_selected'];
    $code2 = $_GET['prod2_selected'];

    echo "compare.php?view&code1=".$code1."&code2=".$code2;
?>