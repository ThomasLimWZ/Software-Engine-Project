<?php

    $connect=mysqli_connect("localhost","root","","4ppl_telco");

    if($connect)
    {
        
    }
    else
    {
        die("Could not connect".mysqli_connect_error());
    }
?>
