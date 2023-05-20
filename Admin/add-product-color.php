<div class="modal fade" id="addProductColor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product Color : <b><?php echo $productName." - ".$productDetailName; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Color</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control <?php echo isset($_POST["prod_color_name"]) ? 'is-invalid' : ''; ?>" name="prod_color_name" value="<?php echo isset($_POST["prod_color_name"]) ? $_POST["prod_color_name"] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Stock</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="prod_color_stock" min="0" value="<?php echo isset($_POST["prod_color_stock"]) ? $_POST["prod_color_stock"] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image</label> <span class="text-danger">*</span>
                                    <input type="file" class="form-control-file" name="prod_color_image" accept=".png, .jpg, .jpeg" onchange="displayImage(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 d-none" id="imgDiv">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <img class='img-responsive' id='imgDis' height='300px' style="object-fit:contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetAddProductColorForm()">Close</button>
                    <button type="submit" name="addProductColor" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
function resetAddProductColorForm() {
    $('#addProductColor input[type="text"]').val('');
    $('#addProductColor input[type="number"]').val('');
    $('#addProductColor input[type="file"]').val('');
}

function displayImage(e){
	if(e.files[0]){
        document.getElementById('imgDiv').classList.remove('d-none');
		var reader = new FileReader();
		
		reader.onload = function(e){
			document.querySelector('#imgDis').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}
</script>

<?php
if(isset($_POST["addProductColor"])) {
	$colorName = $_POST["prod_color_name"];
    $stock = $_POST["prod_color_stock"];
	
    $checkColor = mysqli_query($connect, "SELECT * FROM product_color WHERE UPPER(REPLACE(prod_color_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $colorName))."' AND prod_detail_id = '$productDetailId'");
    $countColor = mysqli_num_rows($checkColor);

    if ($countColor != 0) {
        echo "
            <script>
                Swal.fire(
                    'Color already exists!',
                    '',
                    'error'
                ).then(() => {
                    $('#addProductColor').modal('show');
                });
            </script>
        ";
    } else {
        if (isset($_FILES["prod_color_image"]["name"])) {
            $imgFile = $_FILES["prod_color_image"]["name"];

            $path = "../Product/".$imgFile;
            $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            $validExtensions = array("jpg", "jpeg", "png");

            if (in_array(strtolower($imageFileType), $validExtensions)) {
                if (move_uploaded_file($_FILES["prod_color_image"]["tmp_name"], $path)) {
                    mysqli_query($connect, "INSERT INTO product_color (prod_color_name, prod_color_stock, prod_color_img, prod_detail_id) VALUES ('$colorName', '$stock', '$imgFile', '$productDetailId')");

                    echo "
                        <script>
                            Swal.fire(
                                'New Color Record Saved!',
                                '',
                                'success'
                            ).then(() => {
                                window.location.href = 'all-product-color.php?productDetailId=".$productDetailId."&productDetailName=".$productDetailName."&productId=".$productId."&productName=".$productName."&categoryName=".$categoryName."&productStatus=".$productStatus."';
                            });
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        Swal.fire(
                            'File not found!',
                            '',
                            'error'
                        ).then(() => {
                            $('#addProductColor').modal('show');
                        });
                    </script>
                ";
            }
        }
    }
}
?>