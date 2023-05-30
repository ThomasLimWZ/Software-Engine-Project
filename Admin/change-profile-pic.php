<div class="modal fade" id="changeProfilePic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Pic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 mb-4">
                    <form method="POST">
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
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <input type="file" name="admProfilePic" class="form-control-file" style="text-align-last: center;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="saveBtn">Save</button>
            </div>
        </div>
    </div>
</div>