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
                
                <a href="index.php" class="logo mx-auto">
                    <img src="assets/images/Logo/Color logo - no background.png" alt="4 People Telco Logo" style="height: 70px;">
                </a>
            </div><!-- End .header-left -->
            <style>
                .autocomplete-items {
                    position: absolute;
                    border: 1px solid #d4d4d4;
                    border-bottom: none;
                    border-top: none;
                    z-index: 100;
                    top: 110%;
                    left: 0;
                    right: 0;
                }
                .autocomplete-items div {
                    padding-left: 5px;
                    cursor: pointer;
                    background-color: #fff; 
                    border-bottom: 1px solid #d4d4d4; 
                }
                .autocomplete-items div:hover {
                    background-color: #e9e9e9; 
                }
                #findProd{
                    background-color: transparent; 
                }
                #findProd:hover{
                    cursor:pointer;
                }
            </style>
            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="searchProd" id="searchProd" placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script>
                var searchThings = document.getElementById("searchProd");
                var result;
                $(document).ready(function(){
                    $("#searchProd").keyup(function(){
                        $.ajax({
                            type: "POST",
                            url: "search-product-suggestion.php",
                            data:'keyword=' + $(this).val(),
                            success: function(data) {
                                function autocomplete(inp, arr, n) {
                                    var currentFocus;
                                    inp.addEventListener("input", function(e) {
                                        var a, b, i, val = this.value;
                                        closeAllLists();
                                        if (!val) { return false;}
                                        currentFocus = -1;
                                        a = document.createElement("DIV");
                                        a.setAttribute("id", this.id + "autocomplete-list");
                                        a.setAttribute("class", "autocomplete-items");
                                        this.parentNode.appendChild(a);
                                        var filter = val.toUpperCase();
                                        for (i = 0; i < n; i++) {
                                            if (arr[i].toUpperCase().indexOf(filter) > -1) {
                                                b = document.createElement("DIV");
                                                b.innerHTML += "<input class='form-control' id='findProd' type='text' value='" + arr[i] + "'>";
                                                b.addEventListener("click", function(e) {
                                                    inp.value = this.getElementsByTagName("input")[0].value;
                                                    var prodName = inp.value;
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'return-product.php',
                                                        data: {
                                                            prodName
                                                        },
                                                        success:(data) => {
                                                            window.location.href = 'product.php?productId=' + data;
                                                        }
                                                    })
                                                    closeAllLists();
                                                });
                                                a.appendChild(b);
                                            }
                                        }
                                    });

                                    function closeAllLists(elmnt) {
                                        var x = document.getElementsByClassName("autocomplete-items");
                                        for (var i = 0; i < x.length; i++) {
                                        if (elmnt != x[i] && elmnt != inp) {
                                            x[i].parentNode.removeChild(x[i]);
                                        }
                                        }
                                    }

                                    document.addEventListener("click", function (e) {
                                        closeAllLists(e.target);
                                    });
                                }
                                    
                                result = $.parseJSON(data);
                                var n =  Object.keys(result).length;
                                autocomplete(searchThings, result, n);
                            }
                        });
                    });
                });
            </script>

            <div class="header-right">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>Compare</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <form action="" method="GET" autocomplete="off">
                            <ul class="compare-products">
                                <li class="compare-product">
                                    <select class="form-control" id="compare_cat1" name="compare_cat1" onchange="compareCat()" required>
                                        <option selected disabled value="">Choose a Product</option>
                                        <?php
                                        $prod_res = mysqli_query($connect, "SELECT * FROM product 
                                                                            INNER JOIN brand ON product.brand_id = brand.brand_id 
                                                                            INNER JOIN category ON product.cat_id = category.cat_id 
                                                                            WHERE product.prod_status = 1 AND brand.brand_status = 1 
                                                                            ORDER BY brand.brand_name, category.cat_id ASC");
                                        while ($prod_row = mysqli_fetch_assoc($prod_res)) {
                                        ?>
                                            <option value="<?php echo $prod_row['prod_id']; ?>"><?php echo $prod_row['prod_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </li>
                                <li class="compare-product">
                                    <select class="form-control" id="compare_cat2" name="compare_cat2" onchange="compareCat()" required>
                                        <option selected disabled value="">Choose a Product</option>
                                        <?php
                                        $prod_res = mysqli_query($connect, "SELECT * FROM product 
                                                                            INNER JOIN brand ON product.brand_id = brand.brand_id 
                                                                            INNER JOIN category ON product.cat_id = category.cat_id 
                                                                            WHERE product.prod_status = 1 AND brand.brand_status = 1 
                                                                            ORDER BY brand.brand_name, category.cat_id ASC");
                                        while ($prod_row = mysqli_fetch_assoc($prod_res)) {
                                        ?>
                                            <option value="<?php echo $prod_row['prod_id']; ?>"><?php echo $prod_row['prod_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <span id="error_msg" class="text-danger"></span>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="#" class="action-link" onclick="clearSelection()">Clear All</a>
                                <button type="submit" id="comparebtn" name="comparebtn" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></button>
                            </div>
                            <script>
                                function compareCat() {
                                    var prod1 = document.getElementById("compare_cat1");
                                    var prod1_selected = prod1.options[prod1.selectedIndex].value;
                                    var prod2 = document.getElementById("compare_cat2");
                                    var prod2_selected = prod2.options[prod2.selectedIndex].value;

                                    if (prod1_selected == prod2_selected) {
                                        document.getElementById('comparebtn').disabled = true;
                                        document.getElementById("error_msg").innerHTML = "Cannot compare same product.";
                                        document.getElementById("compare_cat1").classList.add('is-invalid');
                                        document.getElementById("compare_cat2").classList.add('is-invalid');
                                    }
                                    else{
                                        $.ajax({
                                            type: 'GET',
                                            url: 'checkCompare.php',
                                            data: {
                                                prod1_selected,
                                                prod2_selected
                                            },
                                            success: (data) => {
                                                if(data == 1) {
                                                    document.getElementById('comparebtn').disabled = true;
                                                    document.getElementById("error_msg").innerHTML = "Cannot compare different category of products.";
                                                    document.getElementById("compare_cat1").classList.add('is-invalid');
                                                    document.getElementById("compare_cat2").classList.add('is-invalid');
                                                }
                                                else {
                                                    document.getElementById('comparebtn').disabled = false;
                                                    document.getElementById("error_msg").innerHTML = "";
                                                    document.getElementById("compare_cat1").classList.remove('is-invalid');
                                                    document.getElementById("compare_cat2").classList.remove('is-invalid');
                                                }
                                            }
                                        })
                                    }
                                }

                                function clearSelection() {
                                    document.getElementById('compare_cat1').value = '';
                                    document.getElementById('compare_cat2').value = '';
                                    document.getElementById('comparebtn').disabled = false;
                                    document.getElementById("error_msg").innerHTML = "";
                                    document.getElementById("compare_cat1").classList.remove('is-invalid');
                                    document.getElementById("compare_cat2").classList.remove('is-invalid');
                                }
                            </script>
                        </form>
                        <?php
                            if (isset($_GET['comparebtn'])) {
                                $compareProd1 = $_GET['compare_cat1'];
                                $compareProd2 = $_GET['compare_cat2'];

                                $checkCat1_res = mysqli_query($connect,"SELECT * FROM product JOIN category ON product.cat_id=category.cat_id WHERE prod_id='$compareProd1'");
                                $checkCat1_row = mysqli_fetch_assoc($checkCat1_res);

                                $checkCat2_res = mysqli_query($connect,"SELECT * FROM product JOIN category ON product.cat_id=category.cat_id WHERE prod_id='$compareProd2'");
                                $checkCat2_row = mysqli_fetch_assoc($checkCat2_res);

                                if ($checkCat1_row['cat_name'] != $checkCat2_row['cat_name']) {
                                    echo '
                                        <script>
                                            Swal.fire({
                                                title: "Somethings wrong!",
                                                text: "Unable to compare different category of products.",
                                                icon: "success"
                                            });
                                        </script>
                                    ';
                                }
                                else {
                                    echo "
                                        <script>
                                            window.location.href = 'compare.php?view&code1=".$compareProd1."&code2=".$compareProd2."';
                                        </script>
                                    ";
                                    }
                            }
                        ?>
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->
                <?php
                if (isset($_SESSION['customer_id'])) {
                    $getCartQuery = "SELECT * FROM cart_item
                                    INNER JOIN product ON cart_item.prod_id = product.prod_id
                                    INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
                                    INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
                                    WHERE cus_id = '".$_SESSION['customer_id']."' AND cart_item_status='1' AND order_id IS NULL";
                    $getCart = mysqli_query($connect, $getCartQuery);
                    $countCart = mysqli_num_rows($getCart);
                    $totalCartHeader = 0;
                ?>
                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count"><?php echo $countCart; ?></span>
                            </div>
                            <p>Cart</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <?php
                                    if ($countCart != 0) {
                                        while($cartRow = mysqli_fetch_assoc($getCart)) {
                                            $totalCartHeader += $cartRow['cart_subtotal'];
                                ?>
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.php?productId=<?php echo $cartRow['prod_id']; ?>"><?php echo $cartRow['prod_name']; ?></a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty"><?php echo $cartRow['quantity']; ?></span>
                                                        x RM <?php echo $cartRow['cart_subtotal']; ?>
                                                    </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.php?productId=<?php echo $cartRow['prod_id']; ?>" class="product-image">
                                                        <img src="../Product/<?php echo $cartRow['prod_color_img']; ?>" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product" onclick="deleteCartItemHeader(<?php echo $cartRow['cart_item_id']; ?>)"><i class="icon-close"></i></a>
                                            </div><!-- End .product -->
                                <?php
                                        }
                                    }
                                ?>
                            </div><!-- End .cart-product -->
                            <script>
                                function deleteCartItemHeader(cartItemId) {
                                    Swal.fire({
                                        text: "Are you sure you want to remove it from cart?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, remove it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                type: "POST",
                                                url: "delete-cart-item.php",
                                                data: {cartItemId},
                                                success: () => {
                                                    Swal.fire({
                                                        title: "Cart has been updated!",
                                                        icon: "success",
                                                    }).then(() => window.location.reload());
                                                }
                                            });
                                        }
                                    });
                                }
                            </script>

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">RM <?php echo sprintf('%0.2f', $totalCartHeader); ?></span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.php" class="btn btn-primary">View Cart</a>
                                <?php
                                if ($countCart != 0) {
                                ?>
                                    <a href="checkout.php" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                <?php
                                }
                                ?>
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