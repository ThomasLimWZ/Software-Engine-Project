<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>

<?php
if (isset($_SESSION['customer_id'])) {
?>
<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="cart.php">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form method="POST">
		                	<div class="row">
								<?php
									$getCustomer = mysqli_query($connect, "SELECT * FROM customer WHERE cus_id = '".$_SESSION['customer_id']."'");
									$cus_info = mysqli_fetch_assoc($getCustomer);
								?>
									<div class="col-lg-6">
										<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
											<div class="row">
												<div class="col-sm-12">
													<label>Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="checkoutName" id="checkoutName" value="<?php echo $cus_info['cus_name']; ?>" oninput="checkRequiredInputs()" required>
												</div><!-- End .col-sm-12 -->
											</div><!-- End .row -->

											<label>Address <span class="text-danger">*</span></label>
											<input type="text" class="form-control" placeholder="House number and Street name" name="address" id="address" value="<?php echo $cus_info['cus_address']; ?>" oninput="checkRequiredInputs()" required>

											<div class="row">
												<div class="col-sm-6">
													<label>City <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="city" id="city" value="<?php echo $cus_info['cus_city']; ?>" oninput="checkRequiredInputs()" required>
												</div><!-- End .col-sm-6 -->

												<div class="col-sm-6">
													<label>State <span class="text-danger">*</span></label>
													<select class="form-control" name="state" id="state" required><i class="fa fa-x"></i>
														<option value="" disabled>Select State</option>
														<option <?php if ($cus_info['cus_state'] == "Melaka") echo "selected";?>>Melaka</option>
														<option <?php if ($cus_info['cus_state'] == "Johor") echo "selected";?>>Johor</option>
														<option <?php if ($cus_info['cus_state'] == "Selangor") echo "selected";?>>Selangor</option>
														<option <?php if ($cus_info['cus_state'] == "Negeri Sembilan") echo "selected";?>>Negeri Sembilan</option>
														<option <?php if ($cus_info['cus_state'] == "Pulau Pinang") echo "selected";?>>Pulau Pinang</option>
														<option <?php if ($cus_info['cus_state'] == "Kedah") echo "selected";?>>Kedah</option>
														<option <?php if ($cus_info['cus_state'] == "Kelantan") echo "selected";?>>Kelantan</option>
														<option <?php if ($cus_info['cus_state'] == "Pahang") echo "selected";?>>Pahang</option>
														<option <?php if ($cus_info['cus_state'] == "Perlis") echo "selected";?>>Perlis</option>
														<option <?php if ($cus_info['cus_state'] == "Perak") echo "selected";?>>Perak</option>
														<option <?php if ($cus_info['cus_state'] == "Sabah") echo "selected";?>>Sabah</option>
														<option <?php if ($cus_info['cus_state'] == "Sarawak") echo "selected";?>>Sarawak</option>
														<option <?php if ($cus_info['cus_state'] == "Terengganu") echo "selected";?>>Terengganu</option>
													</select>
												</div><!-- End .col-sm-6 -->
											</div><!-- End .row -->

											<div class="row">
												<div class="col-sm-6">
													<label>Postcode <span class="text-danger">*</span></label>
													<input type="text" pattern="\d*" minlength="5" maxlength="5" class="form-control" name="postcode" id="postcode" value="<?php echo $cus_info['cus_postcode']; ?>" oninput="checkRequiredInputs()" required>
												</div><!-- End .col-sm-6 -->
											</div><!-- End .row -->

											<div class="row">
												<div class="col-sm-6">
												<label>Email address <span class="text-danger">*</span></label>
											<input type="email" class="form-control" name="checkoutEmail" id="checkoutEmail" value="<?php echo $cus_info['cus_email']; ?>" oninput="checkRequiredInputs()" required>
												</div><!-- End .col-sm-6 -->

												<div class="col-sm-6">
													<label>Phone <span class="text-danger">*</span></label>
													<input type="text" pattern="\d*" minlength="10" maxlength="11" class="form-control" name="checkoutPhone" id="checkoutPhone" value="<?php echo $cus_info['cus_phone']; ?>" oninput="checkRequiredInputs()" required>
												</div><!-- End .col-sm-6 -->
											</div><!-- End .row -->

											<?php
												if (!empty($cus_info['cus_address']) && !empty($cus_info['cus_city']) && !empty($cus_info['cus_state']) && !empty($cus_info['cus_postcode'])) {
											?>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="checkout-diff-address" onchange="shipDifferentAddress()">
														<label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
													</div><!-- End .custom-checkbox -->
											<?php
												}
											?>

											<label>Order notes (Optional)</label>
											<textarea class="form-control" cols="30" rows="4" name="specialNotes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
									</div><!-- End .col-lg-6 -->
									<aside class="col-lg-6">
										<div class="summary">
											<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

											<table class="table table-summary">
												<thead>
													<tr>
														<th>Product</th>
														<th>Price</th>
														<th>Subtotal</th>
													</tr>
												</thead>

												<tbody>
													<?php
														$getCartQuery = "SELECT * FROM cart_item 
																			INNER JOIN product ON cart_item.prod_id = product.prod_id
																			INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
																			INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
																			WHERE cus_id = '".$_SESSION['customer_id']."' AND cart_item_status='1' AND order_id IS NULL";
														$getCart = mysqli_query($connect, $getCartQuery);
														$countCart = mysqli_num_rows($getCart);
														$orderTotal = 0;

														if ($countCart != 0) {
															while($cartRow = mysqli_fetch_assoc($getCart)) {
																$orderTotal += $cartRow['cart_subtotal'];
													?>
																<tr>
																	<td>
																		<a href="#"><?php echo $cartRow['prod_name']; ?></a>
																		<p><?php echo $cartRow['prod_detail_name']; ?> <?php echo empty($cartRow['prod_detail_name']) ? "" : " - "; ?><?php echo $cartRow['prod_color_name']; ?></p>
																	</td>
																	<td><?php echo $cartRow['quantity']; ?> x RM <?php echo $cartRow['prod_detail_price']; ?></td>
																	<td>RM <?php echo $cartRow['cart_subtotal']; ?></td>
																</tr>
													<?php
															}
													?>
														<tr>
															<td>Shipping:</td>
															<td colspan="2">Free shipping</td>
														</tr>
														<tr class="summary-subtotal">
															<td>Grandtotal:</td>
															<td colspan="2">RM <?php echo sprintf('%0.2f', $orderTotal); ?></td>
														</tr><!-- End .summary-subtotal -->
													<?php
														}
													?>
												</tbody>
											</table><!-- End .table table-summary -->

											<div class="accordion-summary" id="accordion-payment">
												<div class="card" onclick="useThisPayment('visa')">
													<div class="card-header" id="heading-1">
														<h2 class="card-title">
															<a class="" id="visaCard" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
																<img src="assets/images/payment-visa.jpg" alt="payments cards" width="70" style="object-fit:contain;">
																<span class="ml-3">Visa</span>
															</a>
														</h2>
													</div><!-- End .card-header -->
													<div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
													</div><!-- End .collapse -->
												</div><!-- End .card -->
			
												<div class="card" onclick="useThisPayment('master')">
													<div class="card-header" id="heading-2">
														<h2 class="card-title">
															<a class="collapsed" id="masterCard" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-4">
																<img src="assets/images/payment-master.png" alt="payments cards" width="70" style="object-fit:contain;">    
																<span class="ml-3">Master</span>													
															</a>
														</h2>
													</div><!-- End .card-header -->
													<div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
													</div><!-- End .collapse -->
												</div><!-- End .card -->

												<div class="card" onclick="useThisPayment('fpx')">
													<div class="card-header" id="heading-3">
														<h2 class="card-title">
															<a class="collapsed" id="fpxCard" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-5">
																<img src="assets/images/payment-fpx.jpg" alt="payments cards" width="70" style="object-fit:contain;">    
																<span class="ml-3">FPX</span>
															</a>
														</h2>
													</div><!-- End .card-header -->
													<div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
													</div><!-- End .collapse -->
												</div><!-- End .card -->
												
											</div><!-- End .accordion -->

											<a class="btn btn-outline-primary-2 btn-order btn-block" data-toggle="modal" data-target="#staticBackdrop" id="paymentBtn" disabled>
												<span class="btn-text">Place Order</span>
												<span class="btn-hover-text" id="paymentText">Proceed to Payment</span>
											</a>

											<style>
												#paymentBtn {
													color: #fcb941;
													cursor: pointer;
												}
												#paymentBtn:hover {
													color: #ffffff;
												}
											</style>

											<!-- Modal -->
											<?php include('payment-modal.php'); ?>
										</div><!-- End .summary -->
									</aside><!-- End .col-lg-6 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
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

