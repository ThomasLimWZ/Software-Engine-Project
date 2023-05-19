<div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control <?php echo isset($_POST["brand_name"]) ? 'is-invalid' : ''; ?>" name="brand_name" value="<?php echo isset($_POST["brand_name"]) ? $_POST["brand_name"] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Logo</label> <span class="text-danger">*</span>
                                    <input type="file" class="form-control-file" name="brand_logo" accept=".png, .jpg, .jpeg" onchange="displayLogo(this)" required>
                                </div>
                                <span class="d-none" id="logoDiv">
                                    <img class='img-responsive' id='logoDis' height='50px' style="object-fit:contain;">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetAddBrandForm()">Close</button>
                    <button type="submit" name="addBrand" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
function resetAddBrandForm() {
    document.getElementById('logoDiv').classList.add('d-none');
    $('#addBrand input[type="text"]').val('');
    $('#addBrand input[type="file"]').val('');
}

function displayLogo(e){
	if(e.files[0]){
        document.getElementById('logoDiv').classList.remove('d-none');
		var reader = new FileReader();
		
		reader.onload = function(e){
			document.querySelector('#logoDis').setAttribute('src',e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
}
</script>

<?php
if(isset($_POST["addBrand"])) {
	$name = $_POST["brand_name"];
	
    $checkBrand = mysqli_query($connect, "SELECT * FROM brand WHERE UPPER(brand_name) = '".strtoupper($name)."'");
    $countBrand = mysqli_num_rows($checkBrand);

    if ($countBrand != 0) {
        echo "
            <script>
                Swal.fire(
                    'Brand already exists!',
                    '',
                    'error'
                ).then(() => {
                    $('#addBrand').modal('show');
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
                    mysqli_query($connect, "INSERT INTO brand (brand_name, brand_logo) VALUES ('$name', '$file')");

                    echo "
                        <script>
                            Swal.fire(
                                'New Brand Record Saved!',
                                '',
                                'success'
                            ).then(() => window.location.href = 'all-brand.php');
                        </script>
                    ";
                }
            }
        } else {
            echo "
                <script>
                    Swal.fire(
                        'File not found!',
                        '',
                        'error'
                    ).then(() => {
                        $('#addBrand').modal('show');
                    });
                </script>
            ";
        }
    }
}
?>