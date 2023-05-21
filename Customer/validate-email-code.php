<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>

<style>
	.otc {
		position: relative;
		width: 320px;
		margin: 0 auto;
	}

	.otc fieldset {
		border: 0;
		padding: 0;
		margin: 0;
	}

	.otc fieldset div {
		display: flex;
		align-items: center;
	}

	.otc legend {
		margin: 0 auto 1em;
		color: black;
	}

	.enter_code input[type="number"] {
		width: 100%;
		line-height: 1;
		margin: .1em;
		padding:2% 4%;
		font-size: 2em;
		text-align: center;
		appearance: textfield;
		-webkit-appearance: textfield;
		border: 2px solid #dadada;
		color: black;
		border-radius: 4px;
	}
	.enter_code input[type="number"]:focus{
		color:#777;
		background-color:#fff;
		border-color:#c96;
		box-shadow:none;
		outline:none !important;
	}
	
	.enter_code input::-webkit-outer-spin-button,
	.enter_code input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	/* 2 group of 3 items */
	.enter_code input[type="number"]:nth-child(n+4) {
		order: 2;
	}
	

	.otc label {
		border: 0 !important;
		clip: rect(1px, 1px, 1px, 1px) !important;
		-webkit-clip-path: inset(50%) !important;
		clip-path: inset(50%) !important;
		height: 1px !important;
		margin: -1px !important;
		overflow: hidden !important;
		padding: 0 !important;
		position: absolute !important;
		width: 1px !important;
		white-space: nowrap !important;
	}
</style>

<body>
    <div class="page-wrapper">
        <?php include('header.php') ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg');">
        		<div class="container">
        			<h1 class="page-title">Validate Code for Email</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="forget-password.php">Forgot Password</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Validate Code</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
							<div id="enter_code" style="margin: auto; padding: 2%; width: 60%;" class="enter_code">
								<form class="otc" name="one-time-code" method="post" style="width: 80%；">
									
									Dear <span id="validation_name" class="font-weight-bold"></span> ,<br> Validate code has been sent to <span id="validation_email" class="font-weight-bold"></span>!
									<br><br>
									
									<fieldset style="width: 60%；">
										<legend>Enter Code</legend>
										<label for="otc-1">Number 1</label>
										<label for="otc-2">Number 2</label>
										<label for="otc-3">Number 3</label>
										<label for="otc-4">Number 4</label>
										<label for="otc-5">Number 5</label>
										<label for="otc-6">Number 6</label>

										<div>
											<input type="number" pattern="[0-9]*"  value="" inputtype="numeric" autocomplete="one-time-code" id="otc-1" require name="code1">

											<!-- Autocomplete not to put on other input -->
											<input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-2" require name="code2">
											<input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-3" require name="code3">
											<input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-4" require name="code4">
											<input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-5" require name="code5"> 
											<input type="number" pattern="[0-9]*" min="0" max="9" maxlength="1"  value="" inputtype="numeric" id="otc-6" require name="code6">
										</div>
									</fieldset>
									<br>
									<span id="show_word" class="d-none" style="width: fit-content;">Didn't recieve code? <a id="resent_btn" value="resent" name="resent_email_btn" href="?resentpass">Resend code</a></span>
									<span id="coutdown"> Remaining <span id="countdowntimer">30 </span> Seconds to <a disabled id="resent_btn" style="text-decoration: underline;" >Resend code</a></span> 
									<div class="form-footer">
										<button type="submit" class="btn btn-outline-primary-2" name="forgot_pass_code_next">
											<span>Next</span>
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

	<!-- use for the validation code -->
	<script>
        function opentimeresent() {
            var timeleft = 30;
            var downloadTimer = setInterval(() => {
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
            if(timeleft <= 0){
                clearInterval(downloadTimer);
				$('#coutdown').addClass('d-none');
				$('#show_word').removeClass('d-none');
            }
            }, 1000);
        }

		let in1 = document.getElementById('otc-1'),
		ins = document.querySelectorAll('input[type="number"]'),
		splitNumber = function(e) {
			let data = e.data || e.target.value; // Chrome doesn't get the e.data, it's always empty, fallback to value then.
			if ( ! data ) return; // Shouldn't happen, just in case.
			if ( data.length === 1 ) return; // Here is a normal behavior, not a paste action.
			
			popuNext(e.target, data);
			//for (i = 0; i < data.length; i++ ) { ins[i].value = data[i]; }
		},
		popuNext = function(el, data) {
			el.value = data[0]; // Apply first item to first input
			data = data.substring(1); // remove the first char.
			if ( el.nextElementSibling && data.length ) {
				// Do the same with the next element and next data
				popuNext(el.nextElementSibling, data);
			}
		};

        ins.forEach(function(input) {
            /**
             * Control on keyup to catch what the user intent to do.
             * I could have check for numeric key only here, but I didn't.
             */
            input.addEventListener('keyup', function(e){
                // Break if Shift, Tab, CMD, Option, Control.
                if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
                    return;
                }
                
                // On Backspace or left arrow, go to the previous field.
                if ( (e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT" ) {
                    this.previousElementSibling.select();
                } else if (e.keyCode !== 8 && this.nextElementSibling) {
                    this.nextElementSibling.select();
                }
                
                // If the target is populated to quickly, value length can be > 1
                if ( e.target.value.length > 1 ) {
                    splitNumber(e);
                }
            });
            
            /**
             * Better control on Focus
             * - don't allow focus on other field if the first one is empty
             * - don't allow focus on field if the previous one if empty (debatable)
             * - get the focus on the first empty field
             */
            input.addEventListener('focus', function(e) {
                // If the focus element is the first one, do nothing
                if ( this === in1 ) return;
                
                // If value of input 1 is empty, focus it.
                if ( in1.value == '' ) {
                    in1.focus();
                }
                
                // If value of a previous input is empty, focus it.
                // To remove if you don't wanna force user respecting the fields order.
                if ( this.previousElementSibling.value == '' ) {
                    this.previousElementSibling.focus();
                }
            });
        });

        /**
         * Handle copy/paste of a big number.
         * It catches the value pasted on the first field and spread it into the inputs.
         */
        in1.addEventListener('input', splitNumber);

	</script>
    <?php