<script>
	function shipDifferentAddress() {
		isCheckboxChecked = document.getElementById('checkout-diff-address');

		if (isCheckboxChecked.checked) {
			address = document.getElementById('address').value = "";
			city = document.getElementById('city').value = "";
			state = document.getElementById('state').value = "";
			postcode = document.getElementById('postcode').value = "";
			checkRequiredInputs();
		} else {
			$.ajax({
				type: 'GET',
				url: 'autofill-address.php',
				data: {
					cus_id: <?php echo $_SESSION['customer_id']; ?>
				},
				success: (data) => {
					let result = JSON.parse(data);
					document.getElementById('address').value = result[0];
					document.getElementById('city').value = result[1];
					document.getElementById('state').value = result[2];
					document.getElementById('postcode').value = result[3];
					checkRequiredInputs();
				}
			});
		}
	}
	
	function checkRequiredInputs() {
		name = document.getElementById('checkoutName');
		email = document.getElementById('checkoutEmail');
		phone = document.getElementById('checkoutPhone');

		address = document.getElementById('address');
		city = document.getElementById('city');
		state = document.getElementById('state');
		postcode = document.getElementById('postcode');

		if (name.value != "" && email.value != "" && phone.value != "" && address.value != "" && city.value != "" && state.value != "" && postcode.value != "") {
			document.getElementById('paymentBtn').disabled = false;
		} else {
			document.getElementById('paymentBtn').disabled = true;
			document.getElementById('paymentText').innerHTML = "Place Order";
		}
	}

	addEventListener("DOMContentLoaded", (event) => {
		checkRequiredInputs();
    });

	function useThisPayment(paymentType) {
		if (paymentType == 'visa') {
			document.getElementById('visa-tab').classList.add('active');
			document.getElementById('master-tab').classList.remove('active');
			document.getElementById('fpx-tab').classList.remove('active');

			document.getElementById('visa').classList.add('show');
			document.getElementById('visa').classList.add('active');
			document.getElementById('master').classList.remove('show');
			document.getElementById('master').classList.remove('active');
			document.getElementById('fpx').classList.remove('show');
			document.getElementById('fpx').classList.remove('active');

			document.getElementById('visaCard').classList.remove('collapsed');
			document.getElementById('masterCard').classList.add('collapsed');
			document.getElementById('fpxCard').classList.add('collapsed');

			document.getElementById('visa-cardHolder').required = true;
			document.getElementById('visa-cardNum').required = true;
			document.getElementById('visa-expireDate').required = true;
			document.getElementById('visa-cvv').required = true;

			document.getElementById('master-cardHolder').required = false;
			document.getElementById('master-cardNum').required = false;
			document.getElementById('master-expireDate').required = false;
			document.getElementById('master-cvv').required = false;

			document.getElementById('fpx-bank').required = false;
			document.getElementById('fpx-username').required = false;
			document.getElementById('fpx-pass').required = false;
		} else if (paymentType == 'master') {
			document.getElementById('visa-tab').classList.remove('active');
			document.getElementById('master-tab').classList.add('active');
			document.getElementById('fpx-tab').classList.remove('active');

			document.getElementById('visa').classList.remove('show');
			document.getElementById('visa').classList.remove('active');
			document.getElementById('master').classList.add('show');
			document.getElementById('master').classList.add('active');
			document.getElementById('fpx').classList.remove('show');
			document.getElementById('fpx').classList.remove('active');

			document.getElementById('visaCard').classList.add('collapsed');
			document.getElementById('masterCard').classList.remove('collapsed');
			document.getElementById('fpxCard').classList.add('collapsed');

			document.getElementById('master-cardHolder').required = true;
			document.getElementById('master-cardNum').required = true;
			document.getElementById('master-expireDate').required = true;
			document.getElementById('master-cvv').required = true;

			document.getElementById('visa-cardHolder').required = false;
			document.getElementById('visa-cardNum').required = false;
			document.getElementById('visa-expireDate').required = false;
			document.getElementById('visa-cvv').required = false;

			document.getElementById('fpx-bank').required = false;
			document.getElementById('fpx-username').required = false;
			document.getElementById('fpx-pass').required = false;
		} else {
			document.getElementById('visa-tab').classList.remove('active');
			document.getElementById('master-tab').classList.remove('active');
			document.getElementById('fpx-tab').classList.add('active');

			document.getElementById('visa').classList.remove('show');
			document.getElementById('visa').classList.remove('active');
			document.getElementById('master').classList.remove('show');
			document.getElementById('master').classList.remove('active');
			document.getElementById('fpx').classList.add('show');
			document.getElementById('fpx').classList.add('active');

			document.getElementById('visaCard').classList.add('collapsed');
			document.getElementById('masterCard').classList.add('collapsed');
			document.getElementById('fpxCard').classList.remove('collapsed');

			document.getElementById('fpx-bank').required = true;
			document.getElementById('fpx-username').required = true;
			document.getElementById('fpx-pass').required = true;

			document.getElementById('visa-cardHolder').required = false;
			document.getElementById('visa-cardNum').required = false;
			document.getElementById('visa-expireDate').required = false;
			document.getElementById('visa-cvv').required = false;

			document.getElementById('master-cardHolder').required = false;
			document.getElementById('master-cardNum').required = false;
			document.getElementById('master-expireDate').required = false;
			document.getElementById('master-cvv').required = false;
		}
	}
