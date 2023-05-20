<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
				<br>
				<hr class="mb-2">
				<h1 style="text-align:center;"><b>F.A.Q</b></h1>
				<hr class="mb-2">
				<br>
                	<h2 class="title text-center mb-3">My Account</h2><!-- End .title -->
        			<div class="accordion accordion-rounded" id="accordion-1">
					<div class="card card-box card-sm bg-light">

					        <div class="card-header" id="heading-1">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
					                    How to register for an account?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-1">
					            <div class="card-body">
								Simply click the “Sign in/Sign Up” button at right top and it will bring you to the Sign in page. Then, click the “Register” to fill in your details accordingly and click “Sign Up”.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading-2">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										I forgot password, what should I do?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
					            <div class="card-body">
									Simply click the “Sign in/Sign Up” button at right top and then click “Forget Your Password?”. Then, enter your email address and click “ Reset My Password and you will receive an email regarding your reset password.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading-3">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
										How do I change my personal information of my account?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-1">
					            <div class="card-body">
									First, you should login your account then click the “Profile” at the right top. Then click “My Account” and you can change your details by click according edit buttons.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->
					</div><!-- End .accordion -->

                	<h2 class="title text-center mb-3">Orders and Payment</h2><!-- End .title -->
        			<div class="accordion accordion-rounded" id="accordion-2">
					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-1">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
										How do I place an order?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-1" class="collapse" aria-labelledby="heading2-1" data-parent="#accordion-2">
					            <div class="card-body">
									Simply login your account and select the product(s) that you like to purchase and add them into cart. Then fill in your delivery details if you never fill in before, and then proceed to checkout and make the payment.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-2">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
										Will I receive any order confirmation after placing an order?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2" data-parent="#accordion-2">
					            <div class="card-body">
									Yes, a confirmation email will be sent once completed payment.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-3">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
										What can I do after ordered and completed payment?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3" data-parent="#accordion-2">
					            <div class="card-body">
									A tracking number of package will given when the order is delivered then just waiting the package deliver to your home!
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

						<div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-4">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">
										If I added the item in my cart, does it confirm as my booking?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-4" class="collapse" aria-labelledby="heading2-4" data-parent="#accordion-2">
					            <div class="card-body">
									No, item added to cart is not confirmed as a booking item.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

						<div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-5">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-5" aria-expanded="false" aria-controls="collapse2-5">
										What are the payment methods available?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-5" class="collapse" aria-labelledby="heading2-5" data-parent="#accordion-2">
					            <div class="card-body">
									The payment options available are by debit or credit card.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->
								
						<div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading2-6">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-6" aria-expanded="false" aria-controls="collapse2-6">
										Which credit/debit card are accepted for payment?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse2-6" class="collapse" aria-labelledby="heading2-6" data-parent="#accordion-2">
					            <div class="card-body">
									All credit/debit cards from Malaysia banks are accepted.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					</div><!-- End .accordion -->

                	<h2 class="title text-center mb-3">SHIPPING & DELIVERY</h2><!-- End .title -->
                	<div class="accordion accordion-rounded" id="accordion-3">
					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading3-1">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
										How do I track my order status?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse3-1" class="collapse" aria-labelledby="heading3-1" data-parent="#accordion-3">
					            <div class="card-body">
									Simply login your account and click the “Profile”. After that, click “My Orders” at the right top and your order status will be displayed in the page.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading3-2">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
										What shipping options offer by 4People Telco?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion-3">
					            <div class="card-body">
									We only offer home delivery services.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading3-3">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
										What are the delivery fees?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion-3">
					            <div class="card-body">
									Delivery is free for all orders.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading3-4">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-4" aria-expanded="false" aria-controls="collapse3-4">
										How many days to receive my order?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse3-4" class="collapse" aria-labelledby="heading3-4" data-parent="#accordion-3">
					            <div class="card-body">
									West Malaysia : 3 to 7 working days<br>
									East Malaysia : 7 to 14 working days
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

						<div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading3-5">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-5" aria-expanded="false" aria-controls="collapse3-5">
										Can I change my delivery address after my purchase?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse3-5" class="collapse" aria-labelledby="heading3-5" data-parent="#accordion-3">
					            <div class="card-body">
									Yes, the delivery address can be changed before the order send out by send an email to 4PeoplesTelco@gmail.com.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->
					</div><!-- End .accordion -->

					<h2 class="title text-center mb-3">CANCELLATIONS, RETURN, REFUND AND EXCHANGE</h2><!-- End .title -->
                	<div class="accordion accordion-rounded" id="accordion-4">
					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading4-1">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse4-1" aria-expanded="false" aria-controls="collapse4-1">
										Can I cancel my order?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse4-1" class="collapse" aria-labelledby="heading4-1" data-parent="#accordion-4">
					            <div class="card-body">
									No, the canceled order is not be approved.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading4-2">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse4-2" aria-expanded="false" aria-controls="collapse4-2">
										For which reasons can I return an item or refund or exchange?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse4-2" class="collapse" aria-labelledby="heading4-2" data-parent="#accordion-4">
					            <div class="card-body">
									Damaged/incorrect/missing/defective items or part inside items can be return/refund/exchange.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading4-3">
					            <h2 class="card-title">
					                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse4-3" aria-expanded="false" aria-controls="collapse4-3">
										How do I do for return item or make a refund or exchange?
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse4-3" class="collapse" aria-labelledby="heading4-3" data-parent="#accordion-4">
					            <div class="card-body">
									You should contact our customer careline or email and we will arrange our delivery courier to collect the item from you.
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->

                </div><!-- End .container -->
            </div><!-- End .page-content -->

            <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(assets/images/backgrounds/cta/bg-7.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-9 col-xl-7">
                            <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                <div class="col">
                                    <h3 class="cta-title text-white">If You Have More Questions</h3><!-- End .cta-title -->
                                    <p class="cta-desc text-white">Welcome to contact 4People Telco</p><!-- End .cta-desc -->
                                </div><!-- End .col -->

                                <div class="col-auto">
                                    <a href="contact.php" class="btn btn-outline-white"><span>CONTACT US</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .col-auto -->
                            </div><!-- End .row no-gutters -->
                        </div><!-- End .col-md-10 col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
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


<!-- molla/faq.php  22 Nov 2019 10:04:04 GMT -->
</html>