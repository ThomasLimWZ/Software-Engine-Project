<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">About us</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <br>
            <div class="page-content pb-3">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="about-text text-center mt-3">
                                
                                <h2 class="title text-center mb-2" style="font-size:25px;">We are 4People Telco</h2><!-- End .title text-center mb-2 -->
                                    
                                <p style="font-size:18px; font-family: 'Caveat', cursive;">What brought us here? Our journey began in 2023 as a small group of friends, 
                                    <br>with a great aim that is share the latest technology products with excellent quality and value to people.
                                </p>
                                <br>
                                <p style="font-size:19px; font-family: 'Caveat', cursive;">With this aim, this website was born to make technology products available online. 
                                    <br>Thus, all Malaysian can purchase our great quality products from renowned brands on this website.
                                </p>
                                <br>
                                <p style="font-size:18px; font-family: 'Caveat', cursive;">
                                    4People Telco has a global supply chain to undertake exceptional quality control to get you 
                                    <br>the product you want with the peace of mind for a positive consumer experience.
                                </p>

                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->

                    <h2 class="title text-center mb-4" style="font-family: 'Kanit', sans-serif;">Our Mission and Vision</h2>
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Design Quality</h3><!-- End .icon-box-title -->
                                    <p>Design can be art. Design can be aesthetics.<br><p style="font-family: 'Dancing Script', cursive;">Design is simple.</p></p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Professional Support</h3><!-- End .icon-box-title -->
                                    <p>To offer rigorous training to support<br> professionals and enhance <br>the customer service experience. </p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Made With Love</h3><!-- End .icon-box-title -->
                                    <p>To always put people at the <br>center of what we do.</p> 
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
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

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>