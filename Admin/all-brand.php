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
                    <h1 class="h3 mb-2 text-gray-800">Brand List</h1>

                    <!-- DataTables Example -->
                    <div class="col-sm-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-sm-6 my-auto">
                                        <h5 class="m-0 font-weight-bold text-primary">Brands</h5>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addBrand"><i class="fa fa-plus-circle"></i>&ensp;Add Brand</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Brand Name</th>
                                                <th>Brand Logo</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM brand";
                                                $result = mysqli_query($connect, $sql);

                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><?php echo $i; ?></td>
                                                        <td class="align-middle"><?php echo $row['brand_name']; ?></td>
                                                        <td class="align-middle">
                                                            <img src="../Brand/<?php echo $row['brand_logo']; ?>" height="50px" style="object-fit:contain;">
                                                        </td>
                                                        <td class="align-middle">
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#editBrand<?php echo $row['brand_id']; ?>" onclick="loadBrandLogoFile('<?php echo $row['brand_logo']; ?>')">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="statusSwitchFor<?php echo $row['brand_name']; ?>" 
                                                                    onclick="updateStatus('<?php echo $row['brand_name']; ?>', <?php echo $row['brand_status']; ?>)"
                                                                    <?php echo $row['brand_status'] == 1 ? "checked" : ""; ?>>
                                                                <label class="custom-control-label" for="statusSwitchFor<?php echo $row['brand_name']; ?>"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <script>
                                                        function updateStatus(brandName, currentStatus) {
                                                            Swal.fire({
                                                                title: `Are you sure you want to ${currentStatus == 1 ? "deactivate" : "activate"} ${brandName}?`,
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
                                                                            url: 'API/brand-update-status.php',
                                                                            data: {
                                                                                brandName
                                                                            },
                                                                            success: () => {
                                                                                Swal.fire(
                                                                                    `${brandName}'s Status Updated!`,
                                                                                    '',
                                                                                    'success'
                                                                                ).then(() => window.location.href='all-brand.php');
                                                                            }
                                                                        });
                                                                    } else {
                                                                        document.getElementById(`statusSwitchFor${brandName}`).checked = currentStatus == 1 ? true : false;
                                                                    }
                                                            });
                                                        }
                                                    </script>
                                                    <?php include("edit-brand.php"); ?>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include("add-brand.php"); ?>
                                </div>
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