<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url('assets/images/contact-header-bg.jpg')">
        			<h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                			<p class="mb-3">Below is our contact way. Feel free to contact us if meet any confuse.</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>The Office</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							Multimedia University, Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka, Malaysia
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:6011-10612839">+6011-1061 2839</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto: 4peoplestelco@gmail.com">4peoplestelco@gmail.com</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<h3>Operating Hours</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-clock-o"></i>
	                							<span class="text-dark">Monday - Sunday<br>09.00AM - 18.00PM</span>
	                						</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
							<p>You may click the Frequently Asked Question to solve your question. <a href="faq.php">Know More</a></p>
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
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

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

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