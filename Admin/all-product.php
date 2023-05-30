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
                    <?php
                    $productStatusList = $_GET["status"];
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $productStatusList == 0 ? "InActive" : ""; ?>Product List</h1>
                    
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-5 my-auto">
                                    <h5 class="m-0 font-weight-bold text-primary"><?php echo $productStatusList == 0 ? "InActive" : ""; ?> Products</h5>
                                </div>
                                <?php
                                if ($productStatusList == "1") {
                                ?>
                                    <div class="col-sm-7 text-right">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus-circle"></i>&ensp;Add Product</button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Price (RM)</th>
                                            <th>Stock Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM product INNER JOIN brand ON product.brand_id = brand.brand_id INNER JOIN category ON product.cat_id = category.cat_id WHERE prod_status = $productStatusList";
                                            $result = mysqli_query($connect, $sql);
                                            
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $i++;

                                                $price = array();
												$sumStock = array();
                                                $prodDetailRes = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '".$row['prod_id']."'");
                                                while ($detailRow = mysqli_fetch_assoc($prodDetailRes)) {
                                                    array_push($price, $detailRow['prod_detail_price']);

                                                    $prodDetailColorRes = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$detailRow['prod_detail_id']."'");
                                                    while ($detailColorRow = mysqli_fetch_assoc($prodDetailColorRes)) {
                                                        array_push($sumStock, $detailColorRow['prod_color_stock']);
                                                    }
                                                }
                                        ?>
                                                <tr>
                                                    <td class="align-middle"><?php echo $i; ?></td>
                                                    <td class="align-middle w-25"><?php echo $row['prod_name']; ?></td>
                                                    <td class="align-middle"><?php echo $row['brand_name']; ?></td>
                                                    <td class="align-middle"><?php echo $row['cat_name']; ?></td>
                                                    <td class="align-middle">
                                                        <?php 
                                                            if (count($price) > 1)
                                                                echo min($price)." - ".max($price);
                                                            else if (count($price) == 1)
                                                                echo $price[0];
                                                            else 
                                                                echo "-"; 
                                                        ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php
                                                        if (array_sum($sumStock) < 5) {
                                                            echo "<span class='font-weight-bold text-danger'>Insufficient (".array_sum($sumStock).")</span>";
                                                        } else {
                                                            echo "<span class='font-weight-bold text-success'>Sufficient (".array_sum($sumStock).")</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#viewProduct<?php echo $row['prod_id']; ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        &ensp;
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#editProduct<?php echo $row['prod_id']; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        &ensp;
                                                        <?php
                                                        if ($row['prod_status'] == 1) {
                                                        ?>
                                                            <button class="btn btn-danger" onclick="updateStatus('<?php echo $row['prod_id']; ?>', '<?php echo $row['prod_name']; ?>', <?php echo $row['prod_status']; ?>)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="btn btn-primary" onclick="updateStatus('<?php echo $row['prod_id']; ?>', '<?php echo $row['prod_name']; ?>', <?php echo $row['prod_status']; ?>)">
                                                                <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                        <?php
                                                        }
                                                        ?>
                                                        &ensp;
                                                        <a class="btn btn-warning" href="all-product-detail.php?productId=<?php echo $row['prod_id']; ?>&productName=<?php echo $row['prod_name']; ?>&categoryName=<?php echo $row['cat_name']; ?>&productStatus=<?php echo $row['prod_status']; ?>">
                                                            <i class="fa fa-th-list"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <script>
                                                    function updateStatus(prodId, prodName, currentStatus) {
                                                        Swal.fire({
                                                            title: `Are you sure you want to ${currentStatus == 1 ? "deactivate" : "activate"} ${prodName}?`,
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
                                                                        url: 'API/product-update-status.php',
                                                                        data: {
                                                                            prodId
                                                                        },
                                                                        success: () => {
                                                                            Swal.fire(
                                                                                `${prodName}'s Status Updated!`,
                                                                                '',
                                                                                'success'
                                                                            ).then(() => {
                                                                                window.location.href = <?php echo $productStatusList; ?> == 1 ? 'all-product.php?status=1' : 'all-product.php?status=0';
                                                                            });
                                                                        }
                                                                    });
                                                                }
                                                        });
                                                    }
                                                </script>
                                                <?php include("view-product.php"); ?>
                                                <?php include("edit-product.php"); ?>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php include("add-product.php"); ?>
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