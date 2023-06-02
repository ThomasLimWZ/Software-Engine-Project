<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<style>
	.progressbar{
		counter-reset: step;
		overflow: auto;
		
	}
	.progressbar li{
		list-style-type: none;
		float: left;
		width: calc(100%/4);
		position: relative;
		text-align: center;
		
	}
	.progressbar li:before{
		content:'';
		background-image:url(assets/images/icon-order/preparation.png);
		background-size: 70%;
		background-position: center;
		background-repeat: no-repeat;
		counter-increment: step;
		width:50px;
		height:50px;
		line-height: 30px;
		border:1px solid #ddd;
		display:block;
		text-align:center;
		margin:auto;
		border-radius:50%;
		background-color:white;
		padding: 10px;
		
	}
	.progressbar li:nth-child(2):before{
		background-image:url(assets/images/icon-order/box.png);
	}
	.progressbar li:nth-child(3):before{
		background-image:url(assets/images/icon-order/delivery-truck.png);
	}
	.progressbar li:nth-child(4):before{
		background-image:url(assets/images/icon-order/shipped.png);
	}
	.progressbar li:after{
		content: ' ';
		position: absolute;
		width: 100%;
		height: 2px;
		background-color: #ddd;
		top: 25px;
		left: -50%;
		z-index: -1;
	}
	.progressbar li:first-child:after{
		content: none;
	}
	.progressbar li.active{
		color:#cd9967
	}
	.progressbar li.active:before{
		border:2px solid #cd9967;
	}
	.progressbar li.active + li:after{
		background-color: #c96;
		
	}

	.progressbar li.load + li:after{
		background-color: #c96;
		animation: loding 1s ;
	}
	
	@keyframes loding {
		0%   { width: 0%; background-color: #c96;}
		100% { width: 90%; background-color: #c96; }
	}
</style>
<?php
if (isset($_SESSION['customer_id'])) {
	$cus_id = $_SESSION["customer_id"];
    $result = mysqli_query($connect, "SELECT * FROM customer WHERE cus_id = '$cus_id'");
    $cus_info = mysqli_fetch_assoc($result);
?>
<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

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
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-reset-password-link" data-toggle="tab" href="#tab-reset-password" role="tab" aria-controls="tab-reset-password" aria-selected="false">Reset Password</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="signout.php">Log Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->
							
	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
									<?php 
								$orderDet = mysqli_query($connect, "SELECT * FROM customer
								JOIN `order` ON `order`.cus_id=customer.cus_id WHERE customer.cus_id = '$cus_id' ");
								$count = mysqli_num_rows($orderDet);
								#$order_info = mysqli_fetch_assoc($orderDet);
								if($count != 0){
									while($orderDet_row = mysqli_fetch_assoc($orderDet)){
									
							?>	
									<div class="card shadow-0 border mb-4">
										
											<div class="card-body">
												<div class="row pt-2">
													<div class="col-sm-9">
														<h4 class="text-muted mb-0">INVOICE <span class="font-weight-bold"># <?php echo $orderDet_row['order_id'] ?></span></h4>
													</div>
													<div class="col-sm-3" style="text-align-last: end; font-size: 18pt;">
														<p class="text-muted mb-0 small">RM <?php echo $orderDet_row['order_grandtotal'] ?></span></p>

													</div>
												</div>
												<div class="row pt-1">
													<div class="col-sm-3">
														<p class="text-muted mb-0">Created: <span class="font-weight-bold"><?php echo $orderDet_row['order_datetime'] ?></span></span></p>
													</div>
													<div class="col-md-9 text-right">
														<a href="order-details.php?details&code=<?php echo $orderDet_row['order_id']; ?>" class="btn btn-primary text-white" style="border-radius:10px;">Show Details</a>
													</div>
												</div>
												<hr class="mb-2" style="background-color: #e0e0e0; opacity: 1;">
												<div class="row d-flex align-items-center" >
												<div class="w-100" style="z-index:1;">
													<ul class="progressbar">
														<li class="active">Preparing</li>
														<li class="active">Shipped Out</li>
														<li class="active load">Out of Delivering</li>
														<li >Delivered</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<?php
								 }
								} ?>
								</div><!-- .End .tab-pane -->
								

								<div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
									<p id="show_shipping_word">The following addresses will be used on the checkout page by default.</p>
									<div class="row" id="show_shipping">
										<div class="col-lg-6">
											<div class="card card-dashboard">
												<div class="card-body" >
													<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

													<p>
														<?php 
															if (isset($cus_info['cus_address']))
																echo 
																	$cus_info['cus_name'].'
																	<br>
																	'.$cus_info['cus_address'].',<br>
																	'.$cus_info['cus_city'].',<br>
																	'.$cus_info['cus_postcode'].', '.$cus_info['cus_state'].'<br>
																	'.$cus_info['cus_phone'].'<br>
																	'.$cus_info['cus_email'].'<br>
																';
															else
															echo 'You have not set up this type of address yet.<br>';	
														?>
														<a href="#" onclick="open_close_address()">Edit <i class="icon-edit"></i></a>
													</p>
												</div><!-- End .card-body -->
												
											</div><!-- End .card-dashboard -->
										</div><!-- End .col-lg-6 -->
									</div><!-- End .row -->

									<div class="d-none" id="edit_address">
										<form action="#" method="POST" autocomplete="off">				
											<label>Name</label>
											<input type="text" class="form-control" value="<?php echo $cus_info['cus_name']; ?>" readonly>

											<label>Address<span class="text-danger">*</span></label>
											<input type="text" class="form-control" value="<?php echo $cus_info['cus_address']; ?>" name="address_edit" placeholder="Your Address" required>

											<label>City <span class="text-danger">*</span></label>												
											<input type="test" class="form-control" value="<?php echo $cus_info['cus_city'];?>" name="city_edit" placeholder="Your City" required>

											<div class="row">
												<div class="col-sm-6">
													<label>Postcode<span class="text-danger">*</span></label>
													<input type="text" class="form-control" value="<?php echo $cus_info['cus_postcode'];?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" pattern="[0-9]{5}" maxlength="5" 
														placeholder="Your postcode" name="postcode_edit" required>
												</div>

												<div class="col-sm-6">
												<label>State<span class="text-danger" >*</span></label>
												<select class="form-control" name="state_edit" required><i class="fa fa-x"></i>
													<option value="">Select State</option>
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
												</div>

											</div>

											<label>Email Address </label>
												<input type="email" class="form-control" value="<?php echo $cus_info['cus_email'];?>" readonly disabled>

											<label>Phone Number </label>
												<input type="text" class="form-control" value="<?php echo $cus_info['cus_phone'];?>" readonly disabled>

											<button type="submit" class="btn btn-outline-primary-2" name="submit_shipping">
												<span>SAVE CHANGES</span>
												<i class="icon-long-arrow-right"></i>
											</button>
										</form>
									</div>
								</div><!-- .End .tab-pane -->

								<div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
									<form action="#" method="POST" autocomplete="off">
										<div class="row">
											<div class="col-sm-6">
												<label> Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" value="<?php echo $cus_info['cus_name']; ?>" name="name_edit" required>
											</div><!-- End .col-sm-6 -->
										</div><!-- End .row -->

										<label>Email Address <span class="text-danger">*</span></label>
										<input type="email" class="form-control" value="<?php echo $cus_info['cus_email'];?>" name="email_edit" readonly disabled>

										<label>Phone Number <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="<?php echo $cus_info['cus_phone'];?>" placeholder="01xxxxxxxx" pattern="\d*" minlength="10" maxlength="11" name="phone_edit" required>

										<button type="submit" class="btn btn-outline-primary-2" name="submit_accountdetails">
											<span>SAVE CHANGES</span>
											<i class="icon-long-arrow-right"></i>
										</button>
									</form>
								</div><!-- .End .tab-pane -->

								<div class="tab-pane fade" id="tab-reset-password" role="tabpanel" aria-labelledby="tab-reset-password-link">
									<form action="#" method="post">
										<label>Current password </label>
										<input type="password" class="form-control" id="old_password" name="old_password" required>
																
										<label for="new_password">New password </label>
										<input type="password" class="form-control" id="new_password" name="new_password" required
											pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]){8,}"
											title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters">
								
										<div class="col-sm-12 mb-4 w-auto h-auto">
											<div class="alert-warning px-4 py-3 mb-0 d-none" id="password-alert">
												<ul class="list-unstyled mb-0">
													<li class="requirements leng">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Your password must have at least 8 chars
													</li>
													<li class="requirements big-letter">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Your password must have at least 1 big letter.
													</li>
													<li class="requirements small-letter">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Your password must have at least 1 small letter.
													</li>
													<li class="requirements num">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Your password must have at least 1 number.
													</li>
													<li class="requirements special-char">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Your password must have at least 1 special char.
													</li>
												</ul>
											</div>
										</div>
								
										<label for="new_comfirm_password">Confirm new password </label>
										<input type="password" class="form-control mb-2" id="new_comfirm_password" name="new_comfirm_password" 
											pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]){8,}"
											title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
											
										<div class="col-sm-12 mb-4 w-auto h-auto">
											<div class="alert-warning px-4 py-3 mb-0 d-none" id="confirm-password-alert">
												<ul class="list-unstyled mb-0">
													<li class="requirement same-pass">
														<i class="fas fa-check text-success me-2"></i>
														<i class="fas fa-times text-danger me-3"></i>
														&emsp;Both password and confirm password must be same.
													</li>
												</ul>
											</div>
										</div>
										<style>
											.alert-warning {
												color: #806520;
												background-color: #fdf3d8;
												border-color: #fceec9;
											}
											.alert-success {
												color: #0f6848;
												background-color: #d2f4e8;
												border-color: #bff0de;
											}
											.wrong .fa-check {
												display: none;
											}

											.good .fa-times {
												display: none;
											}
										</style>
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="show_password">
												<label class="custom-control-label" for="show_password">Show Password</label>
											</div><!-- End .custom-checkbox -->
										</div><!-- End .form-group -->

										<button type="submit" class="btn btn-outline-primary-2" id="reset_password" name="reset_password">
											<span>SAVE CHANGES</span>
											<i class="icon-long-arrow-right"></i>
										</button>
									</form>
								</div><!-- .End .tab-pane -->
							</div>
						</div><!-- End .row -->
					</div><!-- End .container -->
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

	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php
} else {
	header('Location: 404.php');
}
?>

