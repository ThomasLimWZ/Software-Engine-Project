<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="#">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>First Name *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	            						<label>Company Name (Optional)</label>
	            						<input type="text" class="form-control">

	            						<label>Country *</label>
	            						<input type="text" class="form-control" required>

	            						<label>Street address *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" required>
	            						<input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>State / County *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" class="form-control" required>

	        							<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc">
											<label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
										</div><!-- End .custom-checkbox -->

										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-diff-address">
											<label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
										</div><!-- End .custom-checkbox -->

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
		                						<tr>
		                							<td><a href="#">Beige knitted elastic runner shoes</a></td>
		                							<td>RM 84.00</td>
		                						</tr>

		                						<tr>
		                							<td><a href="#">Blue utility pinafore denimdress</a></td>
		                							<td>RM 76.00</td>
		                						</tr>
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>RM 160.00</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>Free shipping</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>RM 160.00</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
														<img src="assets/images/payment-visa.jpg" alt="payments cards">
														Visa
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
		
										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-4">
										                <img src="assets/images/payment-master.png" alt="payments cards">    
														Master													
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-5">
										                <img src="assets/images/payment-fpx.jpg" alt="payments cards">    
														FPX
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
											
										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" data-toggle="modal" data-target="#staticBackdrop">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
										<!-- Modal -->
										<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
											<div class="modal-dialog"> 
												<div class="modal-content"> 
													<div class="modal-body"> 
														<div class="text-right"> 
															<i class="fa fa-close close" data-dismiss="modal"></i> 
														</div> 
														<div class="tabs mt-5"> 
															<ul class="nav nav-tabs" id="myTab" role="tablist"> 
																<li class="nav-item" role="presentation"> 
																	<a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
																		<img src="assets/images/visa-modal.png" width="80"> 
																	</a> 
																</li> 
																<li class="nav-item" role="presentation"> 
																	<a class="nav-link middle" id="master-tab" data-toggle="tab" href="#master" role="tab" aria-controls="master" aria-selected="true">
																		<img src="assets/images/master-modal.png" width="80"> 
																	</a> 
																</li> 
																<li class="nav-item" role="presentation"> 
																	<a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> 
																		<img src="assets/images/payment-fpx.jpg" width="80"> 
																	</a> 
																</li> 
															</ul> 
															<div class="tab-content" id="myTabContent"> 
																<div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab"> 
																	<div class="mt-4 mx-4"> 
																		<div class="text-center"> 
																			<h5>Credit card</h5> 
																		</div> 
																		<div class="form mt-3"> 
																			<div class="inputbox"> 
																				<input type="text" name="name" class="form-control" required="required"> 
																				<span>Cardholder Name</span>
																			</div> 
																			<div class="inputbox"> 
																				<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																				<span>Card Number</span> <i class="fa fa-eye-slash" id="toggleCardNumber1"></i> 
																			</div> 
																			<div class="d-flex flex-row"> 
																				<div class="inputbox"> 
																					<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																					<span>Expiration Date</span> 
																				</div> 
																				<div class="inputbox">
																					<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																					<span>CVV</span>
																				</div> 
																			</div> 
																			<div class="px-5 pay">
																				<button type="submit" class="btn btn-success btn-block">Pay</button> 
																			</div> 
																		</div> 
																	</div> 
																</div> 
																<div class="tab-pane fade" id="master" role="tabpanel" aria-labelledby="master-tab"> 
																	<div class="mt-4 mx-4"> 
																		<div class="text-center"> 
																			<h5>Master card</h5> 
																		</div> 
																		<div class="form mt-3"> 
																			<div class="inputbox"> 
																				<input type="text" name="name" class="form-control" required="required"> 
																				<span>Cardholder Name</span>
																			</div> 
																			<div class="inputbox"> 
																				<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																				<span>Card Number</span> <i class="fa fa-eye-slash" id="toggleCardNumber2"></i> 
																			</div> 
																			<div class="d-flex flex-row"> 
																				<div class="inputbox"> 
																					<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																					<span>Expiration Date</span> 
																				</div> 
																				<div class="inputbox">
																					<input type="text" name="name" min="1" max="999" class="form-control" required="required"> 
																					<span>CVV</span>
																				</div> 
																			</div> 
																			<div class="px-5 pay">
																				<button class="btn btn-success btn-block">Pay</button> 
																			</div> 
																		</div> 
																	</div> 
																</div> 
																<div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab"> 
																<div class="mt-4 mx-4">	
																	<div class="text-center"> 
																			<h5>Online Bank</h5> 
																		</div>	
																		<div class="px-5 mt-5"> 
																			<div class="inputbox"> 
																				<input type="text" name="name" class="form-control" required="required"> 
																				<span>Username</span>
																			</div> 
																			<div class="inputbox"> 
																				<input type="text" name="name" class="form-control" required="required"> 
																				<span>Password</span><i class="fa fa-eye-slash" id="toggleBankPassword"></i>
																			</div> 
																			<div class="pay px-5">
																				<button class="btn btn-primary btn-block">Pay</button> 
																			</div> 
																		</div> 
																	</div> 
																</div>
															</div> 
														</div> 
													</div> 
												</div> 
											</div>
										</div>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
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
	<!-- Modal File-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
</body>

</html>