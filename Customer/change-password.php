<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>
<style>
    #message1 {
    display:none;
    background-color:#f2f2f2;
    width:100%;
    height:auto;
    color: #000;
    padding: 20px;
    margin: 10px 0px;
    }

    #message1 p {
    padding: 5px 35px;
    font-size: 15px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
    color: green;
    }

    .valid:before {
    position: relative;
    left: -35px;
    content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
    color: red;
    }

    .invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
    }
</style>
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
                        <li class="breadcrumb-item"><a href="forgot-password.php">Forgot Password</a></li>
                        <li class="breadcrumb-item"><a href="check-get-code.php">Validate Code</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
							<div id="reset_password" style="margin:auto;padding:2%;width:50%;">
								<form action="#" method="post">
                                    <div class="form-group">
                                        <label for="new-password">New Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" id="new_password" minlength="8" style="float:left;" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%&()*+-/:;<=>?@[\]^_`{|}~]).{8,}" title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                        <br><i class="fa fa-eye-slash" id="show_password1" style="margin-left: -30px; margin-top:15px; cursor: pointer;"></i>
                                    </div><!-- End .form-group -->

                                    <div id="message1">
                                        <h5>Password must contain the following:</h5>
                                        <p id="letter1" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital1" class="invalid">A <b>uppercase</b> letter</p>
                                        <p id="number1" class="invalid">A <b>number</b></p>
                                        <p id="special1" class="invalid">A <b>special character </b> </p>
                                        <p id="special1" style="color:black">eg. #$%&()*+-/:;<=>?@[\]^_`{|}~</p>
                                        <p id="length1" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="new-password">New Confirm Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" id="new_com_password" minlength="8" style="float:left;" name="new_com_password" title="Fill up the password again" required>
                                        <br><i class="fa fa-eye-slash" id="show_password2" style="margin-left: -30px; margin-top:15px; cursor: pointer;"></i>
                                        <br><span id="checkPass1" style="color:red;"></span>
                                    </div><!-- End .form-group -->                                 

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" id="new-pass-btn" name="new-pass-btn">
                                            <span>Change</span>
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

    <script>
        //show the password    
        const show_password1 = document.querySelector('#show_password1');
        const new_password = document.querySelector('#new_password');

        show_password1.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = new_password.getAttribute('type') === 'password' ? 'text' : 'password';
            new_password.setAttribute('type', type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

        
        const show_password2 = document.querySelector('#show_password2');
        const new_com_password = document.querySelector('#new_com_password');

        show_password2.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = new_com_password.getAttribute('type') === 'password' ? 'text' : 'password';
            new_com_password.setAttribute('type', type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

        //end show password

        //start validation information
        var myInput = document.getElementById("new_password");
        var confirm = document.getElementById("new_com_password");
        var letter = document.getElementById("letter1");
        var capital = document.getElementById("capital1");
        var number = document.getElementById("number1");
        var length = document.getElementById("length1");
        var special = document.getElementById("special1");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
        document.getElementById("message1").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message1").style.display = "none";
        check_con_pass1()
        }

        //check the value between the password and comfimation password 
        confirm.onkeyup = function () {
            check_con_pass1()
        }
        
        function check_con_pass1() {
            if(myInput.value == confirm.value){
            document.getElementById('new-pass-btn').disabled=false;
            confirm.style.border = "1px solid #CCCCCC";
            document.getElementById('checkPass1').innerHTML="";
            }
            else{
                document.getElementById('new-pass-btn').disabled=true;
                confirm.style.border = "2px solid red";
                document.getElementById('checkPass1').innerHTML="•	Password not matched.";
            }
        }
        // Show the extra information - on typing
        myInput.onkeyup = function(){
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } 
        else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } 
        else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } 
        else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate special char
        var specials = /[ #$%&()*+-/:;<=>?@[\]^_`{|}~]/g;
        if(myInput.value.match(specials)) {  
            special.classList.remove("invalid");
            special.classList.add("valid");
        } 
        else {
            special.classList.remove("valid");
            special.classList.add("invalid");
        }
        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } 
        else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
        //end extra validation 
    
    </script>

</body>

</html>

<?php
if(!isset($_SESSION['reset_customer_id'])){
    ?>
    <script>
        window.location.assign("index.php");
    </script>
    <?php
}
if(isset($_POST["new-pass-btn"])){

	$new_pass = $_POST['new_password'];
	$new_cpass = $_POST['new_com_password'];
	
    $customer_id = $_SESSION['reset_customer_id'];

    $query = "SELECT * FROM customer WHERE cus_id='$customer_id' ";
    $result = mysqli_query($connect, $query);
    $result_data = mysqli_fetch_assoc($result);
	$email = $result_data['cus_email'];

	if($new_pass === $new_cpass){
        
        //hash the password to let the admin cant see the password at the database
        $hashpass = strtoupper(md5($new_pass));

		if(mysqli_query($connect,"UPDATE customer SET cus_pass='$hashpass ' WHERE cus_id = '$customer_id'")){
        
            $subject = "Registration Successful!";
            $message = "Dear ".$result_data['cus_name'].",\n\n Your Password have been changed successfully.\n\nTo sign in to your account, please visit our website or __LINK__ . Thank you. \n\nRegards,\n4 People Telco";
            $headers = "From: 4 People Telco" . "\r\n";
			
			if(mail($email,$subject,$message,$headers)) {
                unset($_SESSION["reset_customer_id"]);
                ?>
				<script>

                Swal.fire({title:" Password changed successfully.",
                    icon:"success",
                    
                    button:"Ok"}).then(() => window.location.href='index.php');
                
				</script>
                <?php
                
            }
            else {
                echo  "<script>Swal.fire({
                title: 'Sorry, unable to send mail...',
                icon: 'error',
                button: 'OK',
                }).then(() => window.location.href='index.php');</script>";
            }
        } 
        else{
            echo  "<script>Swal.fire({
                title: 'Sorry, unable to change password',
                icon: 'error',
                button: 'OK',
                }).then(() => window.location.href='index.php');</script>";
        }

    }
    else{
        ?>
        <script>
        Swal.fire({
                title: 'Both passwords are not same ! Please type again.',
                icon: 'error',
                button: 'OK',
                });
            $('#signin-modal').modal({backdrop: 'static'})
            $(document).ready(function(){
            $('#register-tab').tab('show')});
        </script>
        <?php
	}
}

?>