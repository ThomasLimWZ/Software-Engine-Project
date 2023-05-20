<div class="modal fade" id="editProductColor<?php echo $row['prod_color_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" id="editProductColorForm<?php echo $row['prod_color_id']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Color : <b><?php echo $productName." - ".$productDetailName; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 mb-2">
                        <div class="row">
                            <img class='img-responsive mx-auto' src='../Product/<?php echo $row['prod_color_img']; ?>' id='imgDis<?php echo $row['prod_color_id']; ?>' height='300px' style="object-fit:contain;">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Color</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control <?php echo isset($_POST["prod_color_name"]) ? 'is-invalid' : ''; ?>" name="prod_color_name" value="<?php echo $row['prod_color_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Stock</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="prod_color_stock" id="prod_color_stock" min="0" value="<?php echo $row['prod_color_stock']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image</label> <span class="text-danger">*</span>
                                    <input type="file" class="form-control-file" name="prod_color_img" id="prod_color_img"
                                        onchange="displayImage<?php echo $row['prod_color_id']; ?>(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="savebtn<?php echo $row['prod_color_id']; ?>" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function displayImage<?php echo $row['prod_color_id']; ?>(e){
    if(e.files[0]){
        var reader = new FileReader();
        
        reader.onload = function(e){
            document.querySelector('#imgDis<?php echo $row['prod_color_id']; ?>').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>

<?php
if(isset($_POST["savebtn".$row['prod_color_id']])) {
    $colorName = $_POST["prod_color_name"];
    $colorStock = $_POST["prod_color_stock"];

    $currentColor = $row['prod_color_name'];
	
    $checkColorSql = "SELECT * FROM product_color WHERE UPPER(REPLACE(prod_color_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $colorName))."' AND prod_detail_id = '".$productDetailId."'
                        EXCEPT SELECT * FROM product_color WHERE UPPER(REPLACE(prod_color_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $currentColor))."'";
    $checkColorResult = mysqli_query($connect, $checkColorSql);
    $countColor = mysqli_num_rows($checkColorResult);

    if ($countColor != 0) {
        echo "
            <script>
                Swal.fire(
                    'Color already exists!',
                    '',
                    'error'
                ).then(() => {
                    $('#editProductColor".$row['prod_color_id']."').modal('show');
                });
            </script>
        ";
    } else {
        if (isset($_FILES["prod_color_img"]["name"])) {
            $imgFile = $_FILES["prod_color_img"]["name"];
            
            $path = "../Product/".$imgFile;
            $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            $validExtensions = array("jpg", "jpeg", "png");
            
            if (in_array(strtolower($imageFileType), $validExtensions)) {
                if (move_uploaded_file($_FILES["prod_color_img"]["tmp_name"], $path)) {
                    mysqli_query($connect, "UPDATE product_color SET prod_color_name = '$colorName', prod_color_stock = '$colorStock', prod_color_img='$imgFile' WHERE prod_color_id=".$row['prod_color_id']);

                    echo "
                        <script>
                            Swal.fire(
                                `$colorName's Record updated!`,
                                '',
                                'success'
                            ).then(() => {
                                window.location.href = 'all-product-color.php?productDetailId=".$productDetailId."&productDetailName=".$productDetailName."&productId=".$productId."&productName=".$productName."&categoryName=".$categoryName."&productStatus=".$productStatus."';
                            });
                        </script>
                    ";
                }
            } else {
                mysqli_query($connect, "UPDATE product_color SET prod_color_name = '$colorName', prod_color_stock = '$colorStock' WHERE prod_color_id=".$row['prod_color_id']);
    
                echo "
                    <script>
                        preventRunVar = 0;
                        if (preventRunVar == 0) {
                            $('#editProductColor".$row['prod_color_id']."').modal('hide');
                            Swal.fire(
                                `$colorName's Record updated!`,
                                '',
                                'success'
                            ).then(() => {
                                window.location.href = 'all-product-color.php?productDetailId=".$productDetailId."&productDetailName=".$productDetailName."&productId=".$productId."&productName=".$productName."&categoryName=".$categoryName."&productStatus=".$productStatus."';
                            });
                        }
                        
                    </script>
                ";
            }
        }
    }
}
?>