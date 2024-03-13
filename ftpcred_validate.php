<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);

$server = $_POST['server'];
$user = $_POST['user'];
$password = $_POST['password'];


$now = date('Y-m-d H:i:s');
$user_id  = $_SESSION['SESS_STU_ADMINID'];

if (!$server || !$user || !$password) {
    $_SESSION['errors'] = "Please fill all mandatory fields";
    header("location:index.php?act=ftpcred");
    exit;
}

$sel = mysqli_query($conn, "SELECT * FROM ftp_cred WHERE  deleted_at is null");
if (mysqli_num_rows($sel)) {
    $row = mysqli_fetch_object($sel);
    $id = $row->id;

    $upd = "UPDATE ftp_cred SET server = '$server' ,user ='$user',updated_at='$now',password ='$password' WHERE id = '$id'   ";
    $exe = mysqli_query($conn, $upd);
    if (!$exe) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=ftpcred");
        exit;
    }

    $_SESSION['success'] = "data updated";
    header("location:index.php?act=ftpcred");
    exit;
} else {
    $ins2 = "INSERT INTO api_cred (server,user,password,created_at) VALUES ('$server','$user','$password','$now') ";
    $exe2 = mysqli_query($conn, $ins2);
    if (!$exe2) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=ftpcred");
        exit;
    }

    $_SESSION['success'] = "data updated";
    header("location:index.php?act=ftpcred");
    exit;
}
