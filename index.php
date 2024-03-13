<?php
$act = isset($_GET['act']) ? $_GET['act'] : "";

include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");
date_default_timezone_set("Asia/Kolkata");

error_reporting(0);
$msg = $_GET['msg'];
$sesver = $_SESSION['SESS_STU_ADMINID']; //echo $sesver;  
$lictype = $_SESSION['LIC_TYPE'];
$sql = "select * from `users` where `id`='$sesver'"; //echo $sql;
$ret = mysql_query($sql);

$row = mysql_fetch_object($ret);
$_SESSION['SESS_USER_TYPE'] = $row->type;
$usertype = $row->type; //echo $rcode."<br>";  
$admin_username = $row->username; //echo $ecode."<br>";
$role = $row->type; //echo $ecode."<br>";
//exit();
//if session expired

if (empty($_SESSION['SESS_STU_ADMINID'])) {
    //show login page     
    header("Location:login.php?act=$act");
    exit;
}
if (empty($_SESSION['SESS_STU_ADMINID'])) {
    //show login page     
    header("Location:login.php?act=$act");
    exit;
}

if (empty($_SESSION['SESS_STU_ADMINID'])) {
    //show login page     
    header("Location:login.php?act=$act");
    exit;
} else {
    session_start();

    $inactive = 1200 * 3;
    if (isset($_SESSION['timeout'])) {
        $session_life = time() - $_SESSION['timeout'];
        if ($session_life > $inactive) {
            session_destroy();
            header("Location: login.php?msg=Your session expired!!&act=$act");
        } else {
            $_SESSION['timeout'] = time();
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php include('index_head.php'); ?>
                <style>
                    .swal2-popup-error {
                        background-color: red !important;
                        /* Set background color to red */
                    }

                    .swal2-popup-success {
                        background-color: #198754 !important;
                        /* Set background color to red */
                    }

                    .swal2-title-white {
                        color: white !important;
                        /* Set text color to white */
                    }
                </style>
            </head>
            <!-- <div id="global-loader">
    <div class="whirly-loader"> </div>
</div> -->
            <div class="main-wrapper">
                <div class="header">
                    <div class="header-left active">
                        <a href="index.html" class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                        <a href="index.php" class="logo-small">
                            <img src="assets/img/logo-small.png" alt="">
                        </a>
                        <a id="toggle_btn" href="javascript:void(0);">
                        </a>
                    </div>

                    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>

                    <ul class="nav user-menu">
                        <li class="nav-item dropdown has-arrow main-drop">
                            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                                    <span class="status online"></span></span>
                            </a>
                            <div class="dropdown-menu menu-drop-user">
                                <div class="profilename">
                                    <div class="profileset">
                                        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                                            <span class="status online"></span></span>
                                        <div class="profilesets">
                                            <h6><?php echo $_SESSION['SESS_STU_NAME'] ?> </h6>
                                            <h5><?php echo $_SESSION['SESS_TYPE'] == '1' ? 'Super Admin' : ($_SESSION['SESS_TYPE'] == '2' ? 'Admin' : 'User') ?></h5>
                                        </div>
                                    </div>

                                    <a class="dropdown-item logout pb-0" href="logout.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>


                    <div class="dropdown mobile-user-menu">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>

                </div>

                <div class="sidebar" id="sidebar">
                    <div class="sidebar-inner slimscroll">
                        <div id="sidebar-menu" class="sidebar-menu">
                            <ul>
                                <?php if ($role == 1 || $role == 2) { ?>
                                    <li class="<?php echo $act == '' ?  'active' : '' ?>">
                                        <a href="index.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                                Dashboard</span> </a>
                                    </li>
                                    <li class="<?php echo $act == 'branch' ?  'active' : '' ?>">
                                        <a href="index.php?act=branch"><i data-feather="award"></i><span> Branch</span> </a>
                                    </li>
                                    <li class="<?php echo $act == 'users' ?  'active' : '' ?>">
                                        <a href="index.php?act=users"><img src="assets/img/icons/users1.svg" alt="img"><span> Users</span> </a>
                                    </li>
                                <?php } ?>
                                <li class="<?php echo $act == 'filepath' ?  'active' : '' ?>">
                                    <a href="index.php?act=filepath"><img src="assets/img/icons/purchase1.svg" alt="img"><span> File Path</span> </a>
                                </li>
                                <li class="<?php echo $act == 'apicred' ?  'active' : '' ?>">
                                    <a href="index.php?act=apicred"><img src="assets/img/icons/transfer1.svg" alt="img"><span> Api Details</span> </a>
                                </li>
                                <?php if ($role == 1 || $role == 2) { ?>
                                    <li class="<?php echo $act == 'ftpcred' ?  'active' : '' ?>">
                                        <a href="index.php?act=ftpcred"><i data-feather="layers"></i><span> Ftp Credential</span> </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>

                <?php
                switch ($act) {
                    case "branch":
                        if ($role == 1 || $role == 2) {
                            include("branch.php");
                        }
                        break;
                    case "users":
                        if ($role == 1 || $role == 2) {
                            include("users.php");
                        }
                        break;
                    case "adduser":
                        if ($role == 1 || $role == 2) {
                            include("user_add.php");
                        }
                        break;
                    case "filepath":
                        if ($role == 1 && !isset($_GET['branch'])) {
                            include("filepathlist.php");
                        } else {
                            include("filepath.php");
                        }
                        break;
                    case "apicred":
                        if ($role == 1) {
                            include("apicredlist.php");
                        } else {
                            include("apicred.php");
                        }
                        break;
                    case "ftpcred":
                        if ($role == 1) {
                            include("ftpcred.php");
                        }
                        break;
                } ?>
            </div>

<?php
        }
    }
}
?>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<?php if ($_SESSION['errors']) { ?>
    <script>
        var errorMsg = <?php echo json_encode($_SESSION['errors']); ?>;
        Swal.fire({
            position: "top-end",
            type: "error",
            title: errorMsg,
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                popup: 'swal2-popup-error', // Define your custom class
                title: 'swal2-title-white' // Define your custom class for title
            },
            buttonsStyling: false
        });
    </script>
<?php
}
$_SESSION['errors'] = ''; ?>

<?php if ($_SESSION['success']) { ?>
    <script>
        var errorMsg = <?php echo json_encode($_SESSION['success']); ?>;
        Swal.fire({
            position: "top-end",
            type: "error",
            title: errorMsg,
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                popup: 'swal2-popup-success', // Define your custom class
                title: 'swal2-title-white' // Define your custom class for title
            },
            buttonsStyling: false
        });
    </script>
<?php
}
$_SESSION['success'] = ''; ?>

</body>

            </html>