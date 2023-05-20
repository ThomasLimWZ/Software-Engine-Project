<header class="header header-intro-clearance header-3">
    <div class="header-top" style="background-color: #F7E381;padding-top:1%;">
        <div class="container" >
            <div class="header-right" >
                <ul class="top-menu" >
                    <?php 
                    if(isset($_SESSION["customer_id"])){
                        $cus_id = $_SESSION["customer_id"];
                        $result = mysqli_query($connect,"SELECT * FROM customer WHERE cus_id = '$cus_id'");
                        $row = mysqli_fetch_assoc($result);

                        echo '<a class="h5" href="my-account.php">'.$row["cus_name"].'</a>';
                        }
                    else
                    {                   
                        echo'<a class="h5" href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>';
                    }
                    
                    ?>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle" style="background-color:#E3C327;">
        <div class="container" >
            <div class="header-left">
                <button class="mobile-menu-toggler" >
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="index.php" class="logo" >
                    <img src="assets/images/4-peoples-telco-high-resolution-logo-white-on-transparent-background.png" alt="4 People Telco Logo" width="11%" height="">
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
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo '<li><a href="category/php?brand_id='.$row['brand_id'].'">'.$row['brand_name'].'</a></li>';
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
                                                <div class="col-md-4">
                                                    <div class="menu-title">Brand</div><!-- End .menu-title -->
                                                    <ul>
                                                    <?php
                                                        $query = "SELECT * FROM brand WHERE brand_status='1'";
                                                        $result = mysqli_query($connect, $query);
                                                        while($row = mysqli_fetch_assoc($result))
                                                        {
                                                            echo '<li><a href="category/php?brand_id='.$row['brand_id'].'">'.$row['brand_name'].'</a></li>';
                                                        }
                                                    ?>                                                       
                                                    </ul>                                                   
                                                </div><!-- End .col-md-4 -->

                                                <div class="col-md-4">
                                                    
                                                    <div class="menu-title">Categories</div><!-- End .menu-title -->
                                                    <ul>
                                                    <?php
                                                            $query = "SELECT * FROM category ";
                                                            $result = mysqli_query($connect, $query);
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {
                                                                echo '<li><a href="category/php?cat_id='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </div><!-- End .col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="cart.php">Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                        <li><a href="my-account.php">My Account</a></li>
                                                        <?php 
                                                        if(isset($_SESSION["customer_id"])){
                                                        echo '<li><a href="signout.php">Log out</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                    
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
                <i class="la la-lightbulb-o"></i><p><span class="highlight">&nbsp;Free Shipping</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->