<script>
	function open_close_address()
	{
		document.getElementById('show_shipping').classList.add('d-none');
		document.getElementById('show_shipping_word').classList.add('d-none');

		document.getElementById('edit_address').classList.add('d-block');
	}

	let nshowPassword = document.querySelector("#show_password");
	let oldPassword = document.querySelector("#old_password");
	let newPassword = document.querySelector("#new_password");
	let newConfirmPassword = document.querySelector('#new_comfirm_password');

	nshowPassword.addEventListener("click", () => {
		let type = oldPassword.getAttribute("type") === "password" && newPassword.getAttribute("type") === "password" && newConfirmPassword.getAttribute("type") === "password" ? "text" : "password";
		oldPassword.setAttribute("type", type);
		newPassword.setAttribute("type", type);
		newConfirmPassword.setAttribute("type", type);
	});

	addEventListener("DOMContentLoaded", (event) => {
		const password = document.getElementById("new_password");
		const passwordAlert = document.getElementById("password-alert");
		const requirements = document.querySelectorAll(".requirements");

		let lengBoolean, bigLetterBoolean, smallLetterBoolean, numBoolean, specialCharBoolean;
		let leng = document.querySelector(".leng");
		let bigLetter = document.querySelector(".big-letter");
		let smallLetter = document.querySelector(".small-letter");
		let num = document.querySelector(".num");
		let specialChar = document.querySelector(".special-char");

		const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
		const numbers = "0123456789";

		requirements.forEach((element) => element.classList.add("wrong"));

		password.addEventListener("focus", () => {
			passwordAlert.classList.remove("d-none");

			if (!password.classList.contains("is-valid")) {
				password.classList.add("is-invalid");
			}
		});
		
		password.addEventListener("blur", () => {
			passwordAlert.classList.add("d-none");
		});

		password.addEventListener("input", () => {
			validationAction(password);
		});

		function validationAction(passwordType) {
			let value = passwordType.value;

			if (value.length < 8) {
				lengBoolean = false;
			} else if (value.length > 7) {
				lengBoolean = true;
			}

			let lowerCaseLetters = /[a-z]/g;
			if(value.match(lowerCaseLetters)) {  
				smallLetterBoolean = true;
			} else {
				smallLetterBoolean = false;
			}
			
			let upperCaseLetters = /[A-Z]/g;
			if(value.match(upperCaseLetters)) {  
				bigLetterBoolean = true;
			} else {
				bigLetterBoolean = false;
			}

			numBoolean = false;
			for (let i = 0; i < value.length; i++) {
				for (let j = 0; j < numbers.length; j++) {
					if (value[i] == numbers[j]) {
						numBoolean = true;
					}
				}
			}

			specialCharBoolean = false;
			for (let i = 0; i < value.length; i++) {
				for (let j = 0; j < specialChars.length; j++) {
					if (value[i] == specialChars[j]) {
						specialCharBoolean = true;
					}
				}
			}

			if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
				passwordType.classList.remove("is-invalid");
				passwordType.classList.add("is-valid");

				requirements.forEach((element) => {
					element.classList.remove("wrong");
					element.classList.add("good");
				});
				passwordAlert.classList.remove("alert-warning");
				passwordAlert.classList.add("alert-success");
			} else {
				passwordType.classList.remove("is-valid");
				passwordType.classList.add("is-invalid");

				passwordAlert.classList.add("alert-warning");
				passwordAlert.classList.remove("alert-success");

				if (lengBoolean == false) {
					leng.classList.add("wrong");
					leng.classList.remove("good");
				} else {
					leng.classList.add("good");
					leng.classList.remove("wrong");
				}

				if (bigLetterBoolean == false) {
					bigLetter.classList.add("wrong");
					bigLetter.classList.remove("good");
				} else {
					bigLetter.classList.add("good");
					bigLetter.classList.remove("wrong");
				}

				if (smallLetterBoolean == false) {
					smallLetter.classList.add("wrong");
					smallLetter.classList.remove("good");
				} else {
					smallLetter.classList.add("good");
					smallLetter.classList.remove("wrong");
				}

				if (numBoolean == false) {
					num.classList.add("wrong");
					num.classList.remove("good");
				} else {
					num.classList.add("good");
					num.classList.remove("wrong");
				}

				if (specialCharBoolean == false) {
					specialChar.classList.add("wrong");
					specialChar.classList.remove("good");
				} else {
					specialChar.classList.add("good");
					specialChar.classList.remove("wrong");
				}
			}
		}

		const confirmPassword = document.getElementById("new_comfirm_password");
		const confirmPasswordAlert = document.getElementById("confirm-password-alert");
		const requirement = document.querySelectorAll(".requirement");

		let samePassBoolean;
		let samePass = document.querySelector(".same-pass");

		requirement.forEach((element) => element.classList.add("wrong"));

		confirmPassword.addEventListener("focus", () => {
			confirmPasswordAlert.classList.remove("d-none");

			if (!confirmPassword.classList.contains("is-valid")) {
				confirmPassword.classList.add("is-invalid");
			}
		});  

		confirmPassword.addEventListener("blur", () => {
			confirmPasswordAlert.classList.add("d-none");
		});

		$('#new_password, #new_comfirm_password').on('input', function () {
			if ($('#new_password').val().length != 0 && $('#new_comfirm_password').val().length != 0) {
				bothPasswordValidation();
				return false;
			} else if ($('#new_password').val().length != 0 && $('#new_comfirm_password').val().length != 0) {
				bothPasswordValidation();
				document.getElementById('reset_password').disabled = true;
			} else {
				document.getElementById('reset_password').disabled = true;
			}
		});

		function bothPasswordValidation() {
			if ($('#new_password').val() == $('#new_comfirm_password').val()) {
				samePassBoolean = true;
				if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
					document.getElementById('reset_password').disabled = false;
				}
			} else {
				samePassBoolean = false;
				document.getElementById('reset_password').disabled = true;
			}

			if (samePassBoolean == true) {
				confirmPassword.classList.remove("is-invalid");
				confirmPassword.classList.add("is-valid");

				requirement.forEach((element) => {
					element.classList.remove("wrong");
					element.classList.add("good");
				});
				confirmPasswordAlert.classList.remove("alert-warning");
				confirmPasswordAlert.classList.add("alert-success");
			} else {
				confirmPassword.classList.remove("is-valid");
				confirmPassword.classList.add("is-invalid");

				confirmPasswordAlert.classList.add("alert-warning");
				confirmPasswordAlert.classList.remove("alert-success");

				if (samePassBoolean == false) {
					samePass.classList.add("wrong");
					samePass.classList.remove("good");
				} else {
					samePass.classList.add("good");
					samePass.classList.remove("wrong");
				}
			}
		}
	});
