<div class="page-wrapper cardhead">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Users</h5>
                        <div class="icons-items d-flex justify-content-end">
                            <a href="index.php?act=adduser&mod=add">
                                <ul class="icons-list">
                                    <li><i class="ion-plus-round" data-bs-toggle="tooltip" title="" data-bs-original-title="add user" aria-label="add users"></i></li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Emai</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sel1 = mysqli_query($conn, "SELECT * FROM users WHERE deleted_at is null");
                                    while ($row = mysqli_fetch_object($sel1)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->name ?></td>
                                            <td><?php echo $row->username ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php echo $row->type == '1' ? 'Super Admin' : ($row->type == '2' ? 'Admin' : 'User') ?></td>
                                            <td>
                                                <?php if ($row->type != 1) { ?>
                                                    <a href="index.php?act=adduser&mod=edit&id=<?php echo $row->id; ?>" class="btn btn-success"><i class="ion-edit" data-bs-toggle="tooltip" title="User edit"></i></a>
                                                    <a href="user_delete.php?id=<?php echo $row->id ?>" class="btn btn-danger"><i class="ion-trash-a" data-bs-toggle="tooltip" title="" data-bs-original-title="user delete" aria-label="user delete"></i></a>
                                                <?php } ?>
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