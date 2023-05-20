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
                    $productDetailId = $_GET["productDetailId"];
                    $productDetailName = $_GET["productDetailName"];
                    $productId = $_GET["productId"];
                    $productName = $_GET['productName'];
                    $categoryName = $_GET['categoryName'];
                    $productStatus = $_GET['productStatus'];
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $productName." - ".$productDetailName; ?></h1>
                    
                    <!-- DataTables Example -->
                    <div class="col-sm-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-sm-5 my-auto">
                                        <h5 class="m-0 font-weight-bold text-primary"><?php echo $productName." - ".$productDetailName; ?> Details</h5>
                                    </div>
                                    <div class="col-sm-7 text-right">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addProductColor"><i class="fa fa-plus-circle"></i>&ensp;Add Product Color</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-25">Image</th>
                                                <th>Color</th>
                                                <th>Stock</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM product_color WHERE prod_detail_id = $productDetailId";
                                                $result = mysqli_query($connect, $sql);
                                                
                                                $i = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><?php echo $i; ?></td>
                                                        <td class="align-middle">
                                                            <img src="../Product/<?php echo $row['prod_color_img']; ?>" height="150px" style="object-fit:contain;">
                                                        </td>
                                                        <td class="align-middle">
                                                            <?php echo $row['prod_color_name']; ?>
                                                            <span class="d-none" id="selectedRestock<?php echo $row['prod_color_id']; ?>">
                                                                &ensp;<span class="badge badge-pill badge-warning">Selected to Restock</span>
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?php echo $row['prod_color_stock']; ?> 
                                                        </td>
                                                        <td class="align-middle">
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#editProductColor<?php echo $row['prod_color_id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php include("edit-product-color.php"); ?>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include("add-product-color.php"); ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-secondary mb-5" 
                            href="all-product-detail.php?productId=<?php echo $productId; ?>&productName=<?php echo $productName; ?>&categoryName=<?php echo $categoryName; ?>&productStatus=<?php echo $productStatus; ?>">
                            <i class="fa fa-arrow-left"></i>&emsp;Back to Product Detail List
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

<script>
    let currentUrl = window.location.href;

    if (currentUrl.includes('productColorId')) {
        let regex = /=([^&]+)/;
        let match = currentUrl.match(regex);
        let prodColorId = match ? match[1] : null;

        document.getElementById('selectedRestock' + prodColorId).classList.remove('d-none');
    }
</script>