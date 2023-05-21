<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Forgot Password</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<div id="enter_email" style="margin:auto; padding:2%; width:40%">
	                			<form action="" method="POST">
									<div class="form-group">
                                        <label for="forgot_pass_email">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="forgot_pass_email" name="forgot_pass_email" required 
											value="<?php echo isset($_POST["forgot_pass_email"]) ? $_POST["forgot_pass_email"] : ''; ?>">
										<span id="show-error-message" class="text-danger d-none">Your email is not been registered.</span>
                                    </div><!-- End .form-group -->
									<div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" name="forgot_pass_email_next">
                                            <span>Send Reset Password Link</span>
                                            <i class="icon-long-arrow-right"></i>                                       
										</button>
                                       
                                    </div><!-- End .form-footer -->
								</form>
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
</body>

</html>

<?php
if (isset($_POST['forgot_pass_email_next'])) {
	$email = $_POST['forgot_pass_email'];

	$data_check = mysqli_query($connect,"SELECT * FROM customer WHERE cus_email = '$email' ");
	$check = mysqli_num_rows($data_check);

	if ($check == 1) {
		$data_get = mysqli_fetch_assoc($data_check);
		$cus_name = $data_get['cus_name'];
		$cus_id = $data_get['cus_id'];
		$_SESSION['reset_customer_id'] = $cus_id;
		$_SESSION['valitation_code'] = sent_random_code_email($cus_id,$connect);

		echo "<script>window.location.assign('validate-email-code.php');</script>";
	} else {
		echo "
			<script>
				Swal.fire(
					'Email Not Found!',
					'This email is not been registered',
					'error'
				);
				$('#forgot_pass_email').addClass('is-invalid');
				$('#show-error-message').removeClass('d-none');
			</script>
		";
	}
}

function sent_random_code_email($cus_id,$connect)
{
	$data_check = mysqli_query($connect,"SELECT * FROM customer WHERE cus_id = '$cus_id'");
	$data_get = mysqli_fetch_assoc($data_check);

	$name = $data_get['cus_name'];
	$cus_id = $data_get['cus_id'];
	$email = $data_get['cus_email'];

    $code = rand(999999,111111);
    $subject = "Password Reset Code";
    $message = '
			<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
			<head>
			<title></title>
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
			<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
			<style>
				h3
				{
					font-family: times new roman;
				}
			</style>
			</head>

			<body >
				<div style="width: 400px;border: 1px solid black;margin:auto;background-color: #F7E381;padding: 20px;">
					<div align="center"><span style="font-size:20pt;background-color:#E3C327 ;color: white;border-color: #fff ;border: 2px solid #EDF1FF;padding:6px 10px">4People Telco</span></div>
				
					<h3>Dear <span style="font-weight: bolder;text-decoration: underline;color:black;">'.$name.'</span>,</h3>
						<span style="font-size: 13pt;">Your validation code is <span style="font-size: 16pt;font-weight: bold;color: black;text-decoration: underline;">'.$code.'</span></span>
					<br><br>
					<p style="margin: 0; font-size: 12pt; mso-line-height-alt: 21px;">For any question.Please email to 4peoplestelco@gmail.com .<br>Thanks for visting at our 4People Telco.</p>
				</div>
			</body>
		</html>';

    $from = '4peoplestelco@gmail.com'; 
    $fromName = '4People Telco'; 
    
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    // Additional headers 
    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

        if(mail($email, $subject, $message, $headers))
        {           
            return $code;			
        }
        else
        {
			echo "
				<script>
					Swal.fire(
						'Sorry, unable to send mail...',
						'This email is not been registered',
						'error'
					);
				</script>
			";
        }
}
?>