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
                    <h1 class="h3 mb-2 text-gray-800">Order List</h1>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-5 my-auto">
                                    <h5 class="m-0 font-weight-bold text-primary">Orders</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Invoice Number</th>
                                            <th>Customer Name</th>
                                            <th>Order Date & Time</th>
                                            <th>Grandtotal (RM)</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $orderQuery = "SELECT * FROM `order`
                                                            INNER JOIN customer ON `order`.cus_id = customer.cus_id
                                                            INNER JOIN payment ON `order`.order_id = payment.order_id
                                                            INNER JOIN shipping ON `order`.order_id = shipping.order_id";
                                            $orderResult = mysqli_query($connect, $orderQuery);
                                            $i = 0;
                                            while ($orderRow = mysqli_fetch_assoc($orderResult)) {
                                                $i++;
                                        ?>
                                                <tr>
                                                    <td class="align-middle"><?php echo $i; ?></td>
                                                    <td class="align-middle"><?php echo $orderRow['invoice_number']; ?></td>
                                                    <td class="align-middle"><?php echo $orderRow['cus_name']; ?></td>
                                                    <td class="align-middle"><?php echo $orderRow['order_datetime']; ?></td>
                                                    <td class="align-middle">RM <?php echo $orderRow['order_grandtotal']; ?></td>
                                                    <td class="align-middle">
                                                        <?php 
                                                            if ($orderRow['ship_status'] == 0) {
                                                                echo "
                                                                    <button class='btn btn-danger' onclick='updateShippingStatus(".$orderRow['order_id'].", 1)'>Preparing</button>
                                                                ";
                                                            } else if ($orderRow['ship_status'] == 1) {
                                                                echo "
                                                                    <button class='btn btn-primary' onclick='updateShippingStatus(".$orderRow['order_id'].", 2)'>Shipped Out</button>
                                                                ";
                                                            } else if ($orderRow['ship_status'] == 2) {
                                                                echo "
                                                                    <button class='btn btn-secondary' onclick='updateShippingStatus(".$orderRow['order_id'].", 3)'>Delivery In Progress</button>
                                                                ";
                                                            } else {
                                                                echo "
                                                                    <button class='btn btn-success' disabled>Delivered</button>
                                                                ";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#viewOrder<?php echo $orderRow['order_id']; ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php include("view-order.php"); ?>
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

<script>
    function updateShippingStatus(orderId, shippingStatus) {
        $.ajax({
            method: "POST",
            url: "API/update-order-status.php",
            data: { 
                orderId: orderId,
                shippingStatus: shippingStatus
            },
            success: (result) => {
                Swal.fire(
                    'Shipping Status Updated!',
                    `Updated to <b>${result}</b>`,
                    'success'
                ).then(() => window.location.href = "all-order.php");
            }
        });
    }
</script>