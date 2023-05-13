<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="GET" autocomplete="off">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="admId" name="admin_id" aria-describedby="emailHelp" required
                                                placeholder="Enter Admin ID..."
                                                value="<?php echo isset($_GET['admin_id']) ? $_GET['admin_id'] : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="admPass" name="admin_pass" placeholder="Password" required>
                                        </div>
                                        <div class="form-group text-right">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="togglePassword">
                                                <label class="custom-control-label" for="togglePassword">Show Password</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-id-password.php?forgot&type=id">Forgot ID?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgot-id-password.php?forgot&type=pass">Forgot Password?</a>
                                    </div>
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
let password = document.querySelector("#admPass");

togglePassword.addEventListener("click", () => {
    let type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
});
</script>

<?php
if (isset($_GET["login"])) {
    $id = $_GET["admin_id"];
    $pass = $_GET["admin_pass"];

    $id = mysqli_real_escape_string($connect, $id);
    $pass = mysqli_real_escape_string($connect, $pass);

    if (empty($id) || empty($pass)) {
        $error = "Admin ID or Password is empty";
    } else {
        $query = "SELECT * FROM admin WHERE adm_id='$id' AND adm_status='1'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $_SESSION["admin_id"] = $row["adm_id"];
            $_SESSION["admin_role"] = $row["adm_role"];

            if ($id == $row["adm_id"] && strtoupper(md5($pass)) == $row["adm_pass"]) {
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
                            'Admin ID or Password is incorrect',
                            'warning'
                        );
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Login Failed!',
                        'Admin ID or Password is incorrect',
                        'warning'
                    );
                </script>
            ";
        }
    }
}
?>