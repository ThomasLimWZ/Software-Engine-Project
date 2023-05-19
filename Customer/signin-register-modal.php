
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab" >
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="singin-email">Email address <span style="color:red;" >*</span></label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required value="<?php echo isset($_POST["singin-email"]) ? $_POST["singin-email"] : ''; ?>">
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password <span style="color:red;" >*</span></label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" style="float:left;" required value="<?php echo isset($_POST["singin-password"]) ? $_POST["singin-password"] : ''; ?>">
                                        <br><i class="fa fa-eye-slash" id="togglePassword" style="margin-left: -30px; margin-top:15px; cursor: pointer;"></i>
                                    </div><!-- End .form-group -->
                                    <span id="error_message" style="color:red;display:none;">*In correct email address or paswword</span>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" name="login-btn">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="register-name">Name <span style="color:red;" >*</span></label>
                                        <input type="text" class="form-control" id="register-name" name="register-name" value="<?php echo isset($_POST["register-name"]) ? $_POST["register-name"] : ''; ?>" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email">Email address <span style="color:red;">*</span></label>
                                        <input type="email" class="form-control" id="register-email" name="register-email"   value="<?php echo isset($_POST["register-email"]) ? $_POST["register-email"] : ''; ?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$" required>
                                        <span id="checkExist" style="color:red;"></span>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" id="register-password" minlength="8" style="float:left;" name="register-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%&()*+-/:;<=>?@[\]^_`{|}~]).{8,}" title="Must contain number, uppercase, special characters and lowercase letter, and at least 8 or more characters" required>
                                        <br><i class="fa fa-eye-slash" id="togglePassword1" style="margin-left: -30px; margin-top:15px; cursor: pointer;"></i>
                                    </div><!-- End .form-group -->

                                    <div id="message">
                                        <h5>Password must contain the following:</h5>
                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A <b>uppercase</b> letter</p>
                                        <p id="number" class="invalid">A <b>number</b></p>
                                        <p id="special" class="invalid">A <b>special character </b> </p>
                                        <p id="special" style="color:black">eg. #$%&()*+-/:;<=>?@[\]^_`{|}~</p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="register-password">Confirm Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" id="register-com-password" minlength="8" style="float:left;" name="register-com-password" title="Fill up the password again" required>
                                        <br><i class="fa fa-eye-slash" id="togglePassword2" style="margin-left: -30px; margin-top:15px; cursor: pointer;"></i>
                                        <br><span id="checkPass" style="color:red;"></span>
                                    </div><!-- End .form-group -->

                                  

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2" id="register-btn" name="register-btn">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
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

<style>
    #message {
    display:none;
    background-color:#f2f2f2;
    width:100%;
    height:auto;
    color: #000;
    padding: 20px;
    margin: 10px 0px;
    }

    #message p {
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

