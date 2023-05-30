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
                    $productId = $_GET["productId"];
                    $productName = $_GET['productName'];
                    $categoryName = $_GET['categoryName'];
                    $productStatus = $_GET['productStatus'];
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $productName; ?></h1>
                    
                    <!-- DataTables Example -->
                    <div class="col-sm-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-sm-5 my-auto">
                                        <h5 class="m-0 font-weight-bold text-primary"><?php echo $productName; ?> Details</h5>
                                    </div>
                                    <div class="col-sm-7 text-right">
                                        <?php
                                        $checkProdDetailSql = "SELECT * FROM product_detail INNER JOIN product ON product_detail.prod_id = product.prod_id WHERE product_detail.prod_id = $productId";
                                        $countProdDetail = mysqli_num_rows(mysqli_query($connect, $checkProdDetailSql));

                                        if ($countProdDetail > 0) {
                                        ?>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#bulkAddColors"><i class="fa fa-upload"></i>&ensp;Bulk Add Colors</button>
                                        <?php
                                        }
                                        ?>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addProductDetail"><i class="fa fa-plus-circle"></i>&ensp;Add Product Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <?php
                                                if ($categoryName == "Phone" || $categoryName == "Tablet") {
                                                ?>
                                                    <th>RAM + ROM</th>
                                                <?php
                                                } else if ($categoryName == "Watch") {
                                                ?>
                                                    <th>Case Size</th>
                                                <?php
                                                }
                                                ?>
                                                <th>Price (RM)</th>
                                                <th>Stock Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM product_detail INNER JOIN product ON product_detail.prod_id = product.prod_id WHERE product_detail.prod_id = $productId";
                                                $result = mysqli_query($connect, $sql);
                                                
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><?php echo $i; ?></td>
                                                        <?php
                                                        if ($categoryName == "Phone" || $categoryName == "Tablet" || $categoryName == "Watch") {
                                                        ?>
                                                            <td class="align-middle"><?php echo $row['prod_detail_name']; ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td class="align-middle"><?php echo $row['prod_detail_price']; ?></td>
                                                        <td class="align-middle">
                                                            <?php
                                                            $sumStock = array();
                                                            $getColorResult = mysqli_query($connect, "SELECT * FROM product_color WHERE prod_detail_id = '".$row['prod_detail_id']."'");
                                                            while ($rowColor = mysqli_fetch_assoc($getColorResult)) {
                                                                array_push($sumStock, $rowColor['prod_color_stock']);
                                                            }

                                                            if (array_sum($sumStock) < 5) {
                                                                echo "<span class='font-weight-bold text-danger'>Insufficient (".array_sum($sumStock).")</span>";
                                                            } else {
                                                                echo "<span class='font-weight-bold text-success'>Sufficient (".array_sum($sumStock).")</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#editProductDetail<?php echo $row['prod_detail_id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            &ensp;
                                                            <a class="btn btn-warning" 
                                                                href="all-product-color.php?productDetailId=<?php echo $row['prod_detail_id']; ?>&productDetailName=<?php echo $row['prod_detail_name']; ?>&productId=<?php echo $productId; ?>&productName=<?php echo $productName; ?>&categoryName=<?php echo $categoryName; ?>&productStatus=<?php echo $productStatus; ?>">
                                                                <i class="fa fa-info-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php include("edit-product-detail.php"); ?>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include("add-product-detail.php"); ?>
                                    <?php include("bulk-add-color.php"); ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-secondary mb-5" href="all-product.php?status=<?php echo $productStatus; ?>">
                            <i class="fa fa-arrow-left"></i>&emsp;Back to <?php echo $productStatus == 0 ? "InActive" : ""; ?> Product List
                        </a>
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