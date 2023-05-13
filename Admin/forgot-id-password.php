<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body class="bg-gradient-primary">
    <?php
    $forgotType = "";
    if (isset($_GET["forgot"])) {
        $forgotType = $_GET["type"];
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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your <?php echo $forgotType == "id" ? "ID" : "Password"; ?>?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you !<?php echo $forgotType == "id" ? "the ID belongs to you" : "a link to reset your password"; ?>!</p>
                                    </div>
                                    <form class="user" method="GET" autocomplete="off">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email" aria-describedby="emailHelp" required
                                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <?php 
                                        if ($forgotType == "id") {
                                        ?>
                                            <input type="submit" name="sendId" class="btn btn-primary btn-user btn-block" value="Submit">
                                        <?php
                                        } else {
                                        ?>
                                            <input type="submit" name="reset" class="btn btn-primary btn-user btn-block" value="Reset Password">
                                        <?php
                                        }
                                        ?>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Back to Login</a>
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

<?php
if (isset($_GET['sendId'])) {
    $email = $_GET['email'];

    $sql = "SELECT * FROM admin WHERE adm_email='$email'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    if ($row != 0) {
        $receiver = $row['adm_email'];
        $name = $row['adm_name'];
        $subject = "Your Admin ID";
        $message = "Dear $name, \n\nYour Admin ID is: ".$row['adm_id'].".\n\nYou may login again through this link.\n"."http://localhost/4PeopleTelco/Admin/login.php"."\n\nBest Regards,\n4People Telco";
        $headers = "From: 4People Telco". "\r\n";

        if (mail($receiver, $subject, $message, $headers)) {
            echo "
                <script>
                    Swal.fire(
                        'Mail Sent!',
                        '',
                        'success'
                    ).then(() => window.location.href='login.php');
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Mail Not Sent!',
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
                    'Email Not Found!',
                    'This email is not register as our admin.',
                    'error'
                );
            </script>
        ";
    }
} 
else if (isset($_GET['reset'])) {
    $email = $_GET['email'];

    $sql = "SELECT * FROM admin WHERE adm_email='$email'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    if ($row != 0) {
        $receiver = $row['adm_email'];
        $name = $row['adm_name'];
        $subject = "Reset your password";
        $message = "Dear $name, \n\nPlease click the link below to reset your password.\n"."http://localhost/4PeopleTelco/Admin/reset-password.php?admin&id=".$row['id']."\n\nBest Regards,\n4People Telco";
        $headers = "From: 4People Telco". "\r\n";

        if (mail($receiver, $subject, $message, $headers)) {
            echo "
                <script>
                    Swal.fire(
                        'Mail Sent!',
                        '',
                        'success'
                    ).then(() => window.location.href='login.php');
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Mail Not Sent!',
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
                    'Email Not Found!',
                    'This email is not register as our admin.',
                    'error'
                );
            </script>
        ";
    }
}
?>