</script>

<?php
	$cusId = $_SESSION['customer_id'];

	if (isset($_POST["visaPayBtn"])) {
		makePaymentAction($connect, $cusId, 'visa');
	}
	
	if (isset($_POST["masterPayBtn"])) {
		makePaymentAction($connect, $cusId, 'master');
	}

	if (isset($_POST["fpxPayBtn"])) {
		makePaymentAction($connect, $cusId, 'fpx');
	}

	function makePaymentAction($connect, $cusId, $paymentType) {
		$receiverName = $_POST['checkoutName'];
		$receiverEmail = $_POST['checkoutEmail'];
		$receiverPhone = $_POST['checkoutPhone'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$postcode = $_POST['postcode'];
		$specialNotes = $_POST['specialNotes'];
		
		$generate = substr(str_shuffle("0123456789"), 0, 6);
		$invoiceNo = "INV".$generate;

		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date('Y-m-d H:i:s');
		
		$cartResult = mysqli_query($connect, "SELECT * FROM cart_item WHERE cus_id = '".$_SESSION['customer_id']."' AND cart_item_status = '1' AND order_id IS NULL");
		$total = 0;
		
		while ($cartRow = mysqli_fetch_assoc($cartResult)) {
			$total += $cartRow['cart_subtotal'];
		}
		
		mysqli_query($connect, "INSERT INTO `order` (order_datetime, order_grandtotal, cus_id) VALUES ('$date', '$total', '$cusId')");

		$getOrder = mysqli_query($connect, "SELECT * FROM `order` WHERE order_grandtotal = '$total' AND cus_id = '$cusId' ORDER BY order_id DESC LIMIT 1");
		$order = mysqli_fetch_assoc($getOrder);
		
		mysqli_query($connect, "INSERT INTO payment (invoice_number, pay_datetime, pay_type, pay_status, order_id) VALUES ('$invoiceNo', '".$order['order_datetime']."', '$paymentType', '1', '".$order['order_id']."')");
		mysqli_query($connect, "INSERT INTO shipping (receiver_name, receiver_email, receiver_phone, address, city, state, postcode, special_notes, order_id) VALUES ('$receiverName', '$receiverEmail', '$receiverPhone', '$address', '$city', '$state', '$postcode', '$specialNotes', '".$order['order_id']."')");

		$cartResult = mysqli_query($connect, "SELECT * FROM cart_item WHERE cus_id = '".$_SESSION['customer_id']."' AND cart_item_status = '1' AND order_id IS NULL");
		while ($cartRow = mysqli_fetch_assoc($cartResult)) {
			mysqli_query($connect, "UPDATE cart_item SET cart_item_status = '0', order_id = '".$order['order_id']."' 
									WHERE cart_item_status = '1' AND cart_item_id = '".$cartRow['cart_item_id']."'");

			$getProduct = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_color_id = '".$cartRow['prod_color_id']."'");
			$getStock = mysqli_fetch_assoc($getProduct);

			$stockAvailability = $getStock['prod_color_stock'] - $cartRow['quantity'];

			mysqli_query($connect, "UPDATE product_color SET prod_color_stock = '$stockAvailability' WHERE prod_color_id = '".$cartRow['prod_color_id']."'");
		}

		$subject = "Your invoice from 4People Telco";
		$message = "Dear ".$receiverName.",\n\nThank you for shopping at 4People Telco. We hope you enjoy your purchases.\nBelow is the invoice attachment.\n\nhttp://localhost/4peopletelco/Customer/order-details-receipt.php?code=".$order['order_id']."\n\nThank you. \n\nRegards,\n4People Telco";
		$headers = "From: 4People Telco" . "\r\n";

		$customer = mysqli_query($connect, "SELECT * FROM customer WHERE cus_id = '".$_SESSION['customer_id']."'");
		$customerRow = mysqli_fetch_assoc($customer);

		if (mail($customerRow['cus_email'], $subject, $message, $headers)) {
			echo "
				<script>
					Swal.fire({
						title: 'Payment successful!',
						icon: 'success'
					}).then(() => window.location.href = 'my-account.php');
				</script>
			";
		}
	}
?>