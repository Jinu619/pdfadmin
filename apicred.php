<?php

$user_id = $_SESSION['SESS_STU_ADMINID'];
$branch = isset($_GET['branch']) ? $_GET['branch'] : '';
if ($user_id == 1) {
    $branch_id = $branch;
} else {
    $branch_id = $_SESSION['SESS_BRANCH'];
}

if ($branch_id) {
    $sel = mysqli_query($conn, "SELECT * FROM api_cred WHERE branch_id='$branch_id' and deleted_at is null ");
    $row = mysqli_fetch_object($sel);

    if ($row) {
        $english_content = $row->english_content;
        $arabic_content = $row->arabic_content;
    } else {
        $english_content = "";
        $arabic_content = "";
    }
} else {
    $english_content = "";
    $arabic_content = "";
}
?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Whatsapp Message</h4>
                <h6>Add/Update Whatsapp Message</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="apicred_validate.php" method="POST" id="apicred">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Arabic Content <i>(Messages written in English are translated into Arabic.)</i> </label>
                                <textarea name="arabic_content" id="arabic_content" cols="30" rows="5"><?php echo $arabic_content; ?></textarea>
                                <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
                                <div id="arabic_contentError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>English Content</label>
                                <textarea name="english_content" id="english_content" cols="30" rows="5"><?php echo $english_content; ?></textarea>
                                <div id="english_contentError" style="color: red;"></div>
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
        var arabic_content = $("#arabic_content").val();
        var english_content = $("#english_content").val();

        var arabic_contentError = document.getElementById('arabic_contentError');
        if (!arabic_content) {
            arabic_contentError.textContent = 'Arabic content is required';
            return false
        } else arabic_contentError.textContent = '';

        var english_contentError = document.getElementById('english_contentError');
        if (!english_content) {
            english_contentError.textContent = 'English content is required';
            return false
        } else english_contentError.textContent = '';

        $("#apicred").submit();
    }
</script>