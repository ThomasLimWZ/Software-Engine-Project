<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true" onclick="adjustModalPosition('login')">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false" onclick="adjustModalPosition('register')">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#" method="GET" autocomplete="off">
                                    <div class="form-group">
                                        <label for="singin-email">Email Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email"
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"
                                            value="<?php echo isset($_GET['singin-email']) ? $_GET['singin-email'] : ''; ?>" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,}"
                                            title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="togglePassword">
                                            <label class="custom-control-label" for="togglePassword">Show Password</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" name="loginBtn">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <a href="forgot-password.php" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <br>
                                    <div class="row">
                                        <a href="#" class="mx-auto" onclick="clearLogin()">Clear All</a>
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#" method="POST" autocomplete="off">
                                    <div class="form-group">
                                        <label for="register-name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="register-name" name="register-name"
                                            value="<?php echo isset($_POST['register-name']) ? $_POST['register-name'] : ''; ?>" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="register-email" name="register-email"
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"
                                            value="<?php echo isset($_POST['register-email']) ? $_POST['register-email'] : ''; ?>" required>
										<span id="show-error-message" class="text-danger d-none">This email is already registered.</span>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="register-phone" name="register-phone" placeholder="01xxxxxxxx"
                                            value="<?php echo isset($_POST['register-phone']) ? $_POST['register-phone'] : ''; ?>" min="10" max="11" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="register-password" name="register-password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,}"
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

                                    <div class="form-group">
                                        <label for="register-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="register-confirm-password" name="register-confirm-password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,}"
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

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="show-password">
                                            <label class="custom-control-label" for="show-password">Show Password</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" name="registerBtn" id="registerBtn">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="policy.php">privacy policy</a> <span class="text-danger">*</span></label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

<script>
    function adjustModalPosition(tab) {
        if (tab == "login") {
            document.getElementById("signin-modal").style.top = "0";
            document.getElementById("modal-body").style.overflowY = "";
        }
        else {
            document.getElementById("signin-modal").style.top = "-100px";
            document.getElementById("modal-body").style.overflowY = "auto";
        }
    }

    function clearLogin() {
        document.getElementById("singin-email").value = "";
        document.getElementById("singin-password").value = "";
    }

    let togglePassword = document.querySelector("#togglePassword");
    let signinPassword = document.querySelector("#singin-password");

    togglePassword.addEventListener("click", () => {
        let type = signinPassword.getAttribute("type") === "password" && regConfirmPassword.getAttribute("type") === "password" ? "text" : "password";
        signinPassword.setAttribute("type", type);
    });

    let showPassword = document.querySelector("#show-password");
    let regPassword = document.querySelector("#register-password");
    let regConfirmPassword = document.querySelector('#register-confirm-password');

    showPassword.addEventListener("click", () => {
        let type = regPassword.getAttribute("type") === "password" && regConfirmPassword.getAttribute("type") === "password" ? "text" : "password";
        regPassword.setAttribute("type", type);
        regConfirmPassword.setAttribute("type", type);
    });

    addEventListener("DOMContentLoaded", (event) => {
        const password = document.getElementById("register-password");
        const passwordAlert = document.getElementById("password-alert");
        const requirements = document.querySelectorAll(".requirements");

        let lengBoolean, bigLetterBoolean, smallLetterBoolean, numBoolean, specialCharBoolean;
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

        const confirmPassword = document.getElementById("register-confirm-password");
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

        $('#register-password, #register-confirm-password').on('input', function () {
            if ($('#register-password').val().length != 0 && $('#register-confirm-password').val().length != 0) {
                bothPasswordValidation();
                return false;
            } else if ($('#register-password').val().length != 0 && $('#register-confirm-password').val().length != 0) {
                bothPasswordValidation();
                document.getElementById('registerBtn').disabled = true;
            } else {
                document.getElementById('registerBtn').disabled = true;
            }
        });

        function bothPasswordValidation() {
            if ($('#register-password').val() == $('#register-confirm-password').val()) {
                samePassBoolean = true;
                if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                    document.getElementById('registerBtn').disabled = false;
                }
            } else {
                samePassBoolean = false;
                document.getElementById('registerBtn').disabled = true;
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
    if (isset($_GET["loginBtn"])) {
        $loginEmail = $_GET["singin-email"];
        $loginPass = $_GET["singin-password"];

        $loginEmail = mysqli_real_escape_string($connect, $loginEmail);
        $loginPass = mysqli_real_escape_string($connect, $loginPass);

        $cusResult = mysqli_query($connect, "SELECT * FROM customer WHERE cus_email = '$loginEmail'");

        if (mysqli_num_rows($cusResult) == 1) {
            $cusRow = mysqli_fetch_array($cusResult);

            $_SESSION["customer_id"] = $cusRow["cus_id"];

            if (strtoupper(md5($loginPass)) == $cusRow["cus_pass"]) {
                echo "
                    <script>
                        Swal.fire(
                            'Login Success!',
                            '',
                            'success'
                        ).then(() => window.location.href='index.php');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        Swal.fire(
                            'Login Failed!',
                            'Email or Password is incorrect.',
                            'warning'
                        ).then(() => {
                            $('#signin-modal').modal({backdrop: 'static'});
                            $(document).ready(() => {
                                $('#signin-tab').tab('show');
                            });
                        });;
                    </script>
                ";
            }
        }
    }

    if (isset($_POST['registerBtn'])) {
        $name = $_POST['register-name'];
        $email = $_POST['register-email'];
        $phone = $_POST['register-phone'];
        $pass = $_POST['register-password'];
        $cpass = $_POST['register-confirm-password'];

        $getCustomerQuery = mysqli_query($connect, "SELECT * FROM customer WHERE cus_email = '$email'");
        $countCustomer = mysqli_num_rows($getCustomerQuery);
        
        if ($countCustomer == 0) {
            $customerRow = mysqli_fetch_array($getCustomerQuery);
            
            if ($pass === $cpass) {
                mysqli_query($connect,"INSERT INTO customer(cus_name, cus_email,cus_phone, cus_pass) VAlUES ('$name', '$email', '$phone','".strtoupper(md5($pass))."')");

                $subject = "Register Successful!";
                $message = "Dear ".$name.",\n\nWelcome to 4People Telco! Thank you for register as user in our system.\n\nTo sign in to your account, please visit http://localhost/4peopletelco/Customer/index.php. Thank you. \n\nRegards,\n4People Telco";
                $headers = "From: 4People Telco" . "\r\n";
                
                if (mail($email, $subject, $message, $headers)) {
                    echo "
                        <script>
                            Swal.fire(
                                'Register successfull!',
                                'Welcome to 4People Telco!',
                                'success'
                            ).then(() => window.location.href = 'index.php');
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        Swal.fire(
                            'Both password and confirm password not matched!',
                            '',
                            'warning'
                        ).then(() => {
                            $('#signin-modal').modal({backdrop: 'static'});
                            $(document).ready(() => {
                                $('#register-tab').tab('show');
                                $('#register-email').addClass('is-invalid');
                                $('#show-error-message').removeClass('d-none');
                            });
                        });
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Something wrong here!',
                        'This email is already registered in our record!',
                        'warning'
                    ).then(() => {
                        $('#signin-modal').modal({backdrop: 'static'});
                        $(document).ready(() => {
                            $('#register-tab').tab('show');
                            $('#register-email').addClass('is-invalid');
                            $('#show-error-message').removeClass('d-none');
                        });
                    });;
                </script>
            ";
        }
    }
?>