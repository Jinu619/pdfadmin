<?php

$user_id = $_SESSION['SESS_STU_ADMINID'];
$branch = isset($_GET['branch']) ? $_GET['branch'] : '';
if ($user_id == 1) {
    $branch_id = $branch;
} else {
    $branch_id = $_SESSION['SESS_BRANCH'];
}

if ($branch_id) {
    $sel = mysqli_query($conn, "SELECT * FROM pdfpath WHERE branch_id='$branch_id' and deleted_at is null ");
    $row = mysqli_fetch_object($sel);

    if ($row) {
        $arabic_path = $row->arabic_path;
        $english_path = $row->english_path;
    } else {
        $arabic_path = "";
        $english_path = "";
    }
} else {
    $arabic_path = "";
    $english_path = "";
}
?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>PDF Path</h4>
                <h6>Add/Update PDF path</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="filepath_validate.php" method="POST" id="filepath">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Arabic Path</label>
                                <input type="text" name="arabic_path" id="arabic_path" value="<?php echo $arabic_path; ?>" required>
                                <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
                                <div id="arabic_pathError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>English Path</label>
                                <input type="text" name="english_path" id="english_path" value="<?php echo $english_path; ?>" required>
                                <div id="english_pathError" style="color: red;"></div>
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
        var arabic_path = $("#arabic_path").val();
        var english_path = $("#english_path").val();

        var arabic_pathError = document.getElementById('arabic_pathError');
        if (!arabic_path) {
            arabic_pathError.textContent = 'Arabic pdf file path is required';
            return false
        } else arabic_pathError.textContent = '';

        var english_pathError = document.getElementById('english_pathError');
        if (!english_path) {
            english_pathError.textContent = 'English pdf file path is required';
            return false
        } else english_pathError.textContent = '';

        $("#filepath").submit();
    }
</script>