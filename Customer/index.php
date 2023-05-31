<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); 

function get_top_sales_new_label($connect,$prod_id_array)
{
    //define how many product specific as new product
    $new_product = 6;

    //define how many product specific as sales
    $show_sale_limit = 6;

    //define how many product specific as top
    $show_top_limit = 6;

    //new product
    $exta = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
    $exta .= " GROUP BY product.prod_id DESC ";
    $exta .= " LIMIT $new_product";
    $query5 = mysqli_query($connect, $exta);

    $valid_new = [];
    while($get_id = mysqli_fetch_assoc($query5)){
        array_push($valid_new, $get_id['prod_id']);
        if (($key = array_search($get_id['prod_id'], $prod_id_array)) !== false) {
            unset($prod_id_array[$key]);
            array_unshift($prod_id_array,$get_id['prod_id']);
        }
    }

    //set for the sales
    $sale_sql = "SELECT product.prod_id, SUM(quantity)AS 'sale_num' FROM `order` INNER JOIN cart_item ON `order`.order_id = cart_item.order_id INNER JOIN product ON cart_item.prod_id = product.prod_id GROUP BY cart_item.prod_id ORDER BY sale_num DESC LIMIT $show_sale_limit";
    $query6 = mysqli_query($connect, $sale_sql); 

    $valid_sales = [];
    while($get_id = mysqli_fetch_assoc($query6)){
        array_push($valid_sales, $get_id['prod_id']);
        if (($key = array_search($get_id['prod_id'], $prod_id_array)) !== false) {
            unset($prod_id_array[$key]);
            array_unshift($prod_id_array,$get_id['prod_id']);
        }
    }

    //get month
    $month = Date('m');
    //set for the top
    $sale_sql = "SELECT product.prod_id, SUM(quantity)AS 'sale_num' FROM `order` INNER JOIN cart_item ON `order`.order_id = cart_item.order_id INNER JOIN product ON cart_item.prod_id = product.prod_id where month(order_datetime)='$month' GROUP BY cart_item.prod_id ORDER BY sale_num DESC LIMIT $show_top_limit";
    $query7 = mysqli_query($connect, $sale_sql); 

    $valid_top = [];
    while($get_id = mysqli_fetch_assoc($query7)){
        array_push($valid_top, $get_id['prod_id']);
        if (($key = array_search($get_id['prod_id'], $prod_id_array)) !== false) {
            unset($prod_id_array[$key]);
            array_unshift($prod_id_array,$get_id['prod_id']);
        }
    }

    return [$valid_new,$valid_sales,$valid_top,$prod_id_array];
}

function show_product($connect,$validate,$p_view)
{
    $valid_top = $validate[2];
    $valid_sales =$validate[1];
    $valid_new =$validate[0];
    $prod_id_array =$validate[3];

    $exta = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
    $exta .= " AND product.prod_id = '$prod_id_array[$p_view]' ";
    $query = mysqli_query($connect, $exta);
    $showprod = mysqli_fetch_assoc($query);    

    $insert_out_of_stock = '';
    $show_label='';
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

    //setting up out of stock label
    $out_of_stock_sql = "SELECT MAX(prod_color_stock)AS 'max_stock'  FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
    $out_of_stock_sql .= " AND product.prod_id = ' ";
    $out_of_stock_sql .= ($showprod['prod_id']);
    $out_of_stock_sql .= "'";
    $query4 = mysqli_query($connect, $out_of_stock_sql); 
    $max_stock_num = mysqli_fetch_assoc($query4);

    $insert_out_of_stock = '';
    if ($max_stock_num['max_stock'] <= 0)
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

    //price range
    $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
    $price_range .= " AND product.prod_id = ' ";
    $price_range .= ($showprod['prod_id']);
    $price_range .= "'";
    $query3 = mysqli_query($connect, $price_range); 
    $max_min_price = mysqli_fetch_assoc($query3);

    $showup = '';
    //product box code
    $showup .= '
        <div class="product product-2">
    
                <figure class="product-media">
                    '.$insert_out_of_stock.$show_label.'
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
                    RM '.$max_min_price['min_price'];
                        
                    if($max_min_price['min_price'] != $max_min_price['max_price'] )
                    $showup.= ' - RM '.$max_min_price['max_price'];

                    $showup.='
                    </div><!-- End .product-price -->           
                </div><!-- End .product-body -->
            
        </div><!-- End product product-2 -->
    ';

    echo $showup;
}

