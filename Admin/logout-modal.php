<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <form method="GET">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="logout" value="Logout" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET["logout"])) {
    unset($_SESSION["admin_id"]);
    session_destroy();
    echo "
        <script>
            window.location.href='login.php';
        </script>
    ";
}
?>