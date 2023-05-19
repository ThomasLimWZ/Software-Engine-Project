<div class="modal fade" id="editProduct<?php echo $row['prod_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control <?php echo isset($_POST["prod_name"]) ? 'is-invalid' : ''; ?>" name="prod_name" id="prodName" value="<?php echo isset($_POST["prod_name"]) ? $_POST["prod_name"] : $row['prod_name']; ?>"required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Brand</label> <span class="text-danger">*</span>
                                    <select class="form-control" name="prod_brand" required>
										<option value="" disabled>Select</option>
                                        <?php
                                        $brandSql = "SELECT * FROM brand WHERE brand_status = 1";
                                        $brandResult = mysqli_query($connect, $brandSql);

                                        while ($brandRow = mysqli_fetch_assoc($brandResult)) {
                                        ?>
                                            <option value="<?php echo $brandRow['brand_id'];?>" <?php if ($brandRow['brand_name'] == $row['brand_name']) echo "selected";?>>
                                                <?php echo $brandRow["brand_name"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Category</label> <span class="text-danger">*</span>
                                    <select class="form-control" name="prod_cat" required>
										<option value="" disabled>Select</option>
                                        <?php
                                        $catSql = "SELECT * FROM category";
                                        $catResult = mysqli_query($connect, $catSql);

                                        while ($catRow = mysqli_fetch_assoc($catResult)) {
                                        ?>
                                            <option value="<?php echo $catRow['cat_id'];?>" <?php if ($catRow['cat_name'] == $row['cat_name']) echo "selected";?>>
                                                <?php echo $catRow["cat_name"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" name="prod_descrip" id="prodDescrip" placeholder="Product Description ..."><?php echo isset($_POST["prod_descrip"]) ? $_POST["prod_descrip"] : $row['prod_descrip']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $specResult = mysqli_query($connect, "SELECT * FROM product_specification WHERE prod_id = ".$row['prod_id']);
                    $specRow = mysqli_fetch_assoc($specResult);
                    ?>
                    <div class="col-sm-12 mt-3">
                        <div class="row">
                            <h3 class="text-dark">Specification</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Display</label>
                                    <textarea class="form-control" name="prod_display" id="prodDisplay" placeholder="Product's Display"><?php echo isset($_POST["prod_display"]) ? $_POST["prod_display"] : $specRow['prod_spec_display']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Chip</label>
                                    <textarea class="form-control" name="prod_chip" id="prodChip" placeholder="Product's Chipset"><?php echo isset($_POST["prod_chip"]) ? $_POST["prod_chip"] : $specRow['prod_spec_chipset']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Back Camera</label>
                                    <textarea class="form-control" name="prod_back_cam" id="prodBackCam" placeholder="Product's Back Camera"><?php echo isset($_POST["prod_back_cam"]) ? $_POST["prod_back_cam"] : $specRow['prod_spec_back_cam']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Front Camera</label>
                                    <textarea class="form-control" name="prod_front_cam" id="prodFrontCam" placeholder="Product's Front Camera"><?php echo isset($_POST["prod_front_cam"]) ? $_POST["prod_front_cam"] : $specRow['prod_spec_front_cam']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Power & Battery</label>
                                    <textarea class="form-control" name="prod_battery" id="prodBattery" placeholder="Product's Power & Battery"><?php echo isset($_POST["prod_battery"]) ? $_POST["prod_battery"] : $specRow['prod_spec_battery']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Others</label>
                                    <textarea class="form-control" name="prod_others" id="prodOthers" placeholder="Product's Other Features"><?php echo isset($_POST["prod_others"]) ? $_POST["prod_others"] : $specRow['prod_spec_others'];; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="editProduct<?php echo $row['prod_id']; ?>" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php
if(isset($_POST["editProduct".$row['prod_id']])) {
    $pname = $_POST["prod_name"];
	$pdescrip = $_POST["prod_descrip"];
	$pbrand = $_POST["prod_brand"];
	$pcat = $_POST["prod_cat"];

    $pspec_display = $_POST["prod_display"];
    $pspec_chip = $_POST["prod_chip"];
    $pspec_back_cam = $_POST["prod_back_cam"];
    $pspec_front_cam = $_POST["prod_front_cam"];
    $pspec_battery = $_POST["prod_battery"];
    $pspec_others = $_POST["prod_others"];

    $currentProdName = $row['prod_name'];

    $checkProdSql = "SELECT * FROM product WHERE UPPER(REPLACE(prod_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $pname))."'
                    EXCEPT SELECT * FROM product WHERE UPPER(REPLACE(prod_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $currentProdName))."'";
    $checkProdResult = mysqli_query($connect, $checkProdSql);
    
    if (mysqli_num_rows($checkProdResult) != 0) {
        echo "
            <script>
                Swal.fire(
                    'Product already existed!',
                    '',
                    'warning'
                ).then(() => {
                    $('#editProduct".$row['prod_id']."').modal('show');
                });
            </script>
        ";
    } else {
        $editProdSql = "UPDATE product SET prod_name = '$pname', prod_descrip = '$pdescrip', brand_id = '$pbrand', cat_id = '$pcat', adm_id = '".$_SESSION['admin_id']."' WHERE prod_id = '".$row['prod_id']."'";
        $editProdResult = mysqli_query($connect, $editProdSql);

        $editProdSpecSql = "UPDATE product_specification SET prod_spec_display = '$pspec_display', prod_spec_chipset = '$pspec_chip', prod_spec_back_cam = '$pspec_back_cam', prod_spec_front_cam = '$pspec_front_cam', prod_spec_battery = '$pspec_battery', prod_spec_others = '$pspec_others' WHERE prod_id = '".$row['prod_id']."'";
        $editProdSpecResult = mysqli_query($connect, $editProdSpecSql);

        echo "
            <script>
                Swal.fire(
                    `$pname's Record Updated!`,
                    '',
                    'success'
                ).then(() => {
                    window.location.href = ".$productStatusList." == 1 ? 'all-product.php?status=1' : 'all-product.php?status=0';
                });
            </script>
        ";
    }
}
?>