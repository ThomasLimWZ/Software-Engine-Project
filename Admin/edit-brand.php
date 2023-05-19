<div class="modal fade" id="editBrand<?php echo $row['brand_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <img class='img-responsive mx-auto' src='../Brand/<?php echo $row['brand_logo']; ?>' id='logoDis<?php echo $row['brand_name']; ?>' height='50px' style="object-fit:contain;">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Brand Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control <?php echo isset($_POST["brand_name"]) ? 'is-invalid' : ''; ?>" name="brand_name" value="<?php echo $row['brand_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Brand Logo</label>
                                    <input type="file" class="form-control-file" name="brand_logo" id="brand_logo"
                                        onchange="displayLogo<?php echo $row['brand_name']; ?>(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="savebtn<?php echo $row['brand_id']; ?>" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function displayLogo<?php echo $row['brand_name']; ?>(e){
	if(e.files[0]){
		var reader = new FileReader();
		
		reader.onload = function(e){
			document.querySelector('#logoDis<?php echo $row['brand_name']; ?>').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}
</script>

<?php
if(isset($_POST["savebtn".$row['brand_id']])) {
    $brandName = $_POST["brand_name"];

    $currentBrandName = $row['brand_name'];
    
    $checkBrand = mysqli_query($connect, "SELECT * FROM brand WHERE UPPER(REPLACE(brand_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $brandName))."' EXCEPT SELECT * FROM brand WHERE UPPER(REPLACE(brand_name, ' ', '')) = '".strtoupper(str_replace(' ', '', $currentBrandName))."'");
    $countBrand = mysqli_num_rows($checkBrand);

    if ($countBrand != 0) {
        echo "
            <script>
                Swal.fire(
                    'Brand already exists!',
                    '',
                    'error'
                ).then(() => {
                    $('#editBrand".$row['brand_id']."').modal('show');
                });
            </script>
        ";
    } else {
        if (isset($_FILES["brand_logo"]["name"])) {
            $file = $_FILES["brand_logo"]["name"];
            
            $path = "../Brand/".$file;
            $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            $validExtensions = array("jpg", "jpeg", "png");
            
            if (in_array(strtolower($imageFileType), $validExtensions)) {
                if (move_uploaded_file($_FILES["brand_logo"]["tmp_name"], $path)) {

                    mysqli_query($connect, "UPDATE brand SET brand_name='$brandName', brand_logo='$file' WHERE brand_id=".$row['brand_id']);

                    echo "
                        <script>
                            Swal.fire(
                                `$brandName's Record updated!`,
                                '',
                                'success'
                            ).then(() => window.location.href = 'all-brand.php');
                        </script>
                    ";
                }
            } else {
                mysqli_query($connect, "UPDATE brand SET brand_name='$brandName' WHERE brand_id=".$row['brand_id']);

                echo "
                    <script>
                        Swal.fire(
                            `$brandName's Record updated!`,
                            '',
                            'success'
                        ).then(() => window.location.href = 'all-brand.php');
                    </script>
                ";
            }
        }
    }
}
?>