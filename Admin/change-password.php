<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <!-- Content Row -->
					<br>
					<div class="page-wrapper">
						<div class="content container-fluid">
							<div class="container-fluid p-0">
								<div class="row">
									<div class="col-md-3 col-xl-2">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title mb-0">Profile Settings</h5>
											</div>

											<div class="list-group list-group-flush" role="tablist">
												<a class="list-group-item list-group-item-action" href="profile.php">
													Account
												</a>
												<a class="list-group-item list-group-item-action active" href="change-password.php">
													Password
												</a>
											</div>
										</div>
									</div>

									<div class="col-sm-7">
										<div class="tab-content">
											<div class="tab-pane fade show active">
												<div class="card">
													<div class="card-header">
														<h5 class="card-title mb-0">Password</h5>
													</div>
													<div class="card-body">
														<div>
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <div class="input-icons">
                                                                        <label class="form-label">Current password</label>
                                                                        <input type="password" id="currentPass" class="form-control" name="currentPass">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-icons">
                                                                        <label class="form-label">New password</label>
                                                                        <input type="password" id="newPass" class="form-control" name="newPass">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-icons">
                                                                        <label class="form-label">Confirm password</label>
                                                                        <input type="password" id="confirmPass" class="form-control" name="confirmPass">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox small">
                                                                        <input type="checkbox" class="custom-control-input" id="togglePassword">
                                                                        <label class="custom-control-label" for="togglePassword">Show Password</label>
                                                                    </div>
                                                                </div>
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
                                                                            <li class="requirements small-letter">
                                                                                <i class="fas fa-check text-success me-2"></i>
                                                                                <i class="fas fa-times text-danger me-3"></i>
                                                                                &emsp;Your password must have at least 1 small letter.
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
                                                                <style>
                                                                    .wrong .fa-check {
                                                                        display: none;
                                                                    }

                                                                    .good .fa-times {
                                                                        display: none;
                                                                    }
                                                                </style>
                                                                
                                                                <input type="submit" id="resetBtn" name="resetBtn" value="Save Password" class="btn btn-primary buttonedit ml-2" disabled>
                                                            </form>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->

		</div>
        <!-- End of Content Wrapper -->

	</div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("logout-modal.php"); ?>

    <!-- Plugins-->
    <?php include("plugins.php"); ?>

</body>

</html>

<script>
let togglePassword = document.querySelector("#togglePassword");
let currentPass = document.querySelector("#currentPass");
let password = document.querySelector("#newPass");
let confirmPassword = document.querySelector('#confirmPass');

togglePassword.addEventListener("click", () => {
    let type = currentPass.getAttribute("type") == "password" && password.getAttribute("type") === "password" && confirmPassword.getAttribute("type") === "password" ? "text" : "password";
    currentPass.setAttribute("type", type);
    password.setAttribute("type", type);
    confirmPassword.setAttribute("type", type);
});

addEventListener("DOMContentLoaded", (event) => {
    const password = document.getElementById("newPass");
    const passwordAlert = document.getElementById("password-alert");
    const requirements = document.querySelectorAll(".requirements");

    let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
    let leng = document.querySelector(".leng");
    let bigLetter = document.querySelector(".big-letter");
    let smallLetter = document.querySelector(".small-letter");
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

        let lowerCaseLetters = /[a-z]/g;
        if(value.match(lowerCaseLetters)) {  
            smallLetterBoolean = true;
        } else {
            smallLetterBoolean = false;
        }
        
        let upperCaseLetters = /[A-Z]/g;
        if(value.match(upperCaseLetters)) {  
            bigLetterBoolean = true;
        } else {
            bigLetterBoolean = false;
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

        if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
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

            if (smallLetterBoolean == false) {
                smallLetter.classList.add("wrong");
                smallLetter.classList.remove("good");
            } else {
                smallLetter.classList.add("good");
                smallLetter.classList.remove("wrong");
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

    const confirmPassword = document.getElementById("confirmPass");
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

    $('#currentPass, #newPass, #confirmPass').on('input', function () {
        if ($('#currentPass').val().length != 0 && $('#newPass').val().length != 0 && $('#confirmPass').val().length != 0) {
            bothPasswordValidation();
            return false;
        } else if ($('#currentPass').val().length == 0 && $('#newPass').val().length != 0 && $('#confirmPass').val().length != 0) {
            bothPasswordValidation();
            document.getElementById('resetBtn').disabled = true;
        } else {
            document.getElementById('resetBtn').disabled = true;
        }
    });

    function bothPasswordValidation() {
        if ($('#newPass').val() == $('#confirmPass').val()) {
            samePassBoolean = true;
            if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                document.getElementById('resetBtn').disabled = false;
            }
        } else {
            samePassBoolean = false;
            document.getElementById('resetBtn').disabled = true;
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
if (isset($_POST['resetBtn'])) {
    $currentPass = $_POST['currentPass'];
    $npass = $_POST['newPass'];
    $cpass = $_POST['confirmPass'];

    $getAdminQuery = "SELECT * FROM admin WHERE adm_id = '".$_SESSION['admin_id']."'";
    $getAdminResult = mysqli_query($connect, $getAdminQuery);
    
    $adminResult = mysqli_fetch_assoc($getAdminResult);

    if (strtoupper(md5($currentPass)) != $adminResult['adm_pass']) {
        echo "
            <script>
                Swal.fire(
                    'Something wrong!',
                    'Password does not match with record!',
                    'warning'
                );
                console.log(".$adminResult['adm_pass'].")
            </script>
        ";
    } else if ($currentPass == $npass) {
        echo "
            <script>
                Swal.fire(
                    'Something wrong!',
                    'New password cannot same as current password!',
                    'warning'
                );
            </script>
        ";
    } else {
        $updateQuery = "UPDATE admin SET adm_pass = '".strtoupper(md5($npass))."' WHERE adm_id = '".$_SESSION['admin_id']."'";
        mysqli_query($connect, $updateQuery);

        echo "
            <script>
                Swal.fire(
                    'Password updated!',
                    '',
                    'success'
                );
            </script>
        ";
    }
}
?>