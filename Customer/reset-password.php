<!DOCTYPE html>
<html lang="en">

<?php include('head.php');?>
<style>
    .alert-warning {
        color: #806520;
        background-color: #fdf3d8;
        border-color: #fceec9;
    }
    .alert-success {
        color: #0f6848;
        background-color: #d2f4e8;
        border-color: #bff0de;
    }
    .wrong .fa-check {
        display: none;
    }

    .good .fa-times {
        display: none;
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
                        <li class="breadcrumb-item"><a href="validate-email-code.php">Validate Code</a></li>
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
                                        <label for="new-password">New Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" minlength="8" name="new_password"  id="new_password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%&()*+-/:;<=>?@[\]^_`{|}~]).{8,}" 
                                            title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                    </div><!-- End .form-group -->

                                    <div class="col-sm-12 mb-4 w-auto h-auto">
                                        <div class="alert-warning px-4 py-3 mb-0 d-none" id="password-alert">
                                            <ul class="list-unstyled mb-0">
                                                <li class="requirements leng">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <i class="fas fa-times text-danger me-3"></i>
                                                    &emsp;Your password must have at least 8 chars
                                                </li>
                                                <li class="requirements big-letter">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <i class="fas fa-times text-danger me-3"></i>
                                                    &emsp;Your password must have at least 1 big letter.
                                                </li>
                                                <li class="requirements num">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <i class="fas fa-times text-danger me-3"></i>
                                                    &emsp;Your password must have at least 1 number.
                                                </li>
                                                <li class="requirements special-char">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <i class="fas fa-times text-danger me-3"></i>
                                                    &emsp;Your password must have at least 1 special char.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="new-password">Confirm New Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" minlength="8" name="con_new_password"  id="con_new_password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%&()*+-/:;<=>?@[\]^_`{|}~]).{8,}" 
                                            title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                    </div><!-- End .form-group -->  
                                    
                                    <div class="col-sm-12 mb-4 w-auto h-auto">
                                        <div class="alert-warning px-4 py-3 mb-0 d-none" id="confirm-password-alert">
                                            <ul class="list-unstyled mb-0">
                                                <li class="requirement same-pass">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <i class="fas fa-times text-danger me-3"></i>
                                                    &emsp;Both password and confirm password must be same.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="showPass">
                                            <label class="custom-control-label" for="showPass">Show Password</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->                         

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" id="resetPassbtn" name="resetPassbtn">
                                            <span>Reset</span>
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

