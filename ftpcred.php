<?php

$user_id = $_SESSION['SESS_STU_ADMINID'];
$branch = isset($_GET['branch']) ? $_GET['branch'] : '';
if ($user_id == 1) {
    $branch_id = $branch;
} else {
    $branch_id = $_SESSION['SESS_BRANCH'];
}

$sel = mysqli_query($conn, "SELECT * FROM ftp_cred WHERE  deleted_at is null ");
$row = mysqli_fetch_object($sel);

if ($row) {
    $server = $row->server;
    $user = $row->user;
    $password = $row->password;
} else {
    $server = "";
    $user = "";
    $password = "";
}

?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>FTP Credential</h4>
                <h6>Add/Update FTP Credential</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="ftpcred_validate.php" method="POST" id="ftpcred_validate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Server</label>
                                <input type="text" name="server" id="server" value="<?php echo $server; ?>" required>
                                <div id="serverError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" name="user" id="user" value="<?php echo $user; ?>" required>
                                <div id="userError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" id="password" value="<?php echo $password; ?>" required>
                                <div id="passwordError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="javascript:void(0);" onclick="check()" class="btn btn-submit me-2">Submit</a>
                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>
    function check() {
        var server = $("#server").val();
        var user = $("#user").val();
        var password = $("#password").val();

        var serverError = document.getElementById('serverError');
        if (!server) {
            serverError.textContent = 'Server is required';
            return false
        } else serverError.textContent = '';

        var userError = document.getElementById('userError');
        if (!user) {
            userError.textContent = 'Server is required';
            return false
        } else userError.textContent = '';

        var passwordError = document.getElementById('passwordError');
        if (!password) {
            passwordError.textContent = 'Password is required';
            return false
        } else passwordError.textContent = '';

        $("#ftpcred_validate").submit();
    }
</script>