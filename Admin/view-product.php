<div class="modal fade" id="viewProduct<?php echo $row['prod_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-form-label">Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['prod_name']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Brand</label>
                                <select class="form-control" disabled>
                                    <?php
                                    $brandSql = "SELECT * FROM brand WHERE brand_status = 1";
                                    $brandResult = mysqli_query($connect, $brandSql);

                                    while ($brandRow = mysqli_fetch_assoc($brandResult)) {
                                    ?>
                                        <option <?php echo $row['brand_id'] == $brandRow["brand_id"] ? 'selected' : ''; ?>>
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
                                <label class="col-form-label">Category</label>
                                <select class="form-control" disabled>
                                    <?php
                                    $catSql = "SELECT * FROM category";
                                    $catResult = mysqli_query($connect, $catSql);

                                    while ($catRow = mysqli_fetch_assoc($catResult)) {
                                    ?>
                                        <option <?php echo $row['cat_id'] == $catRow["cat_id"] ? 'selected' : ''; ?>>
                                            <?php echo $catRow["cat_name"] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($row['prod_descrip'] != null) {
                    ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea class="form-control" disabled><?php echo $row['prod_descrip']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                $specResult = mysqli_query($connect, "SELECT * FROM product_specification WHERE prod_id = ".$row['prod_id']);
                $specRow = mysqli_fetch_assoc($specResult);

                if ($specRow['prod_spec_display'] != null || $specRow['prod_spec_chipset'] != null || $specRow['prod_spec_back_cam'] != null ||
                    $specRow['prod_spec_front_cam'] != null || $specRow['prod_spec_battery'] != null || $specRow['prod_spec_others'] != null) {
                ?>
                <div class="col-sm-12 mt-3">
                    <div class="row">
                        <h3 class="text-dark">Specification</h3>
                    </div>
                    <?php
                    if ($specRow['prod_spec_display'] != null || $specRow['prod_spec_chipset'] != null) {
                    ?>
                        <div class="row">
                            <?php
                            if ($specRow['prod_spec_display'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Display</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_display']; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            if ($specRow['prod_spec_chipset'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Chip</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_chipset']; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    if ($specRow['prod_spec_back_cam'] != null || $specRow['prod_spec_front_cam'] != null) {
                    ?>
                        <div class="row">
                            <?php
                            if ($specRow['prod_spec_back_cam'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Back Camera</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_back_cam']; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            if ($specRow['prod_spec_front_cam'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Front Camera</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_front_cam']; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    if ($specRow['prod_spec_battery'] != null || $specRow['prod_spec_others'] != null) {
                    ?>
                        <div class="row">
                            <?php
                            if ($specRow['prod_spec_battery'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Power & Battery</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_battery']; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            if ($specRow['prod_spec_others'] != null) {
                            ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Others</label>
                                        <textarea class="form-control" disabled><?php echo $specRow['prod_spec_others'];; ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
  </div>
</div>