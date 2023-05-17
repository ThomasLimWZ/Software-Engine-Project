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
		animation: loding 1s infinite;
	}
	
	@keyframes loding {
		0%   { width: 0%; background-color: #c96;}
		100% { width: 90%; background-color: #c96; }
	}
</style>
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
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
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
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="#">Sign Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

										<div class="card shadow-0 border mb-4">
											<div class="card-body">
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<h4 class="text-muted mb-0">INVOICE #123456</h4>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex ">
														<p class="text-muted mb-0 small"><b>RM 10000</b></p>

													</div>
												</div>
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<p class="text-muted mb-0">Created:<br> <b>2023-5-17</b></p>
													</div>
													<div class="col-md-10" style="text-align:right;">
														<a href="order-details.php?details&code=" class="btn btn-primary" style="border-radius:10px; color:white;">Show Details</a>
													</div>
												</div>
												<hr class="mb-2" style="background-color: #e0e0e0; opacity: 1;">
												<div class="row d-flex align-items-center" >
												<div style="width:100%;z-index:1;">
													<ul class="progressbar">
														<li class="active load">Preparing</li>
														<li >Shipped Out</li>
														<li >Out of Delivering</li>
														<li >Delivered</li>
													</ul>
												</div>
										
												
												</div>
											</div>
										</div>
										<div class="card shadow-0 border mb-4">
											<div class="card-body">
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<h4 class="text-muted mb-0">INVOICE #123456</h4>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex ">
														<p class="text-muted mb-0 small"><b>RM 10000</b></p>

													</div>
												</div>
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<p class="text-muted mb-0">Created:<br> <b>2023-5-17</b></p>
													</div>
													<div class="col-md-10" style="text-align:right;">
														<a href="order-details.php?details&code=" class="btn btn-primary" style="border-radius:10px; color:white;">Show Details</a>
													</div>
												</div>
												<hr class="mb-2" style="background-color: #e0e0e0; opacity: 1;">
												<div class="row d-flex align-items-center" >
												<div style="width:100%;z-index:1;">
													<ul class="progressbar">
														<li class="active ">Preparing</li>
														<li class="active load ">Shipped Out</li>
														<li >Out of Delivering</li>
														<li >Delivered</li>
													</ul>
												</div>
										
												
												</div>
											</div>
										</div>
										<div class="card shadow-0 border mb-4">
											<div class="card-body">
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<h4 class="text-muted mb-0">INVOICE #123456</h4>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex ">
														<p class="text-muted mb-0 small"><b>RM 10000</b></p>

													</div>
												</div>
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<p class="text-muted mb-0">Created:<br> <b>2023-5-17</b></p>
													</div>
													<div class="col-md-10" style="text-align:right;">
														<a href="order-details.php?details&code=" class="btn btn-primary" style="border-radius:10px; color:white;">Show Details</a>
													</div>
												</div>
												<hr class="mb-2" style="background-color: #e0e0e0; opacity: 1;">
												<div class="row d-flex align-items-center" >
												<div style="width:100%;z-index:1;">
													<ul class="progressbar">
														<li class="active ">Preparing</li>
														<li class="active ">Shipped Out</li>
														<li class="active load">Out of Delivering</li>
														<li >Delivered</li>
													</ul>
												</div>
										
												
												</div>
											</div>
										</div>
										<div class="card shadow-0 border mb-4">
											<div class="card-body">
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<h4 class="text-muted mb-0">INVOICE #123456</h4>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex justify-content-center align-items-center">
														<p class="text-muted mb-0 small"></p>
													</div>
													<div class="col-md-2 text-center d-flex ">
														<p class="text-muted mb-0 small"><b>RM 10000</b></p>

													</div>
												</div>
												<div class="row" style="padding-top:10px; font-size:18pt;">
													<div class="col-md-2">
														<p class="text-muted mb-0">Created:<br> <b>2023-5-17</b></p>
													</div>
													<div class="col-md-10" style="text-align:right;">
														<a href="order-details.php?details&code=" class="btn btn-primary" style="border-radius:10px; color:white;">Show Details</a>
													</div>
												</div>
												<hr class="mb-2" style="background-color: #e0e0e0; opacity: 1;">
												<div class="row d-flex align-items-center" >
												<div style="width:100%;z-index:1;">
													<ul class="progressbar">
														<li class="active ">Preparing</li>
														<li class="active ">Shipped Out</li>
														<li class="active">Out of Delivering</li>
														<li class="active">Delivered</li>
													</ul>
												</div>
										
												
												</div>
											</div>
										</div>

								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.php" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

														<p>User Name<br>
														User Company<br>
														John str<br>
														New York, NY 10001<br>
														1-234-987-6543<br>
														yourmail@mail.com<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

														<p>You have not set up this type of address yet.<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#">
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

		            						<label>Display Name *</label>
		            						<input type="text" class="form-control" required>
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
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
</body>

</html>