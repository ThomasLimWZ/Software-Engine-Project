<div class="modal fade" id="editProductDetail<?php echo $row['prod_detail_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product Detail : <b><?php echo $productName; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <?php 
                                if ($categoryName == "Phone" || $categoryName == "Tablet" || $categoryName == "Watch") {
                            ?>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <?php echo $categoryName == "Phone" || $categoryName == "Tablet" ? "RAM + ROM" : "Case Size"; ?>
                                            </label> <span class="text-danger">*</span>
                                            <?php
                                            if ($categoryName == "Phone" || $categoryName == "Tablet") {
                                            ?>
                                                <input type="text" class="form-control <?php echo isset($_POST["prod_detail_name"]) ? 'is-invalid' : ''; ?>" name="prod_detail_name" 
                                                    placeholder='E.g. 8+128GB / 128GB' oninput="this.value = this.value.toUpperCase().replace(/[^0-9.+.G.T.B]/g, '').replace(/(\..*)\./g, '$1');"
                                                    value="<?php echo isset($_POST["prod_detail_name"]) ? $_POST["prod_detail_name"] : $row['prod_detail_name']; ?>" required>
                                            <?php
                                            } else {
                                            ?>
                                                <input type="text" class="form-control <?php echo isset($_POST["prod_detail_name"]) ? 'is-invalid' : ''; ?>" name="prod_detail_name" 
                                                    placeholder='E.g. 40mm / 44mm' maxlength='4' minlength='4' 
                                                    oninput="this.value = this.value.replace(/[^0-9.m]/g, '').replace(/(\..*)\./g, '$1');"
                                                    value="<?php echo isset($_POST["prod_detail_name"]) ? $_POST["prod_detail_name"] : $row['prod_detail_name']; ?>" required>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Price (RM)</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="prod_detail_price" min="1" step="0.01" 
                                        value="<?php echo isset($_POST["prod_detail_price"]) ? $_POST["prod_detail_price"] : $row['prod_detail_price']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="editProductDetail<?php echo $row['prod_detail_id']; ?>" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php
if(isset($_POST["editProductDetail".$row['prod_detail_id']])) {
	$name = $_POST["prod_detail_name"];
    $price = $_POST["prod_detail_price"];

    $currentProdDetailName = $row['prod_detail_name'];
	
    $checkProductDetailSql = "SELECT * FROM product_detail WHERE UPPER(REPLACE(prod_detail_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $name))."' AND prod_id = '".$productId."'
                                EXCEPT SELECT * FROM product_detail WHERE UPPER(REPLACE(prod_detail_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $currentProdDetailName))."'";
    $checkProductDetail = mysqli_query($connect, $checkProductDetailSql);
    $countProductDetail= mysqli_num_rows($checkProductDetail);

    if ($countProductDetail != 0) {
        echo "
            <script>
                Swal.fire(
                    'Product Detail already exists!',
                    '',
                    'error'
                ).then(() => {
                    $('#editProductDetail".$row['prod_detail_id']."').modal('show');
                });
            </script>
        ";
    } else {
        $editProductDetailSql = "UPDATE product_detail SET prod_detail_name = '$name', prod_detail_price = '$price' WHERE prod_detail_id = '".$row['prod_detail_id']."'";
        $editProductDetailResult = mysqli_query($connect, $editProductDetailSql);
        
        $getCustomerCartItem = mysqli_query($connect, "SELECT * FROM cart_item WHERE prod_detail_id = '".$row['prod_detail_id']."' AND cart_item_status = '1' AND order_id IS NULL");
        while ($customerCartRow = mysqli_fetch_assoc($getCustomerCartItem)) {
            $newSubtotal = $price * $customerCartRow['quantity'];
            $updateCustomerCartSql = "UPDATE cart_item SET product_price = '$price', cart_subtotal = '$newSubtotal' WHERE prod_detail_id = '".$row['prod_detail_id']."' AND cart_item_id = '".$customerCartRow['cart_item_id']."' AND cart_item_status = '1' AND order_id IS NULL";
            $updateCustomerCartResult = mysqli_query($connect, $updateCustomerCartSql);
        }

        echo "
            <script>
                Swal.fire(
                    'Product Detail Record Updated!',
                    '',
                    'success'
                ).then(() => {
                    window.location.href = 'all-product-detail.php?productId=".$productId."&productName=".$productName."&categoryName=".$categoryName."&productStatus=".$productStatus."';
                });
            </script>
        ";
    }
}
?>