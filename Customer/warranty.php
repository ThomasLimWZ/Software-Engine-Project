<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Warranty</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Warranty</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
		
		    <div class="container">
                <br>
                    <h4><b>Declaration</b></h4>
                    <p>If the product is damaged due to accidents or human actions, such as falling, improper input voltage, excessive squeeze, product immersion, damage to the power cord, or breakage. We will not responsible for it.</p>
                <br>
                <h4><b>Defective Items</b></h4>
                <p>
                    Individual product will have its own manufacturer warranty period & each product 
                    will have its warranty period judged individually, 
                    irrespective of if the products were originally ordered in a group.
                </p>
                <br>
                <br><br>
                <h4><b>Apple / Samsung / Huawei Branded Products</b></h4>
                <p>
                    If you discover what is believe to be a product defect for any of the branded product
                    that you have purchased above, please contact us.
                </p>
                <br>
                <p>
                    Such a defect, if any, is covered under the terms of your product’s warranty. 
                    Please refer to the warranty information and other supporting documentation that came with your product.
                </p>
                <br>
		    </div>
            <hr class="mb-2">
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