<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.php">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <?php
                $product_id = $_GET["productId"];
            ?>
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="product-details-top">
                                <?php
                                    $getProductResult = mysqli_query($connect, "SELECT * FROM product INNER JOIN brand ON product.brand_id = brand.brand_id INNER JOIN category ON product.cat_id = category.cat_id WHERE prod_id = '$product_id'");
                                    $prodRow = mysqli_fetch_assoc($getProductResult);
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery">
                                            <figure class="product-main-image">
                                                <?php
                                                    $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$prodRow['prod_id']."'");
                                                    $detailRow = mysqli_fetch_assoc($prodDetailRes);
                                                    $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                    $i = 0;
                                                    while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                        if ($i == 0) {
                                                            echo '
                                                                <img id="product-zoom" src="../product/'.$detailColorRow['prod_color_img'].'" 
                                                                    data-zoom-image="../product/'.$detailColorRow['prod_color_img'].'" alt="product image">
                                                            ';
                                                        }
                                                        $i++;
                                                    }
                                                ?>
                                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->

                                            <div id="product-zoom-gallery" class="product-image-gallery">
                                                <?php
                                                    $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$prodRow['prod_id']."'");
                                                    $detailRow = mysqli_fetch_assoc($prodDetailRes);
                                                    $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                    $i = 0;
                                                    while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                ?>
                                                        <a class="product-gallery-item<?php echo $i == 0 ? ' active' : ''; ?>" href="#" 
                                                            data-image="../product/<?php echo $detailColorRow['prod_color_img']; ?>"
                                                            data-zoom-image="../product/<?php echo $detailColorRow['prod_color_img']; ?>">
                                                            <img src="../product/<?php echo $detailColorRow['prod_color_img']; ?>" alt="product side">
                                                        </a>
                                                <?php
                                                        $i++;
                                                    }
                                                ?>
                                            </div><!-- End .product-image-gallery -->
                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="product-details product-details-sidebar">
                                            <h1 class="product-title"><?php echo $prodRow["prod_name"]; ?></h1>
                                            <!-- End .product-title -->
                                            <?php
                                                $price = array();
												$sumStock = array();

                                                $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$prodRow['prod_id']."'");
                                                while ($detailRow = mysqli_fetch_assoc($prodDetailRes)) {
                                                    array_push($price, $detailRow['prod_detail_price']);

                                                    $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                    while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                        array_push($sumStock, $detailColorRow['prod_color_stock']);
                                                    }
                                                }
                                            ?>
                                            <div class="product-price">
                                                <?php 
                                                    if (count($price) > 1)
                                                        echo "RM ".min($price)." - RM ".max($price);
                                                    else if (count($price) == 1)
                                                        echo "RM ".$price[0];
                                                    else 
                                                        echo "-"; 
                                                ?>
                                            </div><!-- End .product-price -->

                                            <div class="details-filter-row details-row-size">
                                                <label class="mr-5" for="capacity">Capacity:</label>
                                                <div class="select-custom w-50">
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="#" selected disabled>Select Capacity</option>
                                                        <?php
                                                            $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$prodRow['prod_id']."'");
                                                            while ($detailRow = mysqli_fetch_assoc($prodDetailRes)) {
                                                                echo "<option value='".$detailRow['prod_detail_id']."'>".$detailRow['prod_detail_name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .details-filter-row -->

                                            <div class="details-filter-row details-row-size">
                                                <label class="mr-5" for="color">Color:</label>
                                                <div class="select-custom w-50">
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="#" selected disabled>Select Color</option>
                                                        <?php
                                                            $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$prodRow['prod_id']."'");
                                                            $detailRow = mysqli_fetch_assoc($prodDetailRes);
                                                            $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                            while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                                echo "<option>".$detailColorRow['prod_color_name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .details-filter-row -->

                                            <div class="product-details-action">
                                                <div class="details-action-col">
                                                    <label class="mr-5" for="qty">Qty:</label>
                                                    <div class="product-details-quantity">
                                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                    </div><!-- End .product-details-quantity -->
                                                </div><!-- End .details-action-col -->

                                                <a href="#" class="btn-product btn-cart"><span id="addToCartText">Add to Cart</span></a>
                                                <style>
                                                    #addToCartText:hover {
                                                        color: white;
                                                    }
                                                </style>
                                            </div><!-- End .product-details-action -->

                                            <div class="product-details-footer details-footer-col">
                                                <div class="product-cat">
                                                    <span>Brand:</span>
                                                    <a href="category.php?brandId=<?php echo $prodRow['brand_id']; ?>"><?php echo $prodRow['brand_name']; ?></a>
                                                    <br><br>
                                                    <span>Category:</span>
                                                    <a href="category.php?catId=<?php echo $prodRow['cat_id']; ?>"><?php echo $prodRow['cat_name']; ?></a>
                                                </div><!-- End .product-cat -->
                                            </div><!-- End .product-details-footer -->
                                        </div><!-- End .product-details -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .product-details-top -->

                            <div class="product-details-tab">
                                <ul class="nav nav-pills justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Specification</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                        <div class="product-desc-content">
                                            <h3>Product Information</h3>
                                            <p><?php echo empty($prodRow['prod_descrip']) ? "No Description Yet..." : $prodRow['prod_descrip']; ?></p>
                                            </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                        <div class="product-desc-content">
                                            <?php
                                                $getProdSpec = mysqli_query($connect, "SELECT * FROM product_specification WHERE prod_id = '".$prodRow['prod_id']."'");
                                                $prodSpecRow = mysqli_fetch_assoc($getProdSpec);
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_display'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Display</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_display']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_chipset'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Chipset</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_display']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_back_cam'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Back Camera</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_back_cam']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_front_cam'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Front Camera</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_front_cam']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_battery'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Power & Battery</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_battery']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>

                                            <?php
                                                if (!empty($prodSpecRow['prod_spec_others'])) {
                                            ?>
                                                    <div class="mb-3">
                                                        <h3>Others</h3>
                                                        <p><?php echo $prodSpecRow['prod_spec_others']; ?></p>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-details-tab -->
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="sidebar sidebar-product">
                                <div class="widget widget-products">
                                    <h4 class="widget-title">Related Products</h4><!-- End .widget-title -->

                                    <div class="products">
                                        <?php
                                            $randomProdQuery = "SELECT * FROM product 
                                                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id
                                                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id
                                                                WHERE brand_id='".$prodRow['brand_id']."' AND cat_id='".$prodRow['cat_id']."' 
                                                                ORDER BY RAND() LIMIT 4";
                                            $getRandomProduct = mysqli_query($connect, $randomProdQuery);
                                            while ($randomProdRow = mysqli_fetch_assoc($getRandomProduct)) {
                                        ?>
                                            <div class="product product-sm">
                                                <figure class="product-media">
                                                    <a href="product.php?prodId=<?php echo $randomProdRow['prod_id']; ?>">
                                                        <img src="../Product/<?php echo $randomProdRow['prod_color_img']; ?>" alt="Product image" class="product-image">
                                                    </a>
                                                </figure>

                                                <div class="product-body">
                                                    <h5 class="product-title"><a href="product.php?prodId=<?php echo $randomProdRow['prod_id']; ?>"><?php echo $randomProdRow['prod_name']; ?></a></h5><!-- End .product-title -->
                                                    <div class="product-price" style="font-size: 14px;">
                                                        <?php
                                                            $price = array();
                                                            $sumStock = array();

                                                            $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$randomProdRow['prod_id']."'");
                                                            while ($detailRow = mysqli_fetch_assoc($prodDetailRes)) {
                                                                array_push($price, $detailRow['prod_detail_price']);

                                                                $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                                while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                                    array_push($sumStock, $detailColorRow['prod_color_stock']);
                                                                }
                                                            }
                                                            if (count($price) > 1)
                                                                echo "RM ".min($price)." - RM ".max($price);
                                                            else if (count($price) == 1)
                                                                echo "RM ".$price[0];
                                                            else 
                                                                echo "-"; 
                                                        ?>
                                                    </div><!-- End .product-price -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product product-sm -->
                                        <?php 
                                            } 
                                        ?>
                                    </div><!-- End .products -->

                                    <a href="category.php" class="btn btn-outline-dark-3"><span>View More Products</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .widget widget-products -->

                                
                            </div><!-- End .sidebar sidebar-product -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .page-content -->
            <hr class="mb-2">
        </main><!-- End .main -->

        <?php include('footer.php') ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <?php include('mobile-menu-container.php') ?>

    <!-- Sign in / Register Modal -->
    <?php include('signin-register-modal.php') ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>