</script>

<?php
	if (isset($_POST['submit_accountdetails']))
	{
		$id = $_SESSION["customer_id"];
		$name = $_POST['name_edit'];
		$phone = $_POST['phone_edit'];

		mysqli_query($connect,"UPDATE customer SET cus_name = '$name', cus_phone = '$phone' WHERE cus_id = '$id'");

		echo '
			<script>
				Swal.fire(
					"Account Details Updated!",
					"",
					"success"
				).then(() => window.location.href = "my-account.php?goto=tab-account");
			</script>
		';
	}

	if (isset($_POST['submit_shipping']))
	{
		$id = $_SESSION["customer_id"];
		$address = $_POST['address_edit'];
		$city = $_POST['city_edit'];
		$state = $_POST['state_edit'];
		$postcode = $_POST['postcode_edit'];

		mysqli_query($connect,"UPDATE customer SET cus_address='$address', cus_city='$city', cus_state='$state', cus_postcode='$postcode' WHERE cus_id = '$id' ");

		echo '
			<script>
				Swal.fire(
					"Change successfull!",
					"",
					"success"
				).then(() => window.location.href = "my-account.php?goto=tab-address");	
			</script>
		';
	}

	if (isset($_POST['reset_password']))
	{
		$id = $_SESSION["customer_id"];
		$old_pass = $_POST['old_password'];
		$new_pass = $_POST['new_password'];
		$con_new_pass = $_POST['new_comfirm_password'];
		
		$getCustomerQuery = mysqli_query($connect, "SELECT * FROM customer WHERE cus_id = '$id'");
		$custResult = mysqli_fetch_assoc($getCustomerQuery);

		if (strtoupper(md5($old_pass)) == $custResult['cus_pass']) {
			
			if ($new_pass != $old_pass) {
				mysqli_query($connect,"UPDATE customer SET cus_pass = '".strtoupper(md5($new_pass))."' WHERE cus_id = '$id'");
				
				$email = $custResult['cus_email'];
				$subject = "Change Password Successful!";
				$message = "Dear ".$custResult['cus_name'].",\n\nYour password has been change. \n\nRegards,\n4People Telco";
				$headers = "From: 4People Telco" . "\r\n";
				
				if (mail($email, $subject, $message, $headers)) {
					echo "
						<script>
							Swal.fire(
								'Change successfull!',
								'',
								'success'
							).then(() => window.location.href = 'my-account.php');	
						</script>
					";
				}
				
			} else {
?>
					<script>
						Swal.fire(
							'Something wrong!',
							'New password cannot same as current password!',
							'warning'
						).then(() => window.location.href = "my-account.php?goto=tab-reset-password");		
					</script>
<?php
			}
		} else {
?>
				<script>
					Swal.fire(
						'Something wrong!',
						'Password does not match with record!',
						'warning'
					).then(() => window.location.href = "my-account.php?goto=tab-reset-password");
				</script>
<?php
		}
	}

	if (isset($_GET['goto']))
	{
		$go = $_GET['goto'];

		echo $go;
?>
		<script>
			$('a[href="#<?php echo $go; ?>"]').tab('show');
		</script>
<?php
	}
?>