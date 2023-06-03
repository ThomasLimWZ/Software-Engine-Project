<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<?php
if (isset($_SESSION['customer_id'])) {
?>
<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-sm-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th></th>
											<th>Product</th>
											<th>Capacity/Size</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Subtotal</th>
											<th></th>
										</tr>
									</thead>
									<?php
										$getCartQuery = "SELECT * FROM cart_item 
														 INNER JOIN product ON cart_item.prod_id = product.prod_id
														 INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
														 INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
														 WHERE cus_id = '".$_SESSION['customer_id']."' AND cart_item_status='1' AND order_id IS NULL";
										$getCart = mysqli_query($connect, $getCartQuery);
										$countCart = mysqli_num_rows($getCart);
										$total = 0;

										if ($countCart != 0) {
											while($cartRow = mysqli_fetch_assoc($getCart)) {
												$total += $cartRow['cart_subtotal'];
									?>
										<tbody>
											<tr>
												<td class="product-col">
													<div class="product">
														<figure class="product-media">
															<a href="#">
																<img src="../Product/<?php echo $cartRow['prod_color_img']; ?>" alt="Product image">
															</a>
														</figure>
													</div><!-- End .product -->
												</td>
												<td class="product-title w-25">
														<a href="product.php?productId=<?php echo $cartRow['prod_id']; ?>"><?php echo $cartRow['prod_name']; ?></a>
														<br>[<?php echo $cartRow['prod_color_name']; ?>]
												</td>
												<td class="product-title text-center"><?php echo !empty($cartRow['prod_detail_name']) ? $cartRow['prod_detail_name'] : '-'; ?></td>
												<td class="price-col">RM <?php echo $cartRow['prod_detail_price']; ?></td>
												<td class="quantity-col">
													<div class="cart-product-quantity">
														<input type="number" class="form-control" value="<?php echo $cartRow['quantity']; ?>"
															onchange="updateQty(<?php echo $cartRow['cart_item_id']; ?>, <?php echo $cartRow['prod_detail_price']; ?>, this.value)"
															min="1" max="<?php echo $cartRow['prod_color_stock']; ?>" step="1" data-decimals="0" required>
													</div><!-- End .cart-product-quantity -->
												</td>
												<td class="total-col mx-0" style="width: 12%;" id="subtotal-<?php echo $cartRow['cart_item_id'];?>">RM <?php echo $cartRow['cart_subtotal']; ?></td>
												<td class="remove-col"><button class="btn-remove" onclick="deleteCartItem(<?php echo $cartRow['cart_item_id']; ?>)"><i class="icon-close"></i></button></td>
											</tr>
										</tbody>
									<?php
											}
										} else {
									?>
											<tbody>
												<tr>
													<td colspan="7">
														<h5 class="text-center mb-3">Your cart is empty.</h5>
														<a href="category.php" class="btn btn-primary btn-block mb-3"><span>SHOPPING NOW</span></a>
													</td>
												</tr>
											</tbody>
									<?php
										}
									?>
								</table><!-- End .table table-wishlist -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-sm-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input" checked>
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>RM 0.00</td>
	                						</tr><!-- End .summary-shipping-row -->
	                						
	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td id="cartTotal">RM <?php echo sprintf('%0.2f', $total); ?></td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="category.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
<?php
} else {
	header('Location: 404.php');
}
?>
</html>

<script>
	function updateQty(cartItemId, productPrice, qty) {
		$.ajax({
			type: 'POST',
			url: 'cart-qty-onchange.php',
			data: {
				cusId: <?php echo $_SESSION['customer_id']; ?>,
				cartItemId: cartItemId,
				price: productPrice,
				quantity: qty
			},
			success:function(data){
				document.getElementById('subtotal-' + cartItemId).innerHTML = "RM " + data;
				$.ajax({
					type: 'GET',
					url: 'get-cart-total.php',
					data: {
						cusId: <?php echo $_SESSION['customer_id']; ?>
					},
					success:function(total){
						document.getElementById('cartTotal').innerHTML = "RM " + total;
					}
				});
			}
		});
	}

	function deleteCartItem(cartItemId) {
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
						}).then(() => window.location.href = "cart.php");
					}
				});
			}
		});
	}
</script>