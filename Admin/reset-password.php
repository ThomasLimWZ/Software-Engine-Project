<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body class="bg-gradient-primary">
    <?php
    $idForVerified = 0;
    if (isset($_GET["admin"])) {
        $idForVerified = $_GET["id"];
    }
    ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                        <p class="mb-4">Please fill up the form below. Thank you.</p>
                                    </div>
                                    <form class="user" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label class="form-label">Email&nbsp;</label><span class="text-danger">*</span>
                                            <input name="email" id="email" placeholder="Your Email Address" class="form-control" type="email" 
                                                value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password&nbsp;</label><span class="text-danger">*</span>
                                            <input name="pass" id="pass" class="form-control" type="password" 
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,}" 
                                                title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password&nbsp;</label><span class="text-danger">*</span>
                                            <input name="confirmPass" id="confirmPass" class="form-control" type="password" 
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,}" 
                                                title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                        </div>
                                        <div class="form-group text-right">
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

                                        <input type="submit" name="reset" id="reset" value="Reset Password" class="btn btn-primary btn-user btn-block" disabled>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Plugins-->
    <?php include("plugins.php"); ?>

</body>

</html>

<script>
let togglePassword = document.querySelector("#togglePassword");
let password = document.querySelector("#pass");
let confirmPassword = document.querySelector('#confirmPass');

togglePassword.addEventListener("click", () => {
    let type = password.getAttribute("type") === "password" && confirmPassword.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    confirmPassword.setAttribute("type", type);
});

addEventListener("DOMContentLoaded", (event) => {
    const password = document.getElementById("pass");
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

    $('#email, #pass, #confirmPass').on('input', function () {
        if ($('#email').val().length != 0 && $('#pass').val().length != 0 && $('#confirmPass').val().length != 0) {
            bothPasswordValidation();
            return false;
        } else if ($('#email').val().length == 0 && $('#pass').val().length != 0 && $('#confirmPass').val().length != 0) {
            bothPasswordValidation();
            document.getElementById('reset').disabled = true;
        } else {
            document.getElementById('reset').disabled = true;
        }
    });

    function bothPasswordValidation() {
        if ($('#pass').val() == $('#confirmPass').val()) {
            samePassBoolean = true;
            if (lengBoolean == true && bigLetterBoolean == true && smallLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                document.getElementById('reset').disabled = false;
            }
        } else {
            samePassBoolean = false;
            document.getElementById('reset').disabled = true;
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
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['confirmPass'];

    $getAdminQuery = mysqli_query($connect, "SELECT * FROM admin WHERE adm_email='$email'");
    $countAdmin = mysqli_num_rows($getAdminQuery);
    
    if ($countAdmin != 0) {
        $adminRow = mysqli_fetch_array($getAdminQuery);
        
        if ($idForVerified == $adminRow['id']) {
            if ($pass === $cpass) {
                mysqli_query($connect,"UPDATE admin SET adm_pass='".strtoupper(md5($pass))."' WHERE adm_email='$email'");
                echo "
                    <script>
                        Swal.fire(
                            'Reset successfull!',
                            'You may try to login again!',
                            'success'
                        ).then(() => window.location.href='login.php');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Reset Failed!',
                        'This email is not belong to you!',
                        'warning'
                    );
                </script>
            ";
        }
    } else {
        echo "
            <script>
                Swal.fire(
                    'Something wrong here!',
                    'This email is not exist in our record!',
                    'warning'
                );
            </script>
        ";
    }
}
?>