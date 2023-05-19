<div class="modal fade" id="bulkAddColors" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Add Color to <b><?php echo $productName; ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 m-0 d-none" id="imgDiv">
                        <div class="row">
                            <img class='img-responsive mx-auto' id='imgDis' height='300px' style="object-fit:contain;">
                        </div>
                    </div>
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
                                    <label class="col-form-label">Image</label> <span class="text-danger">*</span>
                                    <input type="file" class="form-control-file" name="prod_color_image" accept=".png, .jpg, .jpeg" onchange="displayImage(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <h3 class="text-dark">Stock</h3>
                            </div>
                            <?php
                                $prodDetailSql = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '$productId'");
                                $count = 0;
                                while ($prodDetailRow = mysqli_fetch_assoc($prodDetailSql)) {
                                    $count++;
                            ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo $prodDetailRow['prod_detail_name']; ?></label> <span class="text-danger">*</span>
                                        <input type="number" class="form-control" 
                                            name="prod_color_stock<?php echo $count; ?>" 
                                            value="<?php echo isset($_POST["prod_color_stock".$count]) ? $_POST["prod_color_stock".$count] : ''; ?>" required>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetBulkAddColorForm()">Close</button>
                    <button type="submit" name="bulkAddColor" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
function resetBulkAddColorForm() {
    document.getElementById('imgDiv').classList.add('d-none');
    $('#bulkAddColors input[type="text"]').val('');
    $('#bulkAddColors input[type="number"]').val('');
    $('#bulkAddColors input[type="file"]').val('');
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
if(isset($_POST["bulkAddColor"])) {
	$colorName = $_POST["prod_color_name"];
    $stock = array();

    for ($i = 1; $i <= $count; $i++) {
        array_push($stock, $_POST["prod_color_stock".$i]);
    }

	$prodDetailIdToBulkAddColor = array();
    $detailHavingColor = array();
    $getAllProdDetail = mysqli_query($connect, "SELECT * FROM product_detail WHERE prod_id = '$productId'");
    while($getAllProdDetailRow = mysqli_fetch_assoc($getAllProdDetail)) {
        $currentProdDetailId = $getAllProdDetailRow['prod_detail_id'];
        array_push($prodDetailIdToBulkAddColor, $currentProdDetailId);

        $getAllProdDetailColor = mysqli_query($connect, "SELECT * FROM product_color WHERE UPPER(REPLACE(prod_color_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $colorName))."' AND prod_detail_id = '$currentProdDetailId'");
        while ($getAllProdDetailColorRow = mysqli_fetch_assoc($getAllProdDetailColor)) {
            array_push($detailHavingColor, $getAllProdDetailRow['prod_detail_name']);
        }
    }

    $detailHavingColorReformat = str_replace(['[', ']', '"', ','], ['', '', '', ', '], json_encode($detailHavingColor));
    if (count($detailHavingColor) != 0) {
        echo "
            <script>
                Swal.fire(
                    `Color already exists in <br><span class='text-danger'>".$detailHavingColorReformat."</span>!`,
                    '',
                    'warning'
                ).then(() => {
                    $('#bulkAddColors').modal('show');
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
                    for ($i = 0; $i < count($prodDetailIdToBulkAddColor); $i++) {
                        mysqli_query($connect, "INSERT INTO product_color (prod_color_name, prod_color_stock, prod_color_img, prod_detail_id) VALUES ('$colorName', '".$stock[$i]."', '$imgFile', '".$prodDetailIdToBulkAddColor[$i]."')");
                    }

                    echo "
                        <script>
                            Swal.fire(
                                'New Color Record Saved!',
                                '',
                                'success'
                            ).then(() => {
                                window.location.href = 'all-product-detail.php?productId=".$productId."&productName=".$productName."&categoryName=".$categoryName."&productStatus=".$productStatus."';
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
                            $('#bulkAddColors').modal('show');
                        });
                    </script>
                ";
            }
        }
    }
}
?>