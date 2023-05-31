<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-right">
                <ul class="top-menu">
                    <?php 
                    if (isset($_SESSION["customer_id"])) {
                        $cus_id = $_SESSION["customer_id"];
                        $result = mysqli_query($connect,"SELECT * FROM customer WHERE cus_id = '$cus_id'");
                        $row = mysqli_fetch_assoc($result);
                    ?>
                            <a class="h5 text-white" href="#" data-toggle="dropdown"><img src="assets/images/profile.png" width="35px" height="35px">&nbsp;<?php echo $row["cus_name"]; ?></a>
                            <div class="dropdown-menu h6 mt-1" style="width: 12%;">
                                <a class="dropdown-item p-2" href="my-account.php">My Account</a>
                                <a class="dropdown-item p-2 text-danger" href="#" onclick="logoutConfirm();">Log Out</a>
                            </div>
                            <script>
                                function logoutConfirm(){
                                    var option;
                                    Swal.fire({
                                        title: 'Are you sure to log out?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, log out now!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href="signout.php";
                                        }
                                    });
                                }	
                            </script>
                    <?php
                    } else {                   
                        echo'<a class="h5" href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>';
                    }
                    ?>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="index.php" class="logo">
                    <img src="assets/images/Logo/Color logo - no background.png" alt="4 People Telco Logo" width="90" height="20">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>Compare</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.php">Blue Night Dress</a></h4>
                            </li>
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.php">White Long Skirt</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->
                <?php
                if (isset($_SESSION['customer_id'])) {
                ?>
                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">2</span>
                            </div>
                            <p>Cart</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.php">Beige knitted elastic runner shoes</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $84.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.php" class="product-image">
                                            <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->

                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.php">Blue utility pinafore denim dress</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $76.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.php" class="product-image">
                                            <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">$160.00</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.php" class="btn btn-primary">View Cart</a>
                                <a href="checkout.php" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                <?php
                }
                ?>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Browse Brands <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <?php
                                    $query = "SELECT * FROM brand WHERE brand_status='1'";
                                    $result = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '<li><a href="category.php?brand_id='.$row['brand_id'].'">'.$row['brand_name'].'</a></li>';
                                    }
                                ?>
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="category.php" class="sf-with-ul">Categories</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                <?php
                                                    $cat = array();
                                                    $catResult = mysqli_query($connect, "SELECT * FROM category");

                                                    while ($catRow = mysqli_fetch_assoc($catResult)){
                                                        array_push($cat, $catRow['cat_id']);
                                                    }
                                                    
                                                    $phoneQuery = "SELECT DISTINCT product.cat_id, product.brand_id, brand.brand_name FROM product 
                                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                    WHERE product.cat_id = ".$cat[0]." AND brand.brand_status = 1 AND product.prod_status = 1";
                                                    $phone = mysqli_query($connect, $phoneQuery);
                                                    $phoneCount = mysqli_num_rows($phone);

                                                    $tabletQuery = "SELECT DISTINCT product.cat_id, product.brand_id, brand.brand_name FROM product 
                                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                    WHERE product.cat_id = ".$cat[1]." AND brand.brand_status = 1 AND product.prod_status = 1";
                                                    $tablet = mysqli_query($connect, $tabletQuery);
                                                    $tabletCount = mysqli_num_rows($tablet);

                                                    $audioQuery = "SELECT DISTINCT product.cat_id, product.brand_id, brand.brand_name FROM product 
                                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                    WHERE product.cat_id = ".$cat[2]." AND brand.brand_status = 1 AND product.prod_status = 1";
                                                    $audio = mysqli_query($connect, $audioQuery);
                                                    $audiotCount = mysqli_num_rows($audio);

                                                    $watchQuery = "SELECT DISTINCT product.cat_id, product.brand_id, brand.brand_name FROM product 
                                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                    WHERE product.cat_id = ".$cat[3]." AND brand.brand_status = 1 AND product.prod_status = 1";
                                                    $watch = mysqli_query($connect, $watchQuery);
                                                    $watchtCount = mysqli_num_rows($watch);

                                                    $accessoriesQuery = "SELECT DISTINCT product.cat_id, product.brand_id, brand.brand_name FROM product 
                                                                    INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                    WHERE product.cat_id = ".$cat[4]." AND brand.brand_status = 1 AND product.prod_status = 1";
                                                    $accessories = mysqli_query($connect, $accessoriesQuery);
                                                    $accessoriesCount = mysqli_num_rows($accessories);
                                                ?>
                                                <div class="col-md-4">
                                                    <?php
                                                        if ($phoneCount != 0) {
                                                        ?>
                                                            <div class="menu-title"><a href="category.php?cat_id=<?php echo $cat[0]; ?>">Phone</a></div><!-- End .menu-title -->
                                                            <ul>
                                                                <?php
                                                                while ($phoneRow = mysqli_fetch_assoc($phone)) {
                                                                    echo "
                                                                        <li><a href='category.php?cat_id=".$phoneRow['cat_id']."&brand_id=".$phoneRow['brand_id']."'>".$phoneRow['brand_name']."</a></li>
                                                                    ";
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php
                                                        }

                                                        if ($tabletCount != 0) {
                                                        ?>
                                                            <div class="menu-title"><a href="category.php?catId=<?php echo $cat[1]; ?>">Tablet</a></div><!-- End .menu-title -->
                                                            <ul>
                                                                <?php
                                                                while ($tabletRow = mysqli_fetch_assoc($tablet)) {
                                                                    echo "
                                                                        <li><a href='category.php?cat_id=".$tabletRow['cat_id']."&brand_id=".$tabletRow['brand_id']."'>".$tabletRow['brand_name']."</a></li>
                                                                    ";
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php
                                                        }
                                                    ?>
                                                </div><!-- End .col-md-4 -->
                                                <div class="col-md-4">
                                                    <?php
                                                        if ($audiotCount != 0) {
                                                        ?>
                                                            <div class="menu-title"><a href="category.php?cat_id=<?php echo $cat[2]; ?>">Audio</a></div><!-- End .menu-title -->
                                                            <ul>
                                                                <?php
                                                                while ($audioRow = mysqli_fetch_assoc($audio)) {
                                                                    echo "
                                                                        <li><a href='category.php?cat_id=".$audioRow['cat_id']."&brand_id=".$audioRow['brand_id']."'>".$audioRow['brand_name']."</a></li>
                                                                    ";
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php
                                                        }

                                                        if ($watchtCount != 0) {
                                                        ?>
                                                            <div class="menu-title"><a href="category.php?cat_id=<?php echo $cat[3]; ?>">Watch</a></div><!-- End .menu-title -->
                                                            <ul>
                                                                <?php
                                                                while ($watchRow = mysqli_fetch_assoc($watch)) {
                                                                    echo "
                                                                        <li><a href='category.php?cat_id=".$watchRow['cat_id']."&brand_id=".$watchRow['brand_id']."'>".$watchRow['brand_name']."</a></li>
                                                                    ";
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php
                                                        }
                                                    ?>
                                                </div><!-- End .col-md-4 -->
                                                <div class="col-md-4">
                                                    <?php
                                                        if ($accessoriesCount != 0) {
                                                        ?>
                                                            <div class="menu-title"><a href="category.php?cat_id=<?php echo $cat[4]; ?>">Accessories</a></div><!-- End .menu-title -->
                                                            <ul>
                                                                <?php
                                                                while ($accessoriesRow = mysqli_fetch_assoc($accessories)) {
                                                                    echo "
                                                                        <li><a href='category.php?cat_id=".$accessoriesRow['cat_id']."&brand_id=".$accessoriesRow['brand_id']."'>".$accessoriesRow['brand_name']."</a></li>
                                                                    ";  
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php
                                                        }
                                                    ?>
                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-12 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p><span class="highlight">Free Shipping</span> within Malaysia</p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->