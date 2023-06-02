<div class="modal fade" id="viewOrder<?php echo $orderRow['order_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Invoice Number</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['invoice_number']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Customer Name</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['cus_name']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Order Date & Time</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['order_datetime']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="row">
                        <h3 class="text-dark">Shipping Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Receiver Name</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['receiver_name']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Receiver Email</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['receiver_email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Receiver Phone</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['receiver_phone']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Address</label>
                                <textarea class="form-control" rows="5" disabled><?php echo $orderRow['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">City</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['city']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Postcode</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['postcode']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">State</label>
                                <input type="text" class="form-control" value="<?php echo $orderRow['state']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-3">
                    <div class="row">
                        <h3 class="text-dark">Order's Products</h3>
                    </div>
                    <div class="row">
                        <?php
                            $orderProductsQuery = "SELECT * FROM cart_item 
                                                    INNER JOIN product ON cart_item.prod_id = product.prod_id
                                                    INNER JOIN product_detail ON cart_item.prod_detail_id = product_detail.prod_detail_id
                                                    INNER JOIN product_color ON cart_item.prod_color_id = product_color.prod_color_id
                                                    WHERE order_id = '".$orderRow['order_id']."' AND cart_item_status = '0'";
                            $orderProducts = mysqli_query($connect, $orderProductsQuery);
                            $grandtotal = 0;

                            while ($orderProductRow = mysqli_fetch_assoc($orderProducts)) {
                                $grandtotal += $orderProductRow['cart_subtotal']
                        ?>
                                <div class="col-sm-3 my-2 d-flex align-items-stretch">
                                    <div class="card w-100">
                                        <img class="card-header" src="../Product/<?php echo $orderProductRow['prod_color_img']; ?>" height="200" style="object-fit:contain;">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark"><?php echo $orderProductRow['prod_name']; ?></h5>
                                            <div class="row mt-4" style="font-size: 11pt;">
                                                <div class="col-sm-5">
                                                    <?php
                                                        if (!empty($orderProductRow['prod_detail_name'])) {
                                                            if ($orderProductRow['cat_id'] == 4)
                                                                echo '<p class="card-text">Case Size</p>';
                                                            else 
                                                                echo '<p class="card-text">Capacity</p>';
                                                        }
                                                    ?>
                                                    <p class="card-text">Color</p>
                                                    <p class="card-text">Quantity</p>
                                                    <p class="card-text">Price</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <?php
                                                        if (!empty($orderProductRow['prod_detail_name'])) {
                                                            echo '<p class="card-text">: '.$orderProductRow["prod_detail_name"].'</p>';
                                                        }
                                                    ?>
                                                    <p class="card-text">: <?php echo $orderProductRow['prod_color_name']; ?></p>
                                                    <p class="card-text">: <?php echo $orderProductRow['quantity']; ?></p>
                                                    <p class="card-text">: RM <?php echo $orderProductRow['prod_detail_price']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-primary text-center font-weight-bold">
                                            <h6 class="my-auto">RM <?php echo $orderProductRow['cart_subtotal']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <h4>Grand Total: <span class="text-primary font-weight-bold">RM <?php echo number_format($grandtotal, 2); ?></span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
  </div>
</div>