<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>File Path</h4>
                <h6>Add/Update File Path</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="user_validate.php" method="POST" id="userAdd">
                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Branch</label>
                                <select class="select" name="branch" required id="branch">
                                    <option value="">Select</option>
                                    <?php
                                    $sel = mysqli_query($conn, "SELECT * FROM branches WHERE deleted_at is null ");
                                    while ($row1 = mysqli_fetch_object($sel)) {
                                    ?>
                                        <option value="<?php echo $row1->id ?>" <?php echo $branch_id == $row1->id ? 'selected' : '' ?>><?php echo $row1->branch_name ?></option>
                                    <?php } ?>
                                </select>
                                <div id="branchError" style="color: red;"></div>
                            </div>
                        </div>

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
<script>
    function check() {
        var branch = $("#branch").val();
        if (!branch) {
            alert("please select a branch");
            return false;
        }
        var url = "index.php?act=filepath&branch=" + branch;
        window.location.href = url;

    }
</script>