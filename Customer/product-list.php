<?php

use function PHPSTORM_META\elementType;

session_start();
include("../Admin/connection.php");

//define how many product specific as new product
$new_product = 5;

//define how many product specific as top
$show_top_limit = 5;

$view = 8;
$page = $_POST['page'];
$offset = $view * ($page-1);

if ($page == 1)
{
    $offset = 0;
} 
    
//$exta = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
//$exta .= $_POST['searchTerm'];
//$exta .= " GROUP BY product.prod_id DESC ";
//$exta .= " LIMIT $view OFFSET $offset ";
//$query = mysqli_query($connect, $exta);
//$num =  mysqli_num_rows($query) + $offset;

$num =  $view + $offset;

$exta = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
$exta .= $_POST['searchTerm'];
$exta .= " GROUP BY product.prod_id DESC ";
$query2 = mysqli_query($connect, $exta);                                
$count = mysqli_num_rows($query2);

if($num>$count)
$num = $count;

$count2 = mysqli_num_rows($query2);
$prod_id_array = [];
while ($get_id = mysqli_fetch_assoc($query2))
{
    array_push($prod_id_array, $get_id['prod_id']);
}

//new product
$exta = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
$exta .= $_POST['searchTerm'];
$exta .= " GROUP BY product.prod_id DESC";
$exta .= " LIMIT $new_product";
$query5 = mysqli_query($connect, $exta);

$valid_new = [];
while($get_id = mysqli_fetch_assoc($query5)){
    array_push($valid_new, $get_id['prod_id']);
    
}

//set for the top
$sale_sql = "SELECT product.prod_id, SUM(quantity) AS 'sale_num' FROM `order` INNER JOIN cart_item ON `order`.order_id = cart_item.order_id INNER JOIN product ON cart_item.prod_id = product.prod_id GROUP BY cart_item.prod_id ORDER BY sale_num DESC LIMIT $show_top_limit";
$query6 = mysqli_query($connect, $sale_sql); 

$valid_top = [];
while($get_id = mysqli_fetch_assoc($query6)){
    array_push($valid_top, $get_id['prod_id']);
    if (($key = array_search($get_id['prod_id'], $prod_id_array)) !== false) {
        unset($prod_id_array[$key]);
        array_unshift($prod_id_array,$get_id['prod_id']);
    }
}

//get month
$month = Date('m');
//set for the sales
$sale_sql = "SELECT product.prod_id, SUM(quantity) AS 'sale_num' FROM `order` INNER JOIN cart_item ON `order`.order_id = cart_item.order_id INNER JOIN product ON cart_item.prod_id = product.prod_id where month(order_datetime)='$month' GROUP BY cart_item.prod_id ORDER BY sale_num DESC ";
$query7 = mysqli_query($connect, $sale_sql); 

$valid_sales = [];
while($get_id = mysqli_fetch_assoc($query7)){
    array_push($valid_sales, $get_id['prod_id']);
    if (($key = array_search($get_id['prod_id'], $prod_id_array)) !== false) {
        unset($prod_id_array[$key]);
        array_unshift($prod_id_array,$get_id['prod_id']);
    }
}


$showup = '
    <div class="toolbox">
        <div class="toolbox-center" style="margin:auto;">
            <div class="toolbox-info">
                Showing <span>'.$num.' of '.$count.'</span> Products
            </div><!-- End .toolbox-info -->
        </div><!-- End .toolbox-center -->
    </div><!-- End .toolbox -->

    <div class="products">
    <div class="row" id="show-product-list">
';

