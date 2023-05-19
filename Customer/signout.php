<!DOCTYPE html>
<html lang="en">
<body>
<?php 

    include('head.php'); 
    unset($_SESSION["customer_id"]);
    session_destroy();
    echo "
     <script>
        Swal.fire(
            'Log out Success!',
            '',
            'success'
        ).then(() => window.location.href='index.php');
    </script>
    ";

?>


</body>
</html>
