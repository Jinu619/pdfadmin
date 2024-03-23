<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);

$arabic_path = str_replace("\\", "/", $_POST['arabic_path']);

$english_path = str_replace("\\", "/", $_POST['english_path']);

$branch_id = $_POST['branch_id'];

$now = date('Y-m-d H:i:s');
$user_id  = $_SESSION['SESS_STU_ADMINID'];

if (!$arabic_path || !$english_path || !$branch_id) {
    $_SESSION['errors'] = "Please fill all mandatory fields";
    header("location:index.php?act=apicred");
    exit;
}

$sel = mysqli_query($conn, "SELECT * FROM pdfpath WHERE branch_id='$branch_id' and deleted_at is null");
if (mysqli_num_rows($sel)) {
    $row = mysqli_fetch_object($sel);
    $id = $row->id;

    $upd = "UPDATE pdfpath SET arabic_path = '$arabic_path' ,english_path ='$english_path',updated_at='$now',user_id ='$user_id' WHERE id = '$id'   ";
    $exe = mysqli_query($conn, $upd);
    if (!$exe) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=users");
        exit;
    }

    $_SESSION['success'] = "Path updated";
    header("location:index.php?act=filepath");
    exit;
} else {
    $ins = "INSERT INTO pdfpath (branch_id,arabic_path,english_path,user_id,created_at) VALUES ('$branch_id','$arabic_path','$english_path','$user_id','$now')";
    $exe = mysqli_query($conn, $ins);
    if (!$exe) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=users");
        exit;
    }

    $_SESSION['success'] = "Path updated";
    header("location:index.php?act=filepath");
    exit;
}