if ($count != 0)
{
    //while ($showprod = mysqli_fetch_assoc($query)) {
    for ($p_view=$offset; $p_view<$num; $p_view++){
        $exta = "SELECT * , MAX(prod_color_stock)AS 'max_stock' , MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
        $exta .= " AND product.prod_id = '$prod_id_array[$p_view]' ";
        $query = mysqli_query($connect, $exta);
        $showprod = mysqli_fetch_assoc($query);

        //setting  label
        $show_label='';
        if ($showprod['max_stock'] <= 0)
            $show_label = '<span class="product-label label-out">Out of stock</span>';
        else
        {
            //setting for sales label
            for ($ln=0; $ln<count($valid_top); $ln++) //to show the new label
            {
                if ($showprod['prod_id'] == $valid_top[$ln]) 
                    $show_label.= '<span class="product-label label-circle label-top">Top</span>';
            }

            //setting for sales label
            for ($ln=0; $ln<count($valid_sales); $ln++) //to show the new label
            {
                if ($showprod['prod_id'] == $valid_sales[$ln]) 
                    $show_label.= '<span class="product-label label-circle label-sale">Sale</span>';
            }

            //setting for new stock label
            for ($ln=0; $ln<count($valid_new); $ln++) //to show the new label
            {
                if ($showprod['prod_id'] == $valid_new[$ln]) 
                    $show_label.= '<span class="product-label label-circle label-new">New</span>';
            }
        }

        //getting the product category name
        $cat_id = $showprod['cat_id'];
        $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
        $cat_data = mysqli_fetch_assoc($data);
        $categoty_name = $cat_data['cat_name'];

        //getting the product brand name
        $brand_id = $showprod['brand_id'];
        $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
        $brand_data = mysqli_fetch_assoc($data);
        $brand_name = $brand_data['brand_name'];

        //product box code
        $showup .= '
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                <div class="product" style="border:1px solid #ccc;">
                    <figure class="product-media">
                        '.$show_label.'
                            <a href="product.php?productId='.$showprod['prod_id'].'">
                                <img src="../Product/'.$showprod['prod_color_img'].'" alt="Product image" class="product-image">
                            </a>
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div>
                            <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.php?productId='.$showprod['prod_id'].'">'.$showprod['prod_name']."".'</a></h3><!-- End .product-title -->
                        <div class="product-price">
                        RM '.$showprod['min_price'];
                        
                        if($showprod['min_price'] != $showprod['max_price'] )
                        $showup.= ' - RM '.$showprod['max_price'];

                        $showup.='
                        </div><!-- End .product-price -->           
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
        ';
    }
    
    $showup .= '
                </div><!-- End .row -->
            </div><!-- End .products -->
            <div class="col-12 pb-1">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-10">
    ';

    if ($page == 1)
    {
        $showup .='
            <li class="page-item disabled">
            <a class="page-link" href="#main" onclick="callpage(1)" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>';
        $showup .='
            <li class="page-item disabled">
            <a class="page-link" href="#main" onclick="callpage('.($page-1).')" aria-label="Previous">
                <span aria-hidden="true">&#60;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>';
    }
    else
    {
        $showup .= '
            <li class="page-item ">
                <a class="page-link" href="#main" onclick="callpage(1)" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>'; 

        $showup .= '
            <li class="page-item ">
                <a class="page-link" href="#main" onclick="callpage('.($page-1).')" aria-label="Previous">
                    <span aria-hidden="true">&#60;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        ';                 
    }
    
    $numpage = $count/$view;
    
    if ($count%$view != 0)
    {
        $numpage+=1;
    }
    
    if ($numpage <= 7)
    {
        for($i=1; $i<=$numpage; $i++)
        { 
            if ($page == $i)
                $showup .= '<li class="page-item active"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';
            else
                $showup .= '<li class="page-item"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';      
        }
    }
    else
    {        
        $show_view_page = $page + 1;
        if($show_view_page>$numpage)
            $show_view_page=$numpage;
        if($show_view_page<8)
            $show_view_page=7;

        $start_view_page = $show_view_page-7;

        if ($start_view_page <1)
            $start_view_page=1;

        for ($i=$start_view_page; $i<=$show_view_page; $i++)
        { 
            if ($page == $i)
                $showup .= '<li class="page-item active"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';
            else
                $showup .= '<li class="page-item"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';      
        }
    }

    $numpage = (int)$numpage;    
                                        
    if ($page == $numpage)
    {
        $showup .= '
            <li class="page-item disabled">
                <a class="page-link" href="#main" aria-label="Next" onclick="callpage('.($page + 1).')">
                    <span aria-hidden="true">&#62;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        ';

        $showup .= '
            <li class="page-item disabled">
                <a class="page-link" href="#main" aria-label="Next" onclick="callpage('.$numpage.')">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        ';
     
    }
    else
    {
        $showup .= '
            <li class="page-item">
                <a class="page-link" href="#main" onclick="callpage('.($page + 1).')" aria-label="Next">
                    <span aria-hidden="true">&#62;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        ';
        
        $showup .= '
            <li class="page-item">
                <a class="page-link" href="#main" onclick="callpage('.$numpage.')" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        ';
    }
    
    $showup .='</li></ul></nav></div></div>';
}

$showup .=  '';
echo $showup;

?>
