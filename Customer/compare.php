<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>	

<head>
	<style>
		@media screen and (max-width: 430px){
			select.form-control{
				width: 80%!important;
			}
		}
	</style>
</head>

<body>
<div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Compare<span>Product</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compare</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

			<div class="container">
				
					<div class="my-4 mx-auto">
						<h2 class="text-center">Choose Your Favourite</h2>

						
							<div class="col-lg-12 mt-5">
								<div class="table-responsve overflow-scroll">
								<table class="table table-striped table-hover">
								<thead class="thead-inverse">
									<tr>
										<th class="w-25"></th>
										<th class="d-flex justify-content-xl-center">
										<select class="form-control w-50">
											<option>-- Select Product --</option>
											<option class="option">Apple</option>
											<option class="option">Huawei</option>
											<option class="option">XiaoMi</option>
											<option class="option">Samsung</option>
										</select>
										
										</th>
										<th class="">
										<select class="form-control w-50" style="display: inherit"> 
											<option>-- Select Product --</option>
											<option class="option">Apple</option>
											<option class="option">Huawei</option>
											<option class="option">XiaoMi</option>
											<option class="option">Samsung</option>
										</select>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<td class="w-25 font-weight-bold">Product Name</td>
									<td class="">Apple</td>
									<td class="">Huawei</td>
									
									</tr>
									<tr>
									<td class="font-weight-bold">Price</td>
									<td>RM 1999.00</td>
									<td>RM 1499.00</i></td>
									
									</tr>
									<tr>
									<td class="font-weight-bold">Product Image</td>
									<td>-</td>
									<td><i class="fa fa-check"></i></td>
									
									</tr>
									<tr>
									<td class="font-weight-bold">Others</td>
									<td><i class="fa fa-check"></i></td>
									<td><i class="fa fa-check"></i></td>
									
								</tbody>
								<tfoot class="thead-inverse">
									<tr>
										<th class="w-25"></th>
										<th class=""><button class="btn btn-primary">Add To Cart</button></th>
										<th class=""><button class="btn btn-primary">Add To Cart</button></th>
										
									</tr>
								</tfoot>
								</table>
							</div>
							</div>
						
					</div>
				
			</div>
			<hr>
		</main>
</div>
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
	<!-- fa fa icon link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>