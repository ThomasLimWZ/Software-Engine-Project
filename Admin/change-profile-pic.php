<div class="modal fade" id="changeProfilePic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Change Profile Pic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <?php
                            if (empty($row['adm_profile_pic'])) {
                                echo "<img class='rounded-circle img-responsive mx-auto' src='img/undraw_profile.svg' id='profileDis' width='150px' height='150px'>";
                            }
                            else {
                                echo "<img class='rounded-circle img-responsive mx-auto' src='Profile Pic/".$row['adm_profile_pic']."' id='profileDis' width='150px' height='150px'>";
                            }
                            ?>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="admProfilePic" id="admProfilePic"
                                    onchange="displayImage(this)" style="text-align-last: center;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="updateProfilePic">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();
        
        reader.onload = function(e){
            document.querySelector('#profileDis').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>

<?php
if (isset($_POST["updateProfilePic"])) {
    if (isset($_FILES["admProfilePic"]["name"])) {
        $imgFile = $_FILES["admProfilePic"]["name"];
        
        $path = "Profile Pic/".$imgFile;
        $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        $validExtensions = array("jpg", "jpeg", "png");
        
        if (in_array(strtolower($imageFileType), $validExtensions)) {
            if (move_uploaded_file($_FILES["admProfilePic"]["tmp_name"], $path)) {
                mysqli_query($connect, "UPDATE admin SET adm_profile_pic = '$imgFile' WHERE adm_id='".$_SESSION['admin_id']."'");

                echo "
                    <script>
                        Swal.fire(
                            'Profile Picture updated!',
                            '',
                            'success'
                        ).then(() => window.location.href = 'profile.php');
                    </script>
                ";
            }
        }
    }
}
?>