$month = Date('m');
?>

<body>
    <div class="page-wrapper">
        <?php include('header.php'); ?>

        <main class="main">
            <div class="intro-section pt-3 pb-3 mb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                                <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "dots": true,
                                        "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                                    <!-- for slide -->
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="assets/images/index_slide/index-img.jpg">
                                                <img src="assets/images/index_slide/index-img.jpg" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title" style="color:white">
                                                Iphone 14 Pro <br>Pro.Beyond.
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup style="color:wheat">Start From:</sup>
                                                <span class="text-primary">
                                                    RM 5299<sup>.00</sup>
                                                </span>
                                            </div><!-- End .intro-price -->

                                            <a href="category.php?brand_id=1&cat_id=1" class="btn btn-primary btn-round">
                                                <span>Click Here</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="assets/images/index_slide/xiaomi13pro.jpg">
                                                <img src="assets/images/index_slide/xiaomi13pro.jpg" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">Daily Deals</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                XIAOMI 13 Pro<br>
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup>Today:</sup>
                                                <span class="text-primary">
                                                    RM 4500<sup>.00</sup>
                                                </span>
                                            </div><!-- End .intro-price -->

                                            <a href="category.php" class="btn btn-primary btn-round">
                                                <span>Click Here</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <div class="video-banner-box">
                                                    <div class="row align-items-center my-4">
                                                        <div class="col-md-6 mb-3 mb-md-0">
                                                            <div class="video-box-content">
                                                                <h3 class="video-banner-title h1"><span class="text-primary">New Video</span><strong>iPhone 14 Pro Max</strong></h3><!-- End .video-banner-title -->
                                                                <p>Designed to make a difference.</p>
                                                                <a href="#" class="btn btn-primary btn-round"><span>Click Here</span><i class="icon-long-arrow-right"></i></a>
                                                            </div><!-- End .video-box-content -->
                                                        </div><!-- End .col-md-6 -->
                                                        <div class="col-md-6">
                                                            <div class="video-poster">
                                                                <img src="assets/images/video/poster.png" alt="poster" style="height: 400px; object-fit:contain;">

                                                                <div class="video-poster-content">
                                                                    <a href="https://www.youtube.com/watch?v=FT3ODSg1GFE" class="btn-video btn-iframe"><i class="icon-play"></i></a>
                                                                </div><!-- End .video-poster-content -->	
                                                            </div><!-- End .video-poster -->
                                                        </div><!-- End .col-md-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .video-banner-box -->
                                            </picture>
                                        </figure><!-- End .slide-image -->
                                    </div><!-- End .intro-slide -->
                                </div><!-- End .intro-slider owl-carousel owl-simple -->
                                
                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->
                        </div><!-- End .col-lg-10 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .intro-section -->

            <div class="container featured">
                <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab" role="tab" aria-controls="products-featured-tab" aria-selected="true">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab" aria-controls="products-sale-tab" aria-selected="false">On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab" aria-controls="products-top-tab" aria-selected="false">Top Sale</a>
                    </li>
                </ul>

                <div class="tab-content tab-content-carousel">
                    <!-- for Featured -->
                    <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                            <?php 
                            //random taking the product
                                $extra = "SELECT * FROM product 
                                            INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                            INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                            WHERE prod_status = 1";
                                $extra .= " GROUP BY product.prod_id ";
                                $extra .= " ORDER BY RAND()";
                                $query = mysqli_query($connect, $extra);

                                $setting_view = 5;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);
                                            
                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query)){
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <!-- for On Sale -->
                    <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                            <?php 
                               
                                $extra = "SELECT *  FROM `order` 
                                        INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                        INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                        INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                        WHERE prod_status = 1 AND brand.brand_status = 1 ";
                                $extra .= " GROUP BY product.prod_id ";
                                $extra .= " ORDER BY RAND(), SUM(quantity) DESC";
                                $query = mysqli_query($connect,$extra);

                                $setting_view = 5;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);
                                            
                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query)){
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }

                                
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <!-- for Top -->
                    <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel" aria-labelledby="products-top-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                            <?php 
                               
                                $extra = "SELECT *  FROM `order` 
                                        INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                        INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                        INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                        WHERE prod_status = 1 AND brand.brand_status = 1 AND month(order_datetime)='$month' ";
                                $extra .= " GROUP BY product.prod_id ";
                                $extra .= " ORDER BY RAND(), SUM(quantity) DESC";
                                $query = mysqli_query($connect,$extra);

                                $setting_view = 5;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);
                                            
                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query)){
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }

                                
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

            <div class="container">
                <hr class="mt-3 mb-6">
            </div><!-- End .container -->
            
            <!-- top Selling Product -->
            <div class="container top">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Top Selling Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                            </li>
                            <?php
                                $month = Date('m');
                                $sql = "SELECT cat_name FROM `order` 
                                        INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                        INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                        INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                        WHERE prod_status = 1 AND brand.brand_status = 1 AND month(order_datetime)='$month'
                                        GROUP BY category.cat_id ORDER BY SUM(quantity) DESC";
                                $sql_category_data = mysqli_query($connect, $sql);

                                while ($list_category_data = mysqli_fetch_assoc($sql_category_data)) {
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" id="top-'.$list_category_data['cat_name'].'-link" data-toggle="tab" href="#top-'.$list_category_data['cat_name'].'-tab" role="tab" aria-controls="top-'.$list_category_data['cat_name'].'-tab" aria-selected="false">'.$list_category_data['cat_name'].'</a>
                                        </li>
                                    ';
                                }
                            ?>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->
                
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="toppanel" aria-labelledby="top-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                            <?php
                                $extra = "SELECT *  FROM `order` 
                                        INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                        INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                        INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                        WHERE prod_status = 1 AND brand.brand_status = 1 AND month(order_datetime)='$month' ";
                                $extra .= " GROUP BY product.prod_id ";
                                $extra .= " ORDER BY SUM(quantity) DESC";
                                $query = mysqli_query($connect,$extra);

                                $setting_view = 6;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);
                                            
                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query)){
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <?php
                        $month = Date('m');
                        $sql = "SELECT * FROM `order` 
                                INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                INNER JOIN category ON product.cat_id = category.cat_id 
                                INNER JOIN brand ON product.brand_id = brand.brand_id
                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                WHERE prod_status = 1 AND brand.brand_status = 1 AND month(order_datetime)='$month'
                                GROUP BY category.cat_id ORDER BY SUM(quantity) DESC";
                        $sql_category_data = mysqli_query($connect,$sql);

                        while ($list_category_data = mysqli_fetch_assoc($sql_category_data)) {
                            echo '   
                                <div class="tab-pane p-0 fade" id="top-'.$list_category_data['cat_name'].'-tab" role="tabpanel" aria-labelledby="top-'.$list_category_data['cat_name'].'-link">';
                    ?>     
                                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                        data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                },
                                                "1200": {
                                                    "items":5
                                                }
                                            }
                                        }'>

                                    <?php
                                        $month = Date('m');
                                        $extra = "SELECT * FROM `order` 
                                                INNER JOIN cart_item ON `order`.order_id = cart_item.order_id 
                                                INNER JOIN product ON cart_item.prod_id = product.prod_id 
                                                INNER JOIN category ON product.cat_id = category.cat_id 
                                                INNER JOIN brand ON product.brand_id = brand.brand_id
                                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id                                         
                                                WHERE prod_status = 1 AND brand.brand_status = 1 AND month(order_datetime)='$month' ";
                                        $extra .= " AND product.cat_id = ' ";
                                        $extra .= ($list_category_data['cat_id']);
                                        $extra .= "' GROUP BY product.prod_id ORDER BY SUM(quantity) DESC ";
                                        $query = mysqli_query($connect, $extra);

                                        $setting_view = 6;
                                        if ($setting_view > mysqli_num_rows($query))
                                            $setting_view = mysqli_num_rows($query);
                                            
                                        $prod_id_array = [];
                                        while ($get_id = mysqli_fetch_assoc($query))
                                        {
                                            array_push($prod_id_array, $get_id['prod_id']);
                                        }

                                        $validate=get_top_sales_new_label($connect,$prod_id_array);

                                        for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                            show_product($connect, $validate, $p_view);
                                        }
                                        
                                        
                                    ?>
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <?php 
                        }
                    ?>

                </div><!-- End .tab-content -->
            </div><!-- End .container -->
            
            <div class="container">
                <hr class="mt-3 mb-6">
            </div><!-- End .container -->

            <!--  Product - Category -->
            <div class="container top">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Products - Category</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="cat-all-link" data-toggle="tab" href="#cat-all-tab" role="tab" aria-controls="cat-all-tab" aria-selected="true">All</a>
                            </li>
                            <?php
                                $sql = "SELECT cat_name FROM product 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                        INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                        WHERE prod_status = 1 AND brand.brand_status = 1";
                                $sql .= " GROUP BY category.cat_id";
                                $sql_category_data = mysqli_query($connect,$sql);

                                while ($list_category_data = mysqli_fetch_assoc($sql_category_data)) {
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" id="cat-'.$list_category_data['cat_name'].'-link" data-toggle="tab" href="#cat-'.$list_category_data['cat_name'].'-tab" role="tab" aria-controls="cat-'.$list_category_data['cat_name'].'-tab" aria-selected="false">'.$list_category_data['cat_name'].'</a>
                                        </li>
                                    ';
                                }
                            ?>
                            
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->
                
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="cat-all-tab" role="catpanel" aria-labelledby="cat-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                            <?php 
                                $extra = "SELECT * FROM product 
                                            INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                            INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                            INNER JOIN brand ON product.brand_id = brand.brand_id
                                            WHERE prod_status = 1 AND brand.brand_status = 1";
                                $extra .= " GROUP BY product.prod_id";
                                $extra .= " ORDER BY RAND()";
                                $query = mysqli_query($connect, $extra);

                                $setting_view = 6;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);
                                    
                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query))
                                {
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <?php
                        $sql = "SELECT * FROM product 
                                INNER JOIN category ON product.cat_id = category.cat_id 
                                INNER JOIN brand ON product.brand_id = brand.brand_id
                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                WHERE prod_status = 1 AND brand.brand_status = 1";
                        $sql .= " GROUP BY category.cat_id ";
                        $sql_category_data = mysqli_query($connect,$sql);

                        while($list_category_data = mysqli_fetch_assoc($sql_category_data))
                        {
                            echo '   
                            <div class="tab-pane p-0 fade" id="cat-'.$list_category_data['cat_name'].'-tab" role="tabpanel" aria-labelledby="cat-'.$list_category_data['cat_name'].'-link">';
                            ?>     <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":5
                                            }
                                        }
                                    }'>

                                    <?php 
                                        //random taking the product
                                        $extra = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                        $extra .= " AND product.cat_id = ' ";
                                        $extra .= ($list_category_data['cat_id']);
                                        $extra .= "' GROUP BY product.prod_id ";
                                        $query = mysqli_query($connect,$extra);

                                        $setting_view = 6;
                                        if($setting_view > mysqli_num_rows($query))
                                            $setting_view = mysqli_num_rows($query);
                                            
                                        $prod_id_array = [];
                                        while ($get_id = mysqli_fetch_assoc($query))
                                        {
                                            array_push($prod_id_array, $get_id['prod_id']);
                                        }

                                        $validate=get_top_sales_new_label($connect,$prod_id_array);

                                        for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                            show_product($connect, $validate, $p_view);
                                        }
                                       
                                    ?>
               
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <?php 
                        }
                    ?>
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="container">
                <hr class="mt-3 mb-6">
            </div><!-- End .container -->

            <!--  Product - Brand -->
            <div class="container top">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Products - Brand</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="brand-all-link" data-toggle="tab" href="#brand-all-tab" role="tab" aria-controls="brand-all-tab" aria-selected="true">All</a>
                            </li>
                            <?php
                                $sql = "SELECT brand_name FROM product 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id 
                                        WHERE prod_status = 1 AND brand.brand_status = 1";  
                                $sql .= " GROUP BY product.brand_id";
                                $sql_brand_data = mysqli_query($connect,$sql);

                                while ($list_brand_data = mysqli_fetch_assoc($sql_brand_data)) {
                                    echo '
                                        <li class="nav-item">
                                            <a class="nav-link" id="brand-'.$list_brand_data['brand_name'].'-link" data-toggle="tab" href="#brand-'.$list_brand_data['brand_name'].'-tab" role="tab" aria-controls="brand-'.$list_brand_data['brand_name'].'-tab" aria-selected="false">'.$list_brand_data['brand_name'].'</a>
                                        </li>
                                    ';
                                }
                            ?>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->
                
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="brand-all-tab" role="brandpanel" aria-labelledby="brand-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                            <?php
                                $extra = "SELECT * FROM product 
                                            INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                            INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                            INNER JOIN brand ON product.brand_id = brand.brand_id
                                            WHERE prod_status = 1 AND brand.brand_status = 1";
                                $extra .= " GROUP BY product.prod_id";
                                $extra .= " ORDER BY RAND()";
                                $query = mysqli_query($connect, $extra);

                                $setting_view = 6;
                                if($setting_view > mysqli_num_rows($query))
                                    $setting_view = mysqli_num_rows($query);

                                $prod_id_array = [];
                                while ($get_id = mysqli_fetch_assoc($query))
                                {
                                    array_push($prod_id_array, $get_id['prod_id']);
                                }

                                $validate=get_top_sales_new_label($connect,$prod_id_array);

                                for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                    show_product($connect, $validate, $p_view);
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <?php
                        $sql = "SELECT * FROM product JOIN brand ON product.brand_id = brand.brand_id WHERE prod_status = '1'  ";
                        $sql .= " GROUP BY brand.brand_id ";
                        $sql_category_data = mysqli_query($connect,$sql);

                        while($list_brand_data = mysqli_fetch_assoc($sql_category_data))
                        {
                            echo '   
                            <div class="tab-pane p-0 fade" id="brand-'.$list_brand_data['brand_name'].'-tab" role="tabpanel" aria-labelledby="brand-'.$list_brand_data['brand_name'].'-link">';
                            ?>     <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": true, 
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":5
                                            }
                                        }
                                    }'>

                                    <?php 
                                        //random taking the product
                                        $extra = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                        $extra .= " AND product.brand_id = ' ";
                                        $extra .= ($list_brand_data['brand_id']);
                                        $extra .= "' GROUP BY product.prod_id DESC";
                                        $query = mysqli_query($connect,$extra);

                                        $setting_view = 6;
                                        if($setting_view > mysqli_num_rows($query))
                                        $setting_view = mysqli_num_rows($query);

                                        $prod_id_array = [];
                                        while ($get_id = mysqli_fetch_assoc($query))
                                        {
                                            array_push($prod_id_array, $get_id['prod_id']);
                                        }

                                        $validate=get_top_sales_new_label($connect,$prod_id_array);

                                        for ($p_view=0; $p_view<$setting_view; $p_view++) {
                                            show_product($connect, $validate, $p_view);
                                        }
                                    ?>

                    

                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <?php 
                        }
                    ?>
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="container">
                <hr class="mt-5 mb-6">
            </div><!-- End .container -->

            <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>All states within Malaysia</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Secure Payment</h3><!-- End .icon-box-title -->
                                    <p>Safety Payment Gateway</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get Information</h3><!-- End .icon-box-title -->
                                    <p>of products we're selling</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Customer Support</h3><!-- End .icon-box-title -->
                                    <p>All the time</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->
        
        <?php include('footer.php'); ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <?php include('mobile-menu-container.php'); ?>

    <!-- Sign in / Register Modal -->
    <?php include('signin-register-modal.php'); ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-3.js"></script>
    
</body>

</html>