<script>

    var login_email= document.getElementById("singin-email");
    var login_pass=document.getElementById("singin-password");

    login_email.onkeyup = function(){
        login_email.style.border="1px solid #ccc";
        login_pass.style.border="1px solid #ccc";
    }

    login_pass.onkeyup = function(){
        login_email.style.border="1px solid #ccc";
        login_pass.style.border="1px solid #ccc";
    }

    //show the password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#singin-password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye icon
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });

    
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#register-password');

    togglePassword1.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);
        // toggle the eye icon
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });

    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#register-com-password');

    togglePassword2.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        // toggle the eye icon
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
    //end show password

    //start validation information
    var myInput = document.getElementById("register-password");
    var confirm = document.getElementById("register-com-password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var special = document.getElementById("special");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
    check_con_pass()
    }

    //check the value between the password and comfimation password 
    confirm.onkeyup = function () {
        check_con_pass()
    }
    
    function check_con_pass() {
        if(myInput.value == confirm.value){
        document.getElementById('register-btn').disabled=false;
        confirm.style.border = "1px solid #CCCCCC";
        document.getElementById('checkPass').innerHTML="";
        }
        else{
            document.getElementById('register-btn').disabled=true;
            confirm.style.border = "2px solid red";
            document.getElementById('checkPass').innerHTML="•	Password not matched.";
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

    function checkPass(){
        var pass = document.getElementById('reg_pswd');
        var cfpass = document.getElementById('reg_cfpswd');

        if(pass.value == cfpass.value){
            document.getElementById('regbtn').disabled=false;
            document.getElementById("reg_cfpswd").style.border = "2px solid green";
        document.getElementById('checkPass').innerHTML="";
        }
        else{
            document.getElementById('regbtn').disabled=true;
            document.getElementById("reg_cfpswd").style.border = "2px solid red";
        document.getElementById('checkPass').innerHTML="•	Password not matched.";
        }
    }

    
    
</script>

<?php
//for register
if(isset($_POST["register-btn"])){

	$reg_name = $_POST['register-name'];
	$reg_email = $_POST['register-email'];
	$reg_pass = $_POST['register-password'];
	$reg_cpass = $_POST['register-com-password'];
	
	$register = mysqli_query($connect,"SELECT * FROM customer WHERE cus_email = '$reg_email'");
	$reg_count = mysqli_num_rows($register);
	
	if($reg_pass === $reg_cpass){
		if($reg_count != 0){
            ?>
            <script>            
                Swal.fire({
                    title: 'The customer email is already in use. Please change.',
                    icon: 'error',
                    button: 'OK',
                });
                    
                $('#signin-modal').modal({backdrop: 'static'})
                $(document).ready(function(){
                $('#register-tab').tab('show')});
                document.getElementById('checkExist').innerHTML="•	The email has already been taken.";
            </script>
            <?php
		}
		else{

            //hash the password to let the admin cant see the password at the database
            $hashpass = strtoupper(md5($reg_pass));

			mysqli_query($connect,"INSERT INTO customer(cus_name,cus_email, cus_pass) VAlUES ('$reg_name','$reg_email','$hashpass')");

			$subject = "Registration Successful!";
			$message = "Dear ".$reg_name.",\n\nWelcome to 4 People Telco! Thank you for register an account at our website.\n\nTo sign in to your account, please visit __LINK__ . Thank you. \n\nRegards,\n4 People Telco";
			$headers = "From: 4 People Telco" . "\r\n";
			
			if(mail($reg_email,$subject,$message,$headers)) {
                ?>
				<script>
          
                document.getElementById('register-name').value='';
                document.getElementById('register-email').value='';
                document.getElementById('register-password').value='';
                document.getElementById('register-com-password').value='';
                document.getElementById('register-policy').checked = false;

                Swal.fire({title:"Register successfully.",
                    icon:"success",
                    text:"Welcome to 4 People Telco!" ,
                    button:"Ok"});
                $('#signin-modal').modal({backdrop: 'static'})
                $(document).ready(function(){
                $('#signin-tab').tab('show')});
				</script>
                <?php
            }
            else {
                echo  "<script>Swal.fire({
                title: 'Sorry, unable to send mail...',
                icon: 'error',
                button: 'OK',
                });</script>";
            }
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

//for login
if(isset($_POST['login-btn'])){

    $cus_email = $_POST["singin-email"];
    $cus_pass = $_POST["singin-password"];

    
    $cus_pass = mysqli_real_escape_string($connect, $cus_pass);

    if (empty($cus_email) || empty($cus_pass)) {
        ?>
            <script>
                document.getElementById("singin-email").style.border="2px solid red";
                document.getElementById("singin-password").style.border="2px solid red";
                document.getElementById("error_message").style.display="block";

                $('#signin-modal').modal({backdrop: 'static'})
                $(document).ready(function(){
                $('#signin-tab').tab('show')});
            </script>
        <?php
        
    }
    else
    {
        $hashpass = strtoupper(md5($cus_pass));
        $query = "SELECT * FROM customer WHERE cus_email='$cus_email' AND cus_pass='$hashpass'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["customer_id"] = $row["cus_id"];

            $url.= $_SERVER['REQUEST_URI']; 
            echo "
                    <script>
                    
                        Swal.fire(
                            'Login Success!',
                            '',
                            'success'
                        ).then(() => window.location.href='".$url."');
                        
                    </script>
                ";
        }   
        else
        {
            ?>
            <script>
                document.getElementById("singin-email").style.border="2px solid red";
                document.getElementById("singin-password").style.border="2px solid red";
                document.getElementById("error_message").style.display="block";

                $('#signin-modal').modal({backdrop: 'static'})
                $(document).ready(function(){
                $('#signin-tab').tab('show')});
            </script>
            <?php          
        } 
    }
}
?>