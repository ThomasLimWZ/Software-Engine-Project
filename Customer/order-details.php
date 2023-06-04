<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<?php
if (isset($_SESSION['customer_id'])) {
?>
<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

		<?php
			if (isset($_GET["details"])) {
				$orderId = $_GET["code"];

				$result = mysqli_query($connect, "SELECT * FROM `order` 
												INNER JOIN payment ON `order`.order_id = payment.order_id
												INNER JOIN shipping ON `order`.order_id = shipping.order_id
												WHERE `order`.order_id = '$orderId'");
				$row = mysqli_fetch_assoc($result);
			}
		?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="my-account.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice #<?php echo $row['invoice_number'];?></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard ">
					<div class="container shadow p-3 mb-5 bg-body rounded p-5">
						<div class="d-flex flex-column">							
							<div class="mx-5">
								<h6 class="text-primary">Invoice  </h6>
								<p class="text_body">#<?php echo $row['invoice_number'];?></p>
								<br>
								<h6 class="text-primary">Purchase Date  </h6>
								<p>
									<?php
										$date = date_create($row['order_datetime']);
										echo date_format($date, "d-m-Y H:i:s");
									?>
								</p>
							</div>
							<div class="pt-3 mx-5">
								<h6 class="text-primary">Buyer Info</h6>
								<p ><?php echo $row['receiver_name']; ?> ,</p>
								<p><?php echo $row['receiver_phone']; ?> ,</p>
								<p><?php echo $row['address']; ?> , 
								<br><?php echo $row['city']; ?>,
								<br> <?php echo $row['state']; ?> , <?php echo $row['postcode']; ?> , Malaysia.</p>
							</div>
						</div>
						<br>
						<div class="table-responsive-md">
							<table class="table align-middle table-striped">
								<thead>
									<th class="text-primary" style="width: 5%;"></th>
									<th class="text-primary text-center" style="width: 40%;">Product</th>	
									<th class="text-primary text-center">Capacity/Case Size</th>
									<th class="text-primary text-center">Color</th>
									<th class="text-primary text-center">Quantity</th>
									<th class="text-primary text-center">Unit Price</th>
									<th class="text-primary text-center">Subtotal</th>
								</thead>
								<?php
									$i = 1;
									$prod_res = mysqli_query($connect,"SELECT * FROM cart_item 
																		INNER JOIN product ON cart_item.prod_id = product.prod_id 
																		INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
																		INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
																		WHERE order_id = '$orderId'");

									while ($prod_row = mysqli_fetch_assoc($prod_res)) {
								?>
										<tr>
											<td class="text-center" style="width: 5%;"><?php echo $i; ?></td>
											<td>
												<a href="product.php?productId=<?php echo $prod_row['prod_id']; ?>" class="text-body">
													<div class="row">
														<div class="col-sm-4">
															<img src="../Product/<?php echo $prod_row['prod_color_img']; ?>" width="130px" alt="product" style="object-fit: contain;">
														</div>
														
														<div class="col-sm-8 d-flex align-items-center">
															<?php echo $prod_row['prod_name']; ?>
														</div>
													</div>
												</a>
											</td>
											<td class="text-center">
												<?php echo empty($prod_row['prod_detail_name']) ? '-' : $prod_row['prod_detail_name']; ?>
											</td>
											<td class="text-center"><?php echo $prod_row['prod_color_name']; ?></td>
											<td class="text-center"><?php echo $prod_row['quantity']; ?></td>
											<td class="text-center">RM <?php echo $prod_row['prod_detail_price']; ?></td>
											<td class="text-center">RM <?php echo $prod_row['cart_subtotal']; ?></td>
										</tr>
								<?php
										$i++;
									}
								?>	
								<tr>
									<td class="text-right px-5" colspan="7">Grandtotal: <span class="font-weight-bold">RM <?php echo $row['order_grandtotal']; ?></span></td>
								</tr>
							</table>
						</div>
						<br><br>
						<a href="order-details-receipt.php?code=<?php echo $row['order_id'];?>" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf fa-lg"></i>Print PDF</a>&ensp;
						<a href="my-account.php" class="btn btn-primary">Back</a>
						<br><br>
					</div>
                </div><!-- End .dashboard -->
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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
<?php
} else {
	header('Location: 404.php');
}
?>
</html>