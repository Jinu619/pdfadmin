<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);

$branch_name = $_POST['branch_name'];
$branch_code = $_POST['branch_code'];
$branch_id = $_POST['branch_id'];
$now = date('Y-m-d H:i:s');

if (!$branch_name) {
    $_SESSION['errors'] = "Branch name is required";
    header("location:index.php?act=branch");
    exit;
}
if ($branch_id) {
    $sel = mysqli_query($conn, "SELECT * FROM branches WHERE id !='$branch_id' AND branch_name = '$branch_name' AND deleted_at is null  ");
    if (mysqli_num_rows($sel)) {
        $_SESSION['errors'] = "Branch name already in use";
        header("location:index.php?act=branch");
        exit;
    }

    $up = "UPDATE branches SET branch_name = '$branch_name' WHERE  id ='$branch_id' AND deleted_at is null ";
    $ex = mysqli_query($conn, $up);
    if (!$ex) {
        $_SESSION['errors'] = "Updation failed! Please try again";
        header("location:index.php?act=branch");
        exit;
    }
    $_SESSION['success'] = "Branch Updated";
    header("location:index.php?act=branch");
    exit;
} else {
    $sel = mysqli_query($conn, "SELECT * FROM branches WHERE  branch_name = '$branch_name' AND deleted_at is null  ");
    if (mysqli_num_rows($sel)) {
        $_SESSION['errors'] = "Branch name already in use";
        header("location:index.php?act=branch");
        exit;
    }

    $ins = "INSERT INTO branches(branch_name,created_at) VALUES ('$branch_name','$now')";
    $exe = mysqli_query($conn, $ins);
    if (!$exe) {
        $_SESSION['errors'] = "Insertion failed! Please try again";
        header("location:index.php?act=branch");
        exit;
    }
    $inserted_id = mysqli_insert_id($conn);

    $url = "https://pingerbot.in/api/send";
    $instance_id = "65D3031F5CA94";
    $access_token = "https://pingerbot.in/api/send65bb367d638b1";
    $media_url = "https://pdf.wmsv4.stallionsoft.com/public/invoices/";
    $ins2 = "INSERT INTO api_cred (url,media_url,instance_id,access_token,branch_id,created_at) VALUES ('$url','$instance_id','$access_token','$inserted_id','$now') ";
    $exe2 = mysqli_query($conn, $ins2);
    if (!$exe2) {
        $_SESSION['errors'] = "Insertion failed! Please try again";
        header("location:index.php?act=branch");
        exit;
    }

    $_SESSION['success'] = "Branch Created";
    header("location:index.php?act=branch");
    exit;
}
header("location:index.php?act=branch");
exit;
