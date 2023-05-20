
<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ;?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ;?>

        <main class="main" id="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Smartphone & Accessories<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Smartphone & Accessories</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
        			<div class="toolbox">
        				<div class="toolbox-left">
                            <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
        				</div><!-- End .toolbox-left -->
                    </div>

                    <span id="show-product-list"></span>

                    <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                    <aside class="sidebar-shop sidebar-filter">
                        <div class="sidebar-filter-wrapper">
                            <div class="widget widget-clean">
                                <label class="close-sidebar"><i class="icon-close"></i>Filters</label>
                                <a href="#" class="sidebar-filter-clear" onclick="show_product('', 1)">Clean All</a>
                            </div><!-- End .widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            <?php
                                                $i = 0;
                                                $data = mysqli_query($connect,"SELECT * FROM category");

                                                while($ctv = mysqli_fetch_assoc($data))
                                                {
                                                    $category_id = $ctv['cat_id'];
                                                    $sql = "SELECT * FROM product join product_detail ON product.prod_id = product_detail.prod_id join product_color ON product_detail.prod_detail_id = product_color.prod_detail_id WHERE prod_status = '1'";                                              
                                                    $sql .= " AND cat_id = '$category_id'";
                                                    
                                                    $numdata = mysqli_query($connect,$sql); 
                                                    echo '
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input category" id="cat-'.$i.'" name="category" value="'.$ctv['cat_id'].'">
                                                                <label class="custom-control-label" for="cat-'.$i.'">'.$ctv['cat_name'].'</label>
                                                            </div><!-- End .custom-checkbox -->
                                                            <span class="item-count">'.mysqli_num_rows($numdata).'</span> 
                                                        </div><!-- End .filter-item -->
                                                    ';
                                                    $i++;
                                                }
                                            ?>
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items ">
                                            <?php
                                                $i=0;
                                                $data = mysqli_query($connect,"SELECT * FROM brand ");
                                                while($bv = mysqli_fetch_assoc($data))
                                                {
                                                echo'
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input brand" id="brand-'.$i.'" name="brand" value="'.$bv['brand_id'].'">
                                                                <label class="custom-control-label" for="brand-'.$i.'">'.$bv['brand_name'].'</label>
                                                            </div><!-- End .custom-checkbox -->
                                                        </div><!-- End .filter-item -->
                                                    ';
                                                    $i++;
                                                }
                                            ?>
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                <?php
                                                    $max_price = 0;
                                                    $data = mysqli_query($connect,"SELECT * FROM product_detail");
                                                    while($pd = mysqli_fetch_assoc($data))
                                                    {
                                                        if($max_price < $pd['prod_detail_price'])
                                                            $max_price = $pd['prod_detail_price'];
                                                    }

                                                    echo '<input type="text" value="'.$max_price.'" id="max-price" hidden>'
                                                ?>

                                                Price Range:
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-filter-wrapper -->
                    </aside><!-- End .sidebar-filter -->
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
    <script src="assets/js/wNumb.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>   
    <script src="assets/js/jquery.magnific-popup.min.js"></script>   
    <script src="assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        show_product("",1);  
    </script>
</body>

</html>