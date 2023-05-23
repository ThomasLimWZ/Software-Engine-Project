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
                    <h1 class="h3 mb-2 text-gray-800">Customer List</h1>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-5 my-auto">
                                    <h5 class="m-0 font-weight-bold text-primary">Customers</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Register Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM customer";
                                            $result = mysqli_query($connect, $sql);
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $i++;
                                        ?>
                                                <tr>
                                                    <td class="align-middle"><?php echo $i; ?></td>
                                                    <td class="align-middle"><?php echo $row['cus_name']; ?></td>
                                                    <td class="align-middle"><?php echo $row['cus_phone']; ?></td>
                                                    <td class="align-middle"><?php echo $row['cus_email']; ?></td>
                                                    <td class="align-middle"><?php echo date('d M Y', strtotime($row['cus_signup_date'])); ?></td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#viewCustomer<?php echo $row['cus_id']; ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php include("view-customer.php"); ?>
                                        <?php
                                            }
                                        ?>
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
    <?php include("logout-modal.php"); ?>

    <!-- Plugins-->
    <?php include("plugins.php"); ?>

</body>

</html>