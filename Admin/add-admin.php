<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Admin ID</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="adm_id" id="admId" value="<?php echo isset($_POST["adm_id"]) ? $_POST["adm_id"] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="adm_name" value="<?php echo isset($_POST["adm_name"]) ? $_POST["adm_name"] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="adm_email"
                                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$" value="<?php echo isset($_POST["adm_email"]) ? $_POST["adm_email"] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone Number</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="adm_phone" 
                                        min="10" max="11" value="<?php echo isset($_POST["adm_phone"]) ? $_POST["adm_phone"] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Joined Date</label> <span class="text-danger">*</span>
                                    <input type="date" class="form-control" name="adm_signup_date" value="<?php echo isset($_POST["adm_signup_date"]) ? $_POST["adm_signup_date"] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Role</label> <span class="text-danger">*</span>
                                    <select class="form-control" name="adm_role" id="adm_role" required>
                                        <option value="Superadmin" <?php echo isset($_POST["adm_role"]) == 'Superadmin' ? 'selected' : ''; ?>>
                                            Superadmin
                                        </option>
                                        <option value="Admin" <?php echo isset($_POST["adm_role"]) == 'Admin' ? 'selected' : ''; ?>>
                                            Admin
                                        </Manager>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetAddAdminForm()">Close</button>
                    <button type="submit" name="addAdmin" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
function getAdminId() {
    $.ajax({
        type: 'GET',
        url: 'API/get-new-admin-id.php',
        success: (result) => {
            document.getElementById("admId").value = result;
        }
    });
}

function resetAddAdminForm() {
    $('#addAdmin input[type="text"]').val('');
    $('#addAdmin input[type="email"]').val('');
    $('#addAdmin input[type="date"]').val('');
    $("#adm_role option:selected").prop("selected", false);
    $("#adm_role option:first").prop("selected", "selected");
}
</script>

<?php
if(isset($_POST["addAdmin"])){
    $admId = $_POST["adm_id"];
	$name = $_POST["adm_name"];
	$email = $_POST["adm_email"];
	$phone = $_POST["adm_phone"];
	$date = $_POST["adm_signup_date"];
	$role = $_POST["adm_role"];
    
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr( str_shuffle( $chars ), 0, 8 );
	
    $checkAdmId = mysqli_query($connect, "SELECT * FROM admin WHERE adm_id = '$admId'");
    $countId = mysqli_num_rows($checkAdmId);
    $checkAdmEmail = mysqli_query($connect, "SELECT * FROM admin WHERE adm_email = '$email'");
    $countEmail = mysqli_num_rows($checkAdmEmail);

    if ($countId != 0 || $countEmail != 0) {
        if ($countId != 0 && $countEmail != 0) {
            echo "
                <script>
                    Swal.fire(
                        'Both Admin ID & Email already exists!',
                        '',
                        'error'
                    ).then(() => {
                        $('#addAdmin').modal('show');
                    });
                </script>
            ";
        } else if ($countId != 0) {
            echo "
                <script>
                    Swal.fire(
                        'Admin ID already exists!',
                        '',
                        'error'
                    ).then(() => {
                        $('#addAdmin').modal('show');
                    });
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Email already exists!',
                        '',
                        'error'
                    ).then(() => {
                        $('#addAdmin').modal('show');
                    });
                </script>
            ";
        }
    } else {
        mysqli_query($connect, "INSERT INTO admin (adm_id, adm_name, adm_email, adm_phone, adm_pass, adm_signup_date, adm_role) VALUES ('$admId', '$name', '$email', '$phone', '".strtoupper(md5($password))."', '$date', '$role')");

        $subject = "Welcome to be part of our team!";
        $message = "Dear ".$name.",\n\nWelcome to 4People Telco!\n\nPlease use below Admin ID and Password to login. You may change password after you login. \nAdmin ID: ".$admId."\nPassword: ".$password."\nRole: ".$role."\n\nThank you.\n\nBest Regards,\n4People Telco";
        $headers = "From: 4People Telco" . "\r\n";

        if (mail($email, $subject, $message, $headers)) {
            echo "
                <script>
                    Swal.fire(
                        'New Admin Record Saved!',
                        '',
                        'success'
                    ).then(() => window.location.href = 'all-admin.php');
                </script>
            ";
        } else {
            echo "
                <script>
                    Swal.fire(
                        'Mail Not Sent!',
                        'Something went wrong...',
                        'error'
                    ).then(() => {
                        $('#addAdmin').modal('show');
                    });;
                </script>
            ";
        }
    }
}
?>