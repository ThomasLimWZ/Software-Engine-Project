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
            	<div class="dashboard">
					<div class="container">
					
						<label>Purchase Date Time:</label>
						<h6>
							<?php
								$date = date_create($row['order_datetime']);
								echo date_format($date, "d-m-Y H:i:s");
							?>
						</h6>
						<label>Sold to:</label>
						<h6><?php echo $row['receiver_name'];?></h6>
						<h6><?php echo $row['receiver_phone'];?></h6>
						<h6><?php echo $row['address'];?>, <?php echo $row['city'];?>, <?php echo $row['state'];?>, <?php echo $row['postcode'];?>, Malaysia.</h6>
						
						<br>
						<table style="margin:auto; border-collapse:separate; border:solid black 1px; border-radius:6px; font-size:12pt;">
							<tr style="background-color:#f2f2f2;">
								<th width="100px" style="text-align:center; padding:5px; border-top: none; border-left: none;">No.</th>
								<th width="40%" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Product</th>
								<th width="200px" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Capacity</th>
								<th width="200px" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Color</th>
								<th width="120px" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Quantity</th>
								<th width="150px" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Unit Price</th>
								<th width="150px" style="text-align:center; padding:5px; border-left:solid black 1px; border-top: none;">Subtotal</th>
							</tr>
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
										<td style="text-align:center; padding:5px; border-top:solid black 1px; border-left: none;"><?php echo $i; ?></td>
										<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px; text-align:left; display:flex; align-items:center;">
											
											<img src="../Product/<?php echo $prod_row['prod_color_img']; ?>" width="100px" alt="product" style="float:left;">
											
											<div style="padding-left: 20px;"><?php echo $prod_row['prod_name']; ?></div>
										</td>
										<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">
										<?php echo empty($prod_row['prod_detail_name']) ? '-' : $prod_row['prod_detail_name']; ?>
										</td>
										<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;"><?php echo $prod_row['prod_color_name']; ?></td>
										<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;"><?php echo $prod_row['quantity']; ?></td>
										<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM <?php echo $prod_row['prod_detail_price']; ?></td>
										<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM <?php echo $prod_row['cart_subtotal']; ?></td>
									</tr>
							<?php
									$i++;
								}
							?>	
									<tr>
										<td class="text-right" colspan="7" style="font-weight:bold; padding:5px; border-left:none; border-top:solid black 1px;">RM <?php echo $row['order_grandtotal']; ?></td>
									</tr>
						</table>
						
						<br><br>
						<a href="order-details-receipt.php?details&code=<?php echo $row['order_id'];?>&id=<?php echo $cus_id;?>" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf fa-lg"></i>Print PDF</a>&ensp;
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