<script>
    let showPass = document.querySelector("#showPass");
    let password = document.querySelector("#new_password");
    let confirmPassword = document.querySelector('#con_new_password');

    showPass.addEventListener("click", () => {
        let type = password.getAttribute("type") === "password" && confirmPassword.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        confirmPassword.setAttribute("type", type);
    });

    addEventListener("DOMContentLoaded", (event) => {
        const password = document.getElementById("new_password");
        const passwordAlert = document.getElementById("password-alert");
        const requirements = document.querySelectorAll(".requirements");

        let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
        let leng = document.querySelector(".leng");
        let bigLetter = document.querySelector(".big-letter");
        let num = document.querySelector(".num");
        let specialChar = document.querySelector(".special-char");

        const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
        const numbers = "0123456789";

        requirements.forEach((element) => element.classList.add("wrong"));

        password.addEventListener("focus", () => {
            passwordAlert.classList.remove("d-none");

            if (!password.classList.contains("is-valid")) {
                password.classList.add("is-invalid");
            }
        });
        
        password.addEventListener("blur", () => {
            passwordAlert.classList.add("d-none");
        });

        password.addEventListener("input", () => {
            validationAction(password);
        });

        function validationAction(passwordType) {
            let value = passwordType.value;

            if (value.length < 8) {
                lengBoolean = false;
            } else if (value.length > 7) {
                lengBoolean = true;
            }

            if (value.toLowerCase() == value) {
                bigLetterBoolean = false;
            } else {
                bigLetterBoolean = true;
            }

            numBoolean = false;
            for (let i = 0; i < value.length; i++) {
                for (let j = 0; j < numbers.length; j++) {
                    if (value[i] == numbers[j]) {
                        numBoolean = true;
                    }
                }
            }

            specialCharBoolean = false;
            for (let i = 0; i < value.length; i++) {
                for (let j = 0; j < specialChars.length; j++) {
                    if (value[i] == specialChars[j]) {
                        specialCharBoolean = true;
                    }
                }
            }

            if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                passwordType.classList.remove("is-invalid");
                passwordType.classList.add("is-valid");

                requirements.forEach((element) => {
                    element.classList.remove("wrong");
                    element.classList.add("good");
                });
                passwordAlert.classList.remove("alert-warning");
                passwordAlert.classList.add("alert-success");
            } else {
                passwordType.classList.remove("is-valid");
                passwordType.classList.add("is-invalid");

                passwordAlert.classList.add("alert-warning");
                passwordAlert.classList.remove("alert-success");

                if (lengBoolean == false) {
                    leng.classList.add("wrong");
                    leng.classList.remove("good");
                } else {
                    leng.classList.add("good");
                    leng.classList.remove("wrong");
                }

                if (bigLetterBoolean == false) {
                    bigLetter.classList.add("wrong");
                    bigLetter.classList.remove("good");
                } else {
                    bigLetter.classList.add("good");
                    bigLetter.classList.remove("wrong");
                }

                if (numBoolean == false) {
                    num.classList.add("wrong");
                    num.classList.remove("good");
                } else {
                    num.classList.add("good");
                    num.classList.remove("wrong");
                }

                if (specialCharBoolean == false) {
                    specialChar.classList.add("wrong");
                    specialChar.classList.remove("good");
                } else {
                    specialChar.classList.add("good");
                    specialChar.classList.remove("wrong");
                }
            }
        }

        const confirmPassword = document.getElementById("con_new_password");
        const confirmPasswordAlert = document.getElementById("confirm-password-alert");
        const requirement = document.querySelectorAll(".requirement");

        let samePassBoolean;
        let samePass = document.querySelector(".same-pass");

        requirement.forEach((element) => element.classList.add("wrong"));

        confirmPassword.addEventListener("focus", () => {
            confirmPasswordAlert.classList.remove("d-none");

            if (!confirmPassword.classList.contains("is-valid")) {
                confirmPassword.classList.add("is-invalid");
            }
        });  

        confirmPassword.addEventListener("blur", () => {
            confirmPasswordAlert.classList.add("d-none");
        });

        $('#new_password, #con_new_password').on('input', function () {
            if ($('#new_password').val().length != 0 && $('#con_new_password').val().length != 0) {
                bothPasswordValidation();
                return false;
            } else if ($('#new_password').val().length != 0 && $('#con_new_password').val().length != 0) {
                bothPasswordValidation();
                document.getElementById('resetPassbtn').disabled = true;
            } else {
                document.getElementById('resetPassbtn').disabled = true;
            }
        });

        function bothPasswordValidation() {
            if ($('#new_password').val() == $('#con_new_password').val()) {
                samePassBoolean = true;
                if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                    document.getElementById('resetPassbtn').disabled = false;
                }
            } else {
                samePassBoolean = false;
                document.getElementById('resetPassbtn').disabled = true;
            }

            if (samePassBoolean == true) {
                confirmPassword.classList.remove("is-invalid");
                confirmPassword.classList.add("is-valid");

                requirement.forEach((element) => {
                    element.classList.remove("wrong");
                    element.classList.add("good");
                });
                confirmPasswordAlert.classList.remove("alert-warning");
                confirmPasswordAlert.classList.add("alert-success");
            } else {
                confirmPassword.classList.remove("is-valid");
                confirmPassword.classList.add("is-invalid");

                confirmPasswordAlert.classList.add("alert-warning");
                confirmPasswordAlert.classList.remove("alert-success");

                if (samePassBoolean == false) {
                    samePass.classList.add("wrong");
                    samePass.classList.remove("good");
                } else {
                    samePass.classList.add("good");
                    samePass.classList.remove("wrong");
                }
            }
        }
    });
</script>

<?php
if (!isset($_SESSION['reset_customer_id'])) {
    echo "<script>window.location.assign('index.php');</script>";
}

if (isset($_POST["resetPassbtn"])) {
	$new_pass = $_POST['new_password'];
	$new_cpass = $_POST['con_new_password'];
	
    $customer_id = $_SESSION['reset_customer_id'];

    $query = "SELECT * FROM customer WHERE cus_id = '$customer_id' ";
    $result = mysqli_query($connect, $query);
    $result_data = mysqli_fetch_assoc($result);
	$email = $result_data['cus_email'];

	if ($new_pass === $new_cpass) {
        $hashpass = strtoupper(md5($new_pass));

		if(mysqli_query($connect,"UPDATE customer SET cus_pass = '$hashpass' WHERE cus_id = '$customer_id'")) {
        
            $subject = "Reset Successful!";
            $message = "Dear ".$result_data['cus_name'].",\n\n Your Password have been reset successfully.\n\nTo sign in to your account again, please visit our website or http://localhost/4peopletelco/Customer/index.php . Thank you.\n\nRegards,\n4People Telco";
            $headers = "From: 4People Telco" . "\r\n";
			
			if (mail($email, $subject, $message, $headers)) {
                unset($_SESSION["reset_customer_id"]);

                echo "
                    <script>
                        Swal.fire(
                            'Password Reset Successfully!',
                            '',
                            'success'
                        ).then(() => window.location.href='index.php');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        Swal.fire(
                            'Sorry, unable to send mail...',
                            '',
                            'error'
                        );
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Something went wrong!',
                        'Sorry, unable to change password',
                        'warning'
                    );
                </script>
            ";
        }
    } else {
        echo "
            <script>
                Swal.fire(
                    'Something went wrong!',
                    'Both passwords are not same! Please type again.',
                    'warning'
                );
            </script>
        ";
	}
}
?>