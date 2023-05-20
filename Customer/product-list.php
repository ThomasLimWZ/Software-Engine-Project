<?php

use function PHPSTORM_META\elementType;

session_start();
include("../Admin/connection.php");

$view = 8;
$page = $_POST['page'];
$offset = $view * ($page-1);

if ($page == 1)
{
    $offset = 0;
} 
    
$exta = "SELECT * FROM product join product_detail ON product.prod_id = product_detail.prod_id join product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
$exta .= $_POST['searchTerm'];
$exta .= " LIMIT $view OFFSET $offset ";
$query = mysqli_query($connect,$exta);
$num =  mysqli_num_rows($query)+$offset;

$exta = "SELECT * FROM product join product_detail ON product.prod_id = product_detail.prod_id join product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
$exta .= $_POST['searchTerm'];
$query2 = mysqli_query($connect,$exta);                                
$count = mysqli_num_rows($query2);

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

$insert_out_of_stock = '';

if ($count != 0)
{
    while ($showprod = mysqli_fetch_assoc($query)) {   
        //setting up stock label
        if($showprod['prod_color_stock']==0)
        $insert_out_of_stock = '<span class="product-label label-out">Out of stock</span>';

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
                        '.$insert_out_of_stock.'
                            <a href="product.php">
                                <img src="../Product/'.$showprod['prod_color_img'].'" alt="Product image" class="product-image">
                            </a>
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div>
                            <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.php?prod_name='.$showprod['prod_id'].'">'.$showprod['prod_name']."".'</a></h3><!-- End .product-title -->
                        <div class="product-price">
                        RM '.$showprod['prod_detail_price'].'
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
            <ul class="pagination justify-content-center mb-10" >
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
    
    if ($count%$view !=0)
    {
        $numpage+=1;
    }
    
    if ($numpage <=7)
        for($i=1; $i<=$numpage; $i++)
        { 
            if ($page == $i)
                $showup .= '<li class="page-item active"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';
            else
                $showup .= '<li class="page-item"><a class="page-link" onclick="callpage('.$i.')" href="#main">'.$i.'</a></li>';      
        }
    else
    {        
        $show_view_page = $page+1;
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
                <a class="page-link" href="#main" aria-label="Next" onclick="callpage('.($page+1).')">
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
                <a class="page-link" href="#main" onclick="callpage('.($page+1).')" aria-label="Next">
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
