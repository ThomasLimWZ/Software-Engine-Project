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
                            <?php
                                $query = "SELECT * FROM brand WHERE brand_status = 1";
                                $result = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li><a href="category.php?brandId='.$row['brand_id'].'">'.$row['brand_name'].'</a></li>';
                                }
                            ?>  
                            </ul>
                        </li>
                                             
                        <?php 
                            if (isset($_SESSION["customer_id"])) {
                        ?>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="signout.php">Log out</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                    <?php
                        $query = "SELECT * FROM category ";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li><a href="category.php?catId='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
                        }
                    ?>
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->