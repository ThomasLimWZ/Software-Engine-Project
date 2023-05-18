<div class="modal fade" id="viewAdmin<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Admin</h5>
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
                                <input type="text" class="form-control" value="<?php echo $row['adm_id']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['adm_name']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input type="text" class="form-control" value="<?php echo $row['adm_email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone Number</label>
                                <input type="text" class="form-control" value="<?php echo $row['adm_phone']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Joined Date</label>
                                <input type="text" class="form-control" value="<?php echo date('d M Y', strtotime($row['adm_signup_date'])); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Role</label>
                                <input type="text" class="form-control" value="<?php echo $row['adm_role']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
  </div>
</div>