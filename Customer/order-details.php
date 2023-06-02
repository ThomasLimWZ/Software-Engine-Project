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
			if(isset($_GET["details"])){
				$pay_code = $_GET["code"];

				$result = mysqli_query($connect, "SELECT * FROM `order` WHERE order_id='$pay_code'");
				$row = mysqli_fetch_assoc($result);
				
				$ship_res = mysqli_query($connect,"SELECT * FROM shipping WHERE order_id='$pay_code'");
				$ship_row = mysqli_fetch_assoc($ship_res);
				
				$pay_res = mysqli_query($connect,"SELECT * FROM payment WHERE order_id='$pay_code'");
				$pay_row = mysqli_fetch_assoc($pay_res);

			}
		?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="my-account.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice #<?php echo $row['order_id'];?></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
					<div class="container">
					
						<label>Purchase Date Time:</label>
						<h6><?php
							#$date = Date("d-m-Y H:i:s");
							#echo $date//date_format($date,"d-m-Y H:i:s");

							$date = date_create($row['order_datetime']);
							echo date_format($date,"d-m-Y H:i:s");
						?></h6>
						<label>Sold to:</label>
						<h6><?php echo $ship_row['receiver_name'];?></h6>
						<h6><?php echo $ship_row['receiver_phone'];?></h6>
						<h6><?php echo $ship_row['address'];?>, <?php echo $ship_row['city'];?>, <?php echo $ship_row['state'];?>, <?php echo $ship_row['postcode'];?>, Malaysia.</h6>
						
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
								JOIN product ON cart_item.prod_id=product.prod_id 
								JOIN product_color ON product_color.prod_color_id=cart_item.prod_color_id 
								WHERE order_id='$pay_code'");
								while($prod_row = mysqli_fetch_assoc($prod_res)){
									$detail = $prod_row['prod_detail_id'];
									$pcode = $prod_row['prod_color_id'];
									$detail_res = mysqli_query($connect,"SELECT * FROM product_detail WHERE prod_detail_id='$detail'");
									$detail_row = mysqli_fetch_assoc($detail_res);
									$img_res = mysqli_query($connect,"SELECT * FROM product_color WHERE prod_color_id='$pcode'");
									$img_row = mysqli_fetch_assoc($img_res);
							?>
							<tr>
								<td style="text-align:center; padding:5px; border-top:solid black 1px; border-left: none;"><?php echo $i; ?></td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px; text-align:left; display:flex; align-items:center;">
									
									<img src="../Product/<?php echo $img_row['prod_color_img']; ?>" width="100px" alt="product" style="float:left;">
									
									<div style="padding-left: 20px;"><?php echo $prod_row['prod_name']; ?></div>
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">
								<?php echo $detail_row['prod_detail_name']; ?>
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;"><?php echo $img_row['prod_color_name']; ?></td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;"><?php echo $prod_row['quantity']; ?></td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM <?php echo $detail_row['prod_detail_price']; ?></td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM <?php echo $prod_row['cart_subtotal']; ?></td>
							</tr>
							<?php
									$i++;
								}
							?>	

									<tr>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="font-weight:bold; padding:5px; border-left:none; border-top:solid black 1px;">RM <?php echo $row['order_grandtotal']; ?></td>
									</tr>
						</table>
						
						<br><br>
						<a href="order-details-receipt.php?details&code=<?php echo $row['order_id'];?>&id=<?php echo $cus_id;?>" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf fa-lg"></i>Print PDF</a>&ensp;
						<a href="my-account.php" class="btn btn-primary" >Back</a>
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