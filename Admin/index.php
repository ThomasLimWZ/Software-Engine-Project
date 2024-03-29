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
                <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Sales (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <?php
                                $annualSalesRes = mysqli_query($connect, "SELECT SUM(order_grandtotal) FROM `order`
                                                                            INNER JOIN shipping ON `order`.order_id = shipping.order_id
                                                                            WHERE YEAR(`order`.order_datetime) = YEAR(CURDATE()) AND shipping.ship_status = '3'");
                                $annualSales = mysqli_fetch_array($annualSalesRes);
                            ?>
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Sales - <?php echo date("Y"); ?> (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM <?php echo number_format($annualSales[0], 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="card-footer clearfix small z-1" href="all-order.php">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
                            </div>
                        </div>

                        <!-- Sales (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <?php
                                $monthlySalesRes = mysqli_query($connect, "SELECT SUM(order_grandtotal) FROM `order`
                                                                            INNER JOIN shipping ON `order`.order_id = shipping.order_id
                                                                            WHERE MONTH(`order`.order_datetime) = MONTH(CURDATE()) AND shipping.ship_status = '3'");
                                $monthlySales = mysqli_fetch_array($monthlySalesRes);
                            ?>
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Sales - <?php echo date("M"); ?> (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM <?php echo number_format($monthlySales[0], 2); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="card-footer clearfix small z-1" href="all-order.php">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
                            </div>
                        </div>

                        <!-- Target (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <?php
                                $monthlytargetRes = mysqli_query($connect, "SELECT SUM(order_grandtotal) FROM `order`
                                                                            INNER JOIN shipping ON `order`.order_id = shipping.order_id
                                                                            WHERE MONTH(`order`.order_datetime) = MONTH(CURDATE()) AND shipping.ship_status = '3'");
                                $monthlyTarget = mysqli_fetch_array($monthlytargetRes);
                                $calcPercent = $monthlyTarget[0] / 100000 * 100;
                            ?>
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Monthly Target - RM 100,000
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo number_format($calcPercent, 2); ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: <?php echo $calcPercent; ?>%" aria-valuenow="<?php echo $calcPercent; ?>" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="card-footer clearfix small z-1" href="#">
									<span class="font-weight-bold text-info text-uppercase float-right">RM <?php echo number_format($monthlyTarget[0], 2); ?></span>
                                </span>
                            </div>
                        </div>

                        <!-- Pending Orders Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $pendingOrder = mysqli_query($connect, "SELECT * FROM `order` 
                                                                                            INNER JOIN shipping ON `order`.order_id = shipping.order_id
                                                                                            WHERE shipping.ship_status = '0'");
                                                    echo mysqli_num_rows($pendingOrder);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="card-footer clearfix small z-1" href="all-order.php">
									<span class="float-left">View Details</span>
									<span class="float-right">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Annual Sales Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Product Categories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Phone
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Tablet
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Audio
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Watch
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-secondary"></i> Accessories
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->

                        <div class="col-lg-12 mb-4">
                            
                            <!-- Product Less StockDataTables -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Product Less Stock Alert</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Capacity/Case Size</th>
                                                    <th>Color</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th data-orderable="false">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $lessStockSql = "SELECT * FROM product 
                                                                INNER JOIN product_detail ON product.prod_id = product_detail.prod_id
                                                                INNER JOIN product_color ON product_detail.prod_detail_id = product_color.prod_detail_id
                                                                INNER JOIN brand ON product.brand_id = brand.brand_id
                                                                INNER JOIN category ON product.cat_id = category.cat_id
                                                                WHERE product_color.prod_color_stock < 5 AND product.prod_status = 1
                                                                ORDER BY product.prod_id ASC, product_detail.prod_detail_id ASC";
                                                $lessStockResult = mysqli_query($connect, $lessStockSql);

                                                $i = 0;
                                                while ($lessStockRow = mysqli_fetch_array($lessStockResult)) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $lessStockRow['prod_name']; ?></td>
                                                        <td><?php echo $lessStockRow['prod_detail_name']; ?></td>
                                                        <td><?php echo $lessStockRow['prod_color_name']; ?></td>
                                                        <td><?php echo $lessStockRow['brand_name']; ?></td>
                                                        <td><?php echo $lessStockRow['cat_name']; ?></td>
                                                        <td><?php echo "RM ".$lessStockRow['prod_detail_price']; ?></td>
                                                        <td class="text-danger font-weight-bold"><?php echo $lessStockRow['prod_color_stock']; ?></td>
                                                        <td>
                                                            <a class="btn btn-warning btn-sm" target="_blank" title="Restock"
                                                                href="all-product-color.php?productColorId=<?php echo $lessStockRow['prod_color_id']; ?>&productDetailId=<?php echo $lessStockRow['prod_detail_id']; ?>&productDetailName=<?php echo $lessStockRow['prod_detail_name']; ?>&productId=<?php echo $lessStockRow['prod_id']; ?>&productName=<?php echo $lessStockRow['prod_name']; ?>&categoryName=<?php echo $lessStockRow['cat_name']; ?>&productStatus=1">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>