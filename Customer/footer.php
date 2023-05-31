
<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="assets/images/Logo/Black logo - no background.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <div class="social-icons mb-2">
                            <a href="https://www.facebook.com/weezheng.weezheng/" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="https://www.instagram.com/wee_zheng/" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UC7tsepq8SJhD9q-peIOGzxA" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        </div><!-- End .soial-icons -->

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us!
                            <a href="tel:#">+60 11-1061 2839</a>         
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="about.php">About 4People Telco</a></li>
                            <li><a href="our-services.php">Our Services</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact.php">Contact us</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="warranty.php">Warranty</a></li>
                            <li><a href="shipping.php">Shipping</a></li>
                            <li><a href="t&c.php">Terms and conditions</a></li>
                            <li><a href="policy.php">Privacy Policy</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                
                <?php
                if (isset($_SESSION["customer_id"])) {
                ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="my-account.php">Profile</a></li>
                                <li><a href="cart.php">View Cart</a></li>
                                <li><a href="my-account.php">My Order</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                <?php
                }
                ?>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2023 4People Telco. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="assets/images/payments.png" alt="Payment methods" style="height: 40px;">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->