<div class="modal fade" id="editAdmin<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <?php
                            if (empty($row['adm_profile_pic'])) {
                                echo "<img class='rounded-circle img-responsive mx-auto' src='img/undraw_profile.svg' width='150px' height='150px'>";
                            }
                            else {
                                echo "<img class='rounded-circle img-responsive mx-auto' src='img/undraw_profile.svg' width='150px' height='150px'>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Admin ID</label>
                                    <input type="text" class="form-control <?php echo isset($_POST["adm_id"]) ? 'is-invalid' : ''; ?>" name="adm_id" value="<?php echo $row['adm_id']; ?>" disabled>
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
                                    <input type="text" class="form-control" name="adm_email"
                                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$" 
                                        value="<?php echo $row['adm_email']; ?>" disabled required>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Joined Date</label> <span class="text-danger">*</span>
                                    <input type="date" class="form-control" name="adm_signup_date" value="<?php echo date('Y-m-d', strtotime($row['adm_signup_date'])); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Role</label> <span class="text-danger">*</span>
                                    <select class="form-control" name="adm_role" required>
                                        <option value="Superadmin" <?php if ($row['adm_role'] == 'Superadmin') echo "selected";?> >
                                            Superadmin
                                        </option>
                                        <option value="Admin" <?php if ($row['adm_role'] == 'Admin') echo "selected";?> >
                                            Admin
                                        </Manager>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="savebtn<?php echo $row['id']; ?>" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST["savebtn".$row['id']])) {
    $admId = $row["adm_id"];
	$name = $_POST["adm_name"];
	$phone = $_POST["adm_phone"];
	$date = $_POST["adm_signup_date"];
	$role = $_POST["adm_role"];
	
	mysqli_query($connect, "UPDATE admin SET adm_name='$name', adm_phone='$phone', adm_signup_date='$date', adm_role='$role' WHERE id=".$row['id']);

    echo "
        <script>
            Swal.fire(
                `$admId's Record updated!`,
                '',
                'success'
            ).then(() => window.location.href='all-admin.php');
        </script>
    ";
}
?>