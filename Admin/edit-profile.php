<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <?php
                            $adm_id = $_SESSION["admin_id"];
                            $result = mysqli_query($connect, "SELECT * FROM admin WHERE adm_id = '$adm_id'");
                            $row = mysqli_fetch_array($result);
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Admin ID</label>
                                    <input type="text" class="form-control" name="adm_id" value="<?php echo $row['adm_id']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="adm_name" value="<?php echo $row['adm_name']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="adm_email" value="<?php echo $row['adm_email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone Number</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="adm_phone" 
                                        min="10" max="11"
                                        value="<?php echo $row['adm_phone']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="saveBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST["saveBtn"])) {
	$name = $_POST["adm_name"];
	$phone = $_POST["adm_phone"];
	
	mysqli_query($connect, "UPDATE admin SET adm_name='$name', adm_phone='$phone' WHERE adm_id='".$_SESSION['admin_id']."'");

    echo "
        <script>
            Swal.fire(
                'Profile updated!',
                '',
                'success'
            ).then(() => window.location.href='profile.php');
        </script>
    ";
}
?>