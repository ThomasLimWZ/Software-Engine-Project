<?php 
    include("../Admin/connection.php");

    $searchThings = $_POST['keyword'];

    $products_in_lower = strtolower($searchThings);

    $sql = "SELECT DISTINCT prod_name FROM product 
            INNER JOIN brand ON product.brand_id = brand.brand_id 
            WHERE brand.brand_status=1 AND product.prod_status=1 AND LOWER(product.prod_name) LIKE '%$products_in_lower%'";
    
    $search_res = $connect->query($sql);
	$count = mysqli_num_rows($search_res);

    if ($count > 0) {
        while ($search_row = mysqli_fetch_array($search_res)) {
            $res[] = $search_row['prod_name'];
        }
    } else {
        $res = array();
    }
    
    echo json_encode($res);
?>