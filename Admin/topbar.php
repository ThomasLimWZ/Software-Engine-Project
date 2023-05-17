<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (!isset($_SESSION['admin_id'])) {
        echo "
            <style>
                body.swal2-shown > [aria-hidden='true'] {
                    filter: blur(20px);
                }
            </style>
            <script>
                Swal.fire(
                    `Please log in!`,
                    '',
                    'warning'
                ).then(() => window.location.href='login.php');
            </script>
        ";
    }
    ?>

    
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>
        <?php
            $adm_id = $_SESSION['admin_id'];

            $loginResult = mysqli_query($connect, "SELECT * FROM admin WHERE adm_id = '$adm_id'");
            $loginRow = mysqli_fetch_assoc($loginResult);
        ?>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $loginRow['adm_id']." (".$loginRow['adm_role'].")";?></span>
                <?php
                if (empty($loginRow['adm_profile_pic'])) {
                    echo "<img class='img-profile rounded-circle' src='img/undraw_profile.svg'>";
                }
                else {
                    echo "<img class='img-profile rounded-circle' alt='Admin Profile Picture' src='admin-profile-pic/".$loginRow['adm_profile_pic']."'>";
                }
                ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>