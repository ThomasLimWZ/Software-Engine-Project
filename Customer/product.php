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
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                    </ol>

                    
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="product-details-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery">
                                            <figure class="product-main-image">
                                                <img id="product-zoom" src="assets/images/products/single/sidebar-gallery/1.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/1-big.jpg" alt="product image">

                                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->

                                            <div id="product-zoom-gallery" class="product-image-gallery">
                                                <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/sidebar-gallery/1.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/1-big.jpg">
                                                    <img src="assets/images/products/single/sidebar-gallery/1-small.jpg" alt="product side">
                                                </a>

                                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/2.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/2-big.jpg">
                                                    <img src="assets/images/products/single/sidebar-gallery/2-small.jpg" alt="product cross">
                                                </a>

                                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/3.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/3-big.jpg">
                                                    <img src="assets/images/products/single/sidebar-gallery/3-small.jpg" alt="product with model">
                                                </a>

                                                <a class="product-gallery-item" href="#" data-image="assets/images/products/single/sidebar-gallery/4.jpg" data-zoom-image="assets/images/products/single/sidebar-gallery/4-big.jpg">
                                                    <img src="assets/images/products/single/sidebar-gallery/4-small.jpg" alt="product back">
                                                </a>
                                            </div><!-- End .product-image-gallery -->
                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="product-details product-details-sidebar">
                                            <h1 class="product-title">iPhone 14 Pro Max</h1><!-- End .product-title -->


                                            <div class="product-price">
                                                RM 5,499.00
                                            </div><!-- End .product-price -->

                                            <div class="details-filter-row details-row-size">
                                                <label for="capacity">Capacity:</label>
                                                <div class="select-custom">
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="#" selected="selected">Please select</option>
                                                        <option value="1">128GB</option>
                                                        <option value="2">256GB</option>
                                                        <option value="3">512GB</option>
                                                        <option value="4">1TB</option>
                                                    </select>
                                                </div><!-- End .select-custom -->

                                            </div><!-- End .details-filter-row -->

                                            <div class="product-details-action">
                                                <div class="details-action-col">
                                                    <label for="qty">Qty:</label>
                                                    <div class="product-details-quantity">
                                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                    </div><!-- End .product-details-quantity -->

                                                    
                                                </div><!-- End .details-action-col -->

                                                <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a> <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                                </div><!-- End .details-action-wrapper -->
                                            </div><!-- End .product-details-action -->

                                            

                                            <div class="product-details-footer details-footer-col">
                                                <div class="product-cat">
                                                    <span>Category:</span>
                                                    <a href="#">Phone</a>,
                                                    <a href="#">iPhone</a>,
                                                    <a href="#">Black</a>
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
                                            <p>iPhone 14 Pro Max. Capture incredible detail with a 48MP Main camera. Experience iPhone in a whole new way with Dynamic Island and Always-On display. Crash Detection,<sup>1</sup> a new safety feature, calls for help when you can’t.</p>
                                            </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                        <div class="product-desc-content">
                                            <h3>Specfication</h3>
                                            <ul>
                                                <li>6.7-inch Super Retina XDR display<sup>2</sup> featuring Always-On and ProMotion</li>
                                                <li>Dynamic Island, a magical new way to interact with iPhone</li>
                                                <li>48MP Main camera for up to 4x greater resolution</li>
                                                <li>Cinematic mode now in 4K Dolby Vision up to 30 fps</li>
                                                <li>Action mode for smooth, steady, handheld videos</li>
                                                <li>Vital safety technology — Crash Detection1 calls for help when you can’t</li>
                                                <li>All-day battery life and up to 29 hours of video playback<sup>3</sup></li>
                                                <li>A16 Bionic, the ultimate smartphone chip</li>
                                                <li>Industry-leading durability features with Ceramic Shield and water resistance<sup>4</sup></li>
                                                <li>iOS 16 offers even more ways to personalise, communicate and share<sup>5</sup></li>
                                            </ul>

                                            <h3>Legal</h3>
                                            <ol type="1">
                                                <li>1 Emergency SOS uses a mobile network connection or Wi-Fi calling.</li>
                                                <li>2 The display has rounded corners. When measured as a rectangle, the screen is 6.69 inches diagonally. Actual viewable area is less.</li>
                                                <li>3 Battery life varies by use and configuration; see apple.com/my/batteries for more information.</li>
                                                <li>4 iPhone 14 Pro Max is splash, water and dust resistant, and was tested under controlled laboratory conditions with a rating of IP68 under IEC standard 60529 (maximum depth of 6 metres for up to 30 minutes). Splash, water and dust resistance are not permanent conditions. Resistance might decrease as a result of normal wear. Do not attempt to charge a wet iPhone; refer to the user guide for cleaning and drying instructions. Liquid damage is not covered under warranty.</li>
                                                <li>5 Some features may not be available for all countries or all areas.</li>
                                            </ol>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    
                                    
                                    
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-details-tab -->

                            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":1
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
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.php">
                                            <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="popup/quickView.php" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Tablet</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php">iPad Pro 12.9-inch (M1, 2021)</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM 3,899.00
                                        </div><!-- End .product-price -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.php">
                                            <img src="assets/images/products/product-6.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="popup/quickView.php" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Watch</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php">Samsung Galaxy Watch5 Pro Bluetooth</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM 1,599.00
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.php">
                                            <img src="assets/images/products/product-11.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="popup/quickView.php" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Audio</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php">AirPods (3rd generation) with Magsafe Charging Case</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM 879.00
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.php">
                                            <img src="assets/images/products/product-10.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="popup/quickView.php" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Accessory</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.php">Apple MagSafe Duo Charger</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            RM 589.00
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="sidebar sidebar-product">
                                <div class="widget widget-products">
                                    <h4 class="widget-title">Related Product</h4><!-- End .widget-title -->

                                    <div class="products">
                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="product.php">
                                                    <img src="assets/images/products/single/sidebar/1.jpg" alt="Product image" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="product.php">iPhone 13</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM 3,199.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->

                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="product.php">
                                                    <img src="assets/images/products/single/sidebar/2.jpg" alt="Product image" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="product.php">iPhone 14 Plus</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM 4,199.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->

                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="product.php">
                                                    <img src="assets/images/products/single/sidebar/3.jpg" alt="Product image" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="product.php">iPhone 14 Pro</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM 4,999.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->

                                        <div class="product product-sm">
                                            <figure class="product-media">
                                                <a href="product.php">
                                                    <img src="assets/images/products/single/sidebar/4.jpg" alt="Product image" class="product-image">
                                                </a>
                                            </figure>

                                            <div class="product-body">
                                                <h5 class="product-title"><a href="product.php">iPhone 14</a></h5><!-- End .product-title -->
                                                <div class="product-price">
                                                    RM 3,699.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product product-sm -->
                                    </div><!-- End .products -->

                                    <a href="category.php" class="btn btn-outline-dark-3"><span>View More Products</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .widget widget-products -->

                                
                            </div><!-- End .sidebar sidebar-product -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .page-content -->
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