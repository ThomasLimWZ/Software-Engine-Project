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
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="my-account.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice #123456</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
					<div class="container">
						<label>Purchase Date Time:</label>
						<h6><?php
							$date = Date("d-m-Y H:i:s");
							echo $date//date_format($date,"d-m-Y H:i:s");
						?></h6>
						<label>Sold to:</label>
						<h6><?php echo "Heng Yi Jun"?></h6>
						<h6><?php echo '012-3456789' ?></h6>
						<h6><?php echo 'No 1,Jalan 2,Taman Bukit Beruang, 75450,melaka'?></h6>
						
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
							
							<tr>
								<td style="text-align:center; padding:5px; border-top:solid black 1px; border-left: none;">1</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px; text-align:left; display:flex; align-items:center;">
									
									<img src="admin/product/" width="100px" alt="product" style="float:left;">
									
									<div style="padding-left: 20px;">Iphone 15</div>
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">
								256GB
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">Pink</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">1</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM 5000.00</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM 5000.00</td>
							</tr>
							<tr>
								<td style="text-align:center; padding:5px; border-top:solid black 1px; border-left: none;">2</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px; text-align:left; display:flex; align-items:center;">
									
									<img src="admin/product/" width="100px" alt="product" style="float:left;">
									
									<div style="padding-left: 20px;">Iphone 14</div>
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">
									256GB
								</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">Yellow</td>
								<td style="text-align:center; padding:5px; border-left:solid black 1px; border-top:solid black 1px;">1</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM 4500.00</td>
								<td style="padding:5px; border-left:solid black 1px; border-top:solid black 1px;">RM 4500.00</td>
							</tr>
									<tr>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="border-top:solid black 1px;"></td>
										<td style="font-weight:bold; padding:5px; border-left:none; border-top:solid black 1px;">RM 9500.00</td>
									</tr>
						</table>
						<br><br>
						<a href="order-details-receipt.php?details&code=" class="btn btn-primary" target="_blank"><i class="fas fa-file-pdf fa-lg"></i>Print PDF</a>&ensp;
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