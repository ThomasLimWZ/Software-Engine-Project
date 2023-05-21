<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ; ?>

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
                                                <source media="(max-width: 480px)" srcset="assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                                                <img src="assets/images/demos/demo-3/slider/slide-1.jpg" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">Daily Deals</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                AirPods Pro<br>2nd Generation
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup>Today:</sup>
                                                <span class="text-primary">
                                                    RM 1099<sup>.00</sup>
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
                                                <source media="(max-width: 480px)" srcset="assets/images/demos/demo-3/slider/slide-2-480w.jpg">
                                                <img src="assets/images/demos/demo-3/slider/slide-2.jpg" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                Echo Dot <br>3rd Gen
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup class="intro-old-price">RM 1499.00</sup>
                                                <span class="text-primary">
                                                    RM 1299<sup>.00</sup>
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
                            $extra .= " AND prod_color_stock > '0'";
                            $extra .= " GROUP BY product.prod_id ";
                            $extra .= " ORDER BY RAND()";
                            $extra .= " LIMIT 5  ";
                            $query = mysqli_query($connect, $extra);

                            $sql = mysqli_query($connect, "SELECT * FROM product");
                            
                            while ($random_list = mysqli_fetch_assoc($query)) {
                                $count = mysqli_num_rows($sql);

                                //getting the product category name
                                $cat_id = $random_list['cat_id'];
                                $data = mysqli_query($connect, "SELECT * FROM category WHERE cat_id = '$cat_id'");
                                $cat_data = mysqli_fetch_assoc($data);
                                $categoty_name = $cat_data['cat_name'];

                                //getting the product brand name
                                $brand_id = $random_list['brand_id'];
                                $data = mysqli_query($connect, "SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                $brand_data = mysqli_fetch_assoc($data);
                                $brand_name = $brand_data['brand_name'];
                                
                                //price range
                                $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product 
                                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                                WHERE prod_status = 1";
                                $price_range .= " AND product.prod_id = ' ";
                                $price_range .= ($random_list['prod_id']);
                                $price_range .= "'";
                                $query3 = mysqli_query($connect, $price_range); 
                                $max_min_price = mysqli_fetch_assoc($query3);

                                echo '
                                    <div class="product product-2">
                                        <figure class="product-media">
                                ';
                                        
                                for($i=0;$i<4;$i++)//to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                {
                                    if($random_list['prod_id'] == $count) 
                                        echo '<span class="product-label label-circle label-new">New</span>';

                                    $count--;
                                }
                                        
                                echo'
                                            <a href="product.php">
                                                <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                            </a>
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                ';
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
                            //random taking the product - can edit the sql from here
                            $extra = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                            $extra .= " AND prod_color_stock > '0' ";
                            $extra .= " GROUP BY product.prod_id ";
                            $extra .= " ORDER BY RAND() ";
                            $extra .= " LIMIT 5  ";
                            $query = mysqli_query($connect,$extra);

                            $sql = mysqli_query($connect,"Select * FROM product");
                            
                            
                            
                            while($random_list = mysqli_fetch_assoc($query))
                            {
                                $count = mysqli_num_rows($sql);

                                //getting the product category name
                                $cat_id = $random_list['cat_id'];
                                $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                $cat_data = mysqli_fetch_assoc($data);
                                $categoty_name = $cat_data['cat_name'];

                                //getting the product brand name
                                $brand_id = $random_list['brand_id'];
                                $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                $brand_data = mysqli_fetch_assoc($data);
                                $brand_name = $brand_data['brand_name'];
                                
                                //price range
                                $price_range = "SELECT MIN(prod_detail_price)AS 'min_price',MAX(prod_detail_price)AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                $price_range .= " AND product.prod_id = ' ";
                                $price_range .= ($random_list['prod_id']);
                                $price_range .= "'";
                                $query3 = mysqli_query($connect, $price_range); 
                                $max_min_price = mysqli_fetch_assoc($query3);

                                echo '
                                <div class="product product-2">
                                    <figure class="product-media">
                                    ';
                                    
                                    for($i=0;$i<4;$i++)//to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                    {
                                        if($random_list['prod_id'] == $count) 
                                         echo '<span class="product-label label-circle label-new">New</span>';

                                        $count--;
                                    }
                                    
                                   echo'
                                        <a href="product.php">
                                            <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                ';
                            }

                                
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <!-- for Top Rated-->
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
                            //random taking the product - edit the sql script here
                            $extra = "SELECT * FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                            $extra .= " AND prod_color_stock > '0' ";
                            $extra .= " GROUP BY product.prod_id ";
                            $extra .= " ORDER BY RAND()";
                            $extra .= " LIMIT 5  ";
                            $query = mysqli_query($connect,$extra);

                            $sql = mysqli_query($connect,"Select * FROM product");
                            
                            
                            
                            while($random_list = mysqli_fetch_assoc($query))
                            {
                                $count = mysqli_num_rows($sql);

                                //getting the product category name
                                $cat_id = $random_list['cat_id'];
                                $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                $cat_data = mysqli_fetch_assoc($data);
                                $categoty_name = $cat_data['cat_name'];

                                //getting the product brand name
                                $brand_id = $random_list['brand_id'];
                                $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                $brand_data = mysqli_fetch_assoc($data);
                                $brand_name = $brand_data['brand_name'];
                                
                                //price range
                                $price_range = "SELECT MIN(prod_detail_price)AS 'min_price',MAX(prod_detail_price)AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                $price_range .= " AND product.prod_id = ' ";
                                $price_range .= ($random_list['prod_id']);
                                $price_range .= "'";
                                $query3 = mysqli_query($connect, $price_range); 
                                $max_min_price = mysqli_fetch_assoc($query3);

                                echo '
                                <div class="product product-2">
                                    <figure class="product-media">
                                    ';
                                    
                                    for($i=0;$i<4;$i++)//to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                    {
                                        if($random_list['prod_id'] == $count) 
                                         echo '<span class="product-label label-circle label-new">New</span>';

                                        $count--;
                                    }
                                    
                                   echo'
                                        <a href="product.php">
                                            <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                ';
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
                                $sql = "SELECT cat_name FROM product 
                                        INNER JOIN category ON product.cat_id = category.cat_id 
                                        INNER JOIN brand ON product.brand_id = brand.brand_id
                                        WHERE prod_status = 1 AND brand.brand_status = 1";
                                $sql .= " GROUP BY category.cat_id";
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
                                $extra = "SELECT * FROM product 
                                            INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                            INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                            INNER JOIN brand ON product.brand_id = brand.brand_id
                                            WHERE prod_status = 1 AND brand.brand_status = 1";
                                $extra .= " AND prod_color_stock > '0'";
                                $extra .= " GROUP BY product.prod_id";
                                $extra .= " ORDER BY RAND()";
                                $extra .= " LIMIT 6";
                                $query = mysqli_query($connect,$extra);

                                $sql = mysqli_query($connect, "SELECT * FROM product");
                                
                                while ($random_list = mysqli_fetch_assoc($query)) {
                                    $count = mysqli_num_rows($sql);

                                    //getting the product category name
                                    $cat_id = $random_list['cat_id'];
                                    $data = mysqli_query($connect, "SELECT * FROM category WHERE cat_id = '$cat_id'");
                                    $cat_data = mysqli_fetch_assoc($data);
                                    $categoty_name = $cat_data['cat_name'];

                                    //getting the product brand name
                                    $brand_id = $random_list['brand_id'];
                                    $data = mysqli_query($connect, "SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                    $brand_data = mysqli_fetch_assoc($data);
                                    $brand_name = $brand_data['brand_name'];
                                    
                                    //price range
                                    $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product 
                                                    INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                    INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id
                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                    WHERE prod_status = 1 AND brand.brand_status = 1";
                                    $price_range .= " AND product.prod_id = ' ";
                                    $price_range .= ($random_list['prod_id']);
                                    $price_range .= "'";
                                    $query3 = mysqli_query($connect, $price_range); 
                                    $max_min_price = mysqli_fetch_assoc($query3);

                                    echo '
                                        <div class="product product-2">
                                            <figure class="product-media">
                                    ';
                                        //TOP - <span class="product-label label-circle label-top">Top</span>
                                        //NEW - <span class="product-label label-circle label-new">New</span>
                                        //Sale - <span class="product-label label-circle label-sale">Sale</span>

                                    for ($i=0; $i<4; $i++) //to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                    {
                                        if ($random_list['prod_id'] == $count) 
                                            echo '<span class="product-label label-circle label-new">New</span>';

                                        $count--;
                                    }
                                        
                                    echo'
                                                <a href="product.php">
                                                    <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    ';
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <?php
                        $sql = "SELECT * FROM product 
                                INNER JOIN category ON product.cat_id = category.cat_id 
                                WHERE prod_status = 1";
                        $sql .= " GROUP BY category.cat_id";
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
                                        $extra = "SELECT * FROM product 
                                                    INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                    INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                                    WHERE prod_status = 1";
                                        $extra .= " AND prod_color_stock > '0' AND product.cat_id = ' ";
                                        $extra .= ($list_category_data['cat_id']);
                                        $extra .= "' GROUP BY product.prod_id";
                                        $extra .= " LIMIT 6";
                                        $query = mysqli_query($connect, $extra);

                                        $sql = mysqli_query($connect, "SELECT * FROM product");
                                        
                                        while ($random_list = mysqli_fetch_assoc($query)) {
                                            $count = mysqli_num_rows($sql);

                                            //getting the product category name
                                            $cat_id = $random_list['cat_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                            $cat_data = mysqli_fetch_assoc($data);
                                            $categoty_name = $cat_data['cat_name'];

                                            //getting the product brand name
                                            $brand_id = $random_list['brand_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                            $brand_data = mysqli_fetch_assoc($data);
                                            $brand_name = $brand_data['brand_name'];
                                            
                                            //price range
                                            $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product 
                                                            INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                            INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                                            WHERE prod_status = 1";
                                            $price_range .= " AND product.prod_id = ' ";
                                            $price_range .= ($random_list['prod_id']);
                                            $price_range .= "'";
                                            $query3 = mysqli_query($connect, $price_range); 
                                            $max_min_price = mysqli_fetch_assoc($query3);

                                            echo '
                                                <div class="product product-2">
                                                    <figure class="product-media">
                                            ';
                                                
                                            for($i=0; $i<4; $i++) //to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                            {
                                                if ($random_list['prod_id'] == $count) 
                                                    echo '<span class="product-label label-circle label-new">New</span>';

                                                $count--;
                                            }
                                                
                                            echo'
                                                        <a href="product.php">
                                                            <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                        </a>
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <div class="product-cat">
                                                            <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                        </div><!-- End .product-price -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            ';
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
                                $extra .= " AND prod_color_stock > '0'";
                                $extra .= " GROUP BY product.prod_id";
                                $extra .= " ORDER BY RAND()";
                                $extra .= " LIMIT 6  ";
                                $query = mysqli_query($connect, $extra);

                                $sql = mysqli_query($connect, "SELECT * FROM product");
                                
                                while ($random_list = mysqli_fetch_assoc($query)) {
                                    $count = mysqli_num_rows($sql);

                                    //getting the product category name
                                    $cat_id = $random_list['cat_id'];
                                    $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                    $cat_data = mysqli_fetch_assoc($data);
                                    $categoty_name = $cat_data['cat_name'];

                                    //getting the product brand name
                                    $brand_id = $random_list['brand_id'];
                                    $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                    $brand_data = mysqli_fetch_assoc($data);
                                    $brand_name = $brand_data['brand_name'];
                                    
                                    //price range
                                    $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product 
                                                    INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                    INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                    WHERE prod_status = 1 AND brand.brand_status = 1";
                                    $price_range .= " AND product.prod_id = ' ";
                                    $price_range .= ($random_list['prod_id']);
                                    $price_range .= "'";
                                    $query3 = mysqli_query($connect, $price_range); 
                                    $max_min_price = mysqli_fetch_assoc($query3);

                                    echo '
                                        <div class="product product-2">
                                            <figure class="product-media">
                                    ';
                                        //TOP - <span class="product-label label-circle label-top">Top</span>
                                        //NEW - <span class="product-label label-circle label-new">New</span>
                                        //Sale - <span class="product-label label-circle label-sale">Sale</span>

                                    for($i=0; $i<4; $i++) //to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                    {
                                        if ($random_list['prod_id'] == $count) 
                                            echo '<span class="product-label label-circle label-new">New</span>';

                                        $count--;
                                    }
                                        
                                    echo'
                                                <a href="product.php">
                                                    <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    ';
                                }
                            ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <?php
                        $sql = "SELECT * FROM product JOIN category ON product.cat_id = category.cat_id WHERE prod_status = '1'  ";
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
                                        $extra .= " AND prod_color_stock > '0' AND product.cat_id = ' ";
                                        $extra .= ($list_category_data['cat_id']);
                                        $extra .= "' GROUP BY product.prod_id ";
                                        //$extra .= " ORDER BY RAND()";
                                        $extra .= " LIMIT 6  ";
                                        $query = mysqli_query($connect,$extra);

                                        $sql = mysqli_query($connect,"Select * FROM product");
                                        
                                        
                                        
                                        while($random_list = mysqli_fetch_assoc($query))
                                        {
                                            $count = mysqli_num_rows($sql);

                                            //getting the product category name
                                            $cat_id = $random_list['cat_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                            $cat_data = mysqli_fetch_assoc($data);
                                            $categoty_name = $cat_data['cat_name'];

                                            //getting the product brand name
                                            $brand_id = $random_list['brand_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                            $brand_data = mysqli_fetch_assoc($data);
                                            $brand_name = $brand_data['brand_name'];
                                            
                                            //price range
                                            $price_range = "SELECT MIN(prod_detail_price)AS 'min_price',MAX(prod_detail_price)AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                            $price_range .= " AND product.prod_id = ' ";
                                            $price_range .= ($random_list['prod_id']);
                                            $price_range .= "'";
                                            $query3 = mysqli_query($connect, $price_range); 
                                            $max_min_price = mysqli_fetch_assoc($query3);

                                            echo '
                                            <div class="product product-2">
                                                <figure class="product-media">
                                                ';
                                                
                                                for($i=0;$i<4;$i++)//to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                                {
                                                    if($random_list['prod_id'] == $count) 
                                                    echo '<span class="product-label label-circle label-new">New</span>';

                                                    $count--;
                                                }
                                                
                                            echo'
                                                    <a href="product.php">
                                                        <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                    </div><!-- End .product-price -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                            ';
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
                                $extra .= " AND prod_color_stock > '0'";
                                $extra .= " GROUP BY product.prod_id";
                                $extra .= " ORDER BY RAND()";
                                $extra .= " LIMIT 6";
                                $query = mysqli_query($connect, $extra);

                                $sql = mysqli_query($connect, "SELECT * FROM product");
                                
                                while ($random_list = mysqli_fetch_assoc($query)) {
                                    $count = mysqli_num_rows($sql);

                                    //getting the product category name
                                    $cat_id = $random_list['cat_id'];
                                    $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                    $cat_data = mysqli_fetch_assoc($data);
                                    $categoty_name = $cat_data['cat_name'];

                                    //getting the product brand name
                                    $brand_id = $random_list['brand_id'];
                                    $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                    $brand_data = mysqli_fetch_assoc($data);
                                    $brand_name = $brand_data['brand_name'];
                                    
                                    //price range
                                    $price_range = "SELECT MIN(prod_detail_price) AS 'min_price', MAX(prod_detail_price) AS 'max_price' FROM product 
                                                    INNER JOIN product_detail ON product.prod_id = product_detail.prod_id 
                                                    INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id 
                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                    WHERE prod_status = 1 AND brand.brand_status = 1";
                                    $price_range .= " AND product.prod_id = ' ";
                                    $price_range .= ($random_list['prod_id']);
                                    $price_range .= "'";
                                    $query3 = mysqli_query($connect, $price_range); 
                                    $max_min_price = mysqli_fetch_assoc($query3);

                                    echo '
                                        <div class="product product-2">
                                            <figure class="product-media">
                                    ';
                                    //TOP - <span class="product-label label-circle label-top">Top</span>
                                    //NEW - <span class="product-label label-circle label-new">New</span>
                                    //Sale - <span class="product-label label-circle label-sale">Sale</span>

                                    for ($i=0; $i<4; $i++) //to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                    {
                                        if ($random_list['prod_id'] == $count)
                                            echo '<span class="product-label label-circle label-new">New</span>';

                                        $count--;
                                    }
                                        
                                    echo '
                                                <a href="product.php">
                                                    <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    ';
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
                                        $extra .= " AND prod_color_stock > '0' AND product.brand_id = ' ";
                                        $extra .= ($list_brand_data['brand_id']);
                                        $extra .= "' GROUP BY product.prod_id ";
                                        //$extra .= " ORDER BY RAND()";
                                        $extra .= " LIMIT 6  ";
                                        $query = mysqli_query($connect,$extra);

                                        $sql = mysqli_query($connect,"Select * FROM product");
                                        
                                        
                                        
                                        while($random_list = mysqli_fetch_assoc($query))
                                        {
                                            $count = mysqli_num_rows($sql);

                                            //getting the product category name
                                            $cat_id = $random_list['cat_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = '$cat_id'");
                                            $cat_data = mysqli_fetch_assoc($data);
                                            $categoty_name = $cat_data['cat_name'];

                                            //getting the product brand name
                                            $brand_id = $random_list['brand_id'];
                                            $data = mysqli_query($connect,"SELECT * FROM brand WHERE brand_id = '$brand_id'");
                                            $brand_data = mysqli_fetch_assoc($data);
                                            $brand_name = $brand_data['brand_name'];
                                            
                                            //price range
                                            $price_range = "SELECT MIN(prod_detail_price)AS 'min_price',MAX(prod_detail_price)AS 'max_price' FROM product INNER JOIN product_detail ON product.prod_id = product_detail.prod_id JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";
                                            $price_range .= " AND product.prod_id = ' ";
                                            $price_range .= ($random_list['prod_id']);
                                            $price_range .= "'";
                                            $query3 = mysqli_query($connect, $price_range); 
                                            $max_min_price = mysqli_fetch_assoc($query3);

                                            echo '
                                            <div class="product product-2">
                                                <figure class="product-media">
                                                ';
                                                
                                                for($i=0;$i<4;$i++)//to show the new label - i set it as the last 4 product is the new product ~ can change if needed ~
                                                {
                                                    if($random_list['prod_id'] == $count) 
                                                    echo '<span class="product-label label-circle label-new">New</span>';

                                                    $count--;
                                                }
                                                
                                            echo'
                                                    <a href="product.php">
                                                        <img src="../Product/'.$random_list['prod_color_img'].'" alt="Product image" class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <span class="font-gray-400" >'.$brand_name.' &#183; '.$categoty_name.'</span>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a href="product.php?prod_name='.$random_list['prod_id'].'">'.$random_list['prod_name']."".'</a></h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        RM '.$max_min_price['min_price'].' - RM '.$max_min_price['max_price'].'
                                                    </div><!-- End .product-price -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                            ';
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