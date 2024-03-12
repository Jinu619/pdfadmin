<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);

$arabic_content = $_POST['arabic_content'];
$english_content = $_POST['english_content'];

$branch_id = $_POST['branch_id'];

$now = date('Y-m-d H:i:s');
$user_id  = $_SESSION['SESS_STU_ADMINID'];

if (!$arabic_content || !$english_content || !$branch_id) {
    $_SESSION['errors'] = "Please fill all mandatory fields";
    header("location:index.php?act=apicred");
    exit;
}

$sel = mysqli_query($conn, "SELECT * FROM api_cred WHERE branch_id='$branch_id' and deleted_at is null");
if (mysqli_num_rows($sel)) {
    $row = mysqli_fetch_object($sel);
    $id = $row->id;

    $upd = "UPDATE api_cred SET english_content = '$english_content' ,arabic_content ='$arabic_content',updated_at='$now',user_id ='$user_id' WHERE id = '$id'   ";
    $exe = mysqli_query($conn, $upd);
    if (!$exe) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=users");
        exit;
    }

    $_SESSION['success'] = "data updated";
    header("location:index.php?act=apicred");
    exit;
} else {
    $url = "https://pingerbot.in/api/send";
    $instance_id = "65D3031F5CA94";
    $access_token = "https://pingerbot.in/api/send65bb367d638b1";
    $media_url = "https://pdf.wmsv4.stallionsoft.com/public/invoices/";
    $ins2 = "INSERT INTO api_cred (url,media_url,instance_id,access_token,branch_id,created_at,user_id,english_content,arabic_content) VALUES ('$url','$instance_id','$access_token','$inserted_id','$now','$user_id','$english_content','$arabic_content') ";
    $exe2 = mysqli_query($conn, $ins2);
    if (!$exe2) {
        $_SESSION['errors'] = "failed! Please try again";
        header("location:index.php?act=users");
        exit;
    }

    $_SESSION['success'] = "data updated";
    header("location:index.php?act=apicred");
    exit;
}
