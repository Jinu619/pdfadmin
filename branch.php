<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Branch</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">branch</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Branch</h5>
                        <div class="icons-items d-flex justify-content-end">
                            <a onclick="addBranch();">
                                <ul class="icons-list">
                                    <li><i class="ion-plus-round" data-bs-toggle="tooltip" title="" data-bs-original-title="add branch" aria-label="add branch"></i></li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th>Branch Code</th>
                                        <th>Status</th>
                                        <th>Activated date</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sel1 = mysqli_query($conn, "SELECT * FROM branches WHERE 1=1");
                                    while ($row = mysqli_fetch_object($sel1)) {
                                        $class = "";
                                        if (!$row->branch_code) $class = 'text-warning';
                                        if ($row->deleted_at) $class = 'text-danger';
                                        if (!$row->deleted_at && $row->branch_code) $class = 'text-success';
                                    ?>
                                        <tr>
                                            <td id="name_<?php echo $row->id ?>"><?php echo $row->branch_name ?></td>
                                            <td id="code_<?php echo $row->id ?>"><?php echo $row->branch_code ?></td>
                                            <td>
                                                <span class="<?php echo $class; ?>">
                                                    <?php
                                                    if (!$row->branch_code) echo "Not activated";
                                                    if ($row->deleted_at) echo "Deleted/Blocked";
                                                    if (!$row->deleted_at && $row->branch_code)  echo "Active";
                                                    ?>
                                                </span>
                                            </td>
                                            <td><?php echo $row->updated_at ? date('d-m-Y', strtotime($row->updated_at)) : "" ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row->created_at)) ?></td>
                                            <td>
                                                <a onclick="editBranch(<?php echo $row->id ?>)" class="btn btn-success"><i class="ion-edit" data-bs-toggle="tooltip" title="branch edit"></i></a>
                                                <a href="branch_delete.php?id=<?php echo $row->id ?>" class="btn btn-danger"><i class="ion-trash-a" data-bs-toggle="tooltip" title="" data-bs-original-title="branch delete" aria-label="branch delete"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="branch_validate.php" method="POST">
                    <div class="form-group">
                        <label>Branch Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="branch_name" name="branch_name">
                    </div>
                    <div class="form-group brncode">
                        <label>Branch Code <span class="text-danger"></span></label>
                        <div class="cal-icon">
                            <input class="form-control " type="text" id="branch_code" name="branch_code" readonly>
                            <input class="form-control " type="hidden" id="branch_id" name="branch_id">
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editBranch(id) {

        $("#branch_name").val("");
        $("#branch_code").val("");
        $("#branch_id").val("");

        $(".brncode").prop('hidden', false);

        var name = $("#name_" + id).text();
        var code = $("#code_" + id).text();
        $("#add_event").modal('show');

        $("#branch_name").val(name);
        $("#branch_code").val(code);
        $("#branch_id").val(id);
    }

    function addBranch() {
        $("#branch_name").val("");
        $("#branch_code").val("");
        $("#branch_id").val("");

        $(".brncode").prop('hidden', true);

        $("#add_event").modal('show');
    }
</script>