if(!isset($_SESSION['reset_customer_id']) && !isset($_SESSION['valitation_code']) ){
    
    ?>
    <script>
        window.location.assign("index.php");
    </script>
    <?php
}
else
{
    $customer_id=$_SESSION['reset_customer_id'];
    $query = "SELECT * FROM customer WHERE cus_id='$customer_id' ";
    $result = mysqli_query($connect, $query);
    $result_data = mysqli_fetch_assoc($result);

    ?>
        <script>
            opentimeresent();
            document.getElementById("validation_name").innerHTML= "<?php echo $result_data['cus_name']; ?>"
            document.getElementById("validation_email").innerHTML= "<?php echo $result_data['cus_email']; ?>"
        </script>

    <?php
    
}


function sent_random_code_email($cus_id,$connect)
{
	$data_check = mysqli_query($connect,"SELECT * FROM customer WHERE cus_id='$cus_id' ");
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
				<div style="width: 400px; border: 1px solid black; margin:auto; background-color: #F7E381;padding: 20px;">
					<div align="center"><span style="font-size:20pt; background-color:#E3C327; color: white; border-color: #fff; border: 2px solid #EDF1FF; padding:6px 10px;">4People Telco</span></div>
				
					<h3>Dear <span style="font-weight: bolder; text-decoration: underline; color:black;">'.$name.'</span>,</h3>
						<span style="font-size: 13pt;">Your validation code is <span style="font-size: 16pt; font-weight: bold; color: black; text-decoration: underline;">'.$code.'</span></span>
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

        if(mail($email, $subject, $message,$headers))
        {           
            return $code;
			
        }
        else
        {
			echo  "<script>Swal.fire({
                title: 'Sorry, unable to send mail...',
                icon: 'error',
                button: 'OK',
                }).then(() => window.location.href='forgot-password.php');
				</script>";
        }
}

if(isset($_POST['forgot_pass_code_next']))
{
	$randomcode = $_SESSION['valitation_code'];
	$user_input_code = $_POST['code1'].$_POST['code2'].$_POST['code3'].$_POST['code4'].$_POST['code5'].$_POST['code6'];

    
	if($randomcode == $user_input_code)
	{
		unset($_SESSION['valitation_code']);
		?>
			<script>
				window.location.assign("reset-password.php");
			</script>
		<?php
		
	}
	else
	{
		?>
		<script>
		Swal.fire({
			title: 'Invalid Code.',
			icon: 'error',
			button: 'OK',
			})
			
			</script>
		<?php
	}
}
else{
    echo "error place";
}


if(isset($_GET['resentpass'])){
    $cus_id = $_SESSION['reset_customer_id'];
    $_SESSION['valitation_code'] = sent_random_code_email($cus_id, $connect);
    ?>
        <script>
            opentimeresent();          
            window.location.assign("validate-email-code.php");
        </script>
    <?php
	
}
?>
</body>

</html>


