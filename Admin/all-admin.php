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
                    <h1 class="h3 mb-2 text-gray-800">Admin List</h1>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-6 my-auto">
                                    <h5 class="m-0 font-weight-bold text-primary">Administrators</h5>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addAdmin" onclick="getAdminId()"><i class="fa fa-plus-circle"></i>&ensp;Add Admin</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Profile Pic</th>
                                            <th>Admin ID</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Joined Date</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM admin";
                                            $result = mysqli_query($connect, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <?php
                                                        if (empty($row['adm_profile_pic'])) {
                                                            echo "<a class=‘avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='img/undraw_profile.svg' width='50px' height='50px'></a>";
                                                        }
                                                        else {
                                                            echo "<a class=‘avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='img/undraw_profile.svg' width='50px' height='50px'></a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="align-middle"><?php echo $row['adm_id']; ?></td>
                                                    <td class="align-middle"><?php echo $row['adm_name']; ?></td>
                                                    <td class="align-middle"><?php echo $row['adm_phone']; ?></td>
                                                    <td class="align-middle"><?php echo date('d M Y', strtotime($row['adm_signup_date'])); ?></td>
                                                    <td class="align-middle">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewAdmin<?php echo $row['id']; ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        &ensp;
                                                        <?php
                                                        if ($_SESSION['admin_id'] != $row['adm_id']) {
                                                        ?>
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#editAdmin<?php echo $row['id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                        </button>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php
                                                        if ($_SESSION['admin_id'] != $row['adm_id']) {
                                                        ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="statusSwitchFor<?php echo $row['adm_id']; ?>" 
                                                                onclick="updateStatus('<?php echo $row['adm_id']; ?>', <?php echo $row['adm_status']; ?>)"
                                                                <?php echo $row['adm_status'] == 1 ? "checked" : ""; ?>>
                                                            <label class="custom-control-label" for="statusSwitchFor<?php echo $row['adm_id']; ?>"></label>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <script>
                                                    function updateStatus(admId, currentStatus) {
                                                        Swal.fire({
                                                            title: `Are you sure you want to ${currentStatus == 1 ? "deactivate" : "activate"} ${admId}?`,
                                                            text: "",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: `Yes, ${currentStatus == 1 ? "deactivate" : "activate"}!`
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: 'admin-update-status.php',
                                                                        data: {
                                                                            admId
                                                                        },
                                                                        success: () => {
                                                                            Swal.fire(
                                                                                `${admId}'s Status Updated!`,
                                                                                '',
                                                                                'success'
                                                                            ).then(() => window.location.href='all-admin.php');
                                                                        }
                                                                    });
                                                                } else {
                                                                    document.getElementById(`statusSwitchFor${admId}`).checked = currentStatus == 1 ? true : false;
                                                                }
                                                        });
                                                    }
                                                </script>
                                                <?php include("view-admin.php"); ?>
                                                <?php include("edit-admin.php"); ?>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php include("add-admin.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
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