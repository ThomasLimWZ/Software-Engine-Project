<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "./sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("/topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">All Administrators</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Administrators</h6>
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
                                            <th data-orderable="false">Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="img/undraw_profile.svg" alt="Admin Image" width="50px" height="50px"></a>
                                            </td>
                                            <td class="align-middle">ADM001</td>
                                            <td class="align-middle">Edinburgh</td>
                                            <td class="align-middle">+6011-1061 2839</td>
                                            <td class="align-middle">2023/04/16</td>
                                            <td class="align-middle">
                                                <a href="#" class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                &ensp;
                                                <a href="#" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                                    <label class="custom-control-label" for="customSwitch1"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <?php include "./logout-modal.php" ?>

    <!-- Plugins-->
    <?php include "./plugins.php" ?>

</body>

</html>