
<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="category.php">Brands</a>
                            <ul>
                                <li><a href="category-list.php">Shop List</a></li>
                                <li><a href="category-2cols.php">Shop Grid 2 Columns</a></li>
                                <li><a href="category.php">Shop Grid 3 Columns</a></li>
                                <li><a href="category-4cols.php">Shop Grid 4 Columns</a></li>
                                <li><a href="category-boxed.php"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                <li><a href="category-fullwidth.php">Shop Fullwidth No Sidebar</a></li>
                                <li><a href="product-category-boxed.php">Product Category Boxed</a></li>
                                <li><a href="product-category-fullwidth.php"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
                                <li><a href="#">Lookbook</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                        <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                        <li><a href="#">Beds</a></li>
                        <li><a href="#">Lighting</a></li>
                        <li><a href="#">Sofas & Sleeper sofas</a></li>
                        <li><a href="#">Storage</a></li>
                        <li><a href="#">Armchairs & Chaises</a></li>
                        <li><a href="#">Decoration </a></li>
                        <li><a href="#">Kitchen Cabinets</a></li>
                        <li><a href="#">Coffee & Tables</a></li>
                        <li><a href="#">Outdoor Furniture </a></li>
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->