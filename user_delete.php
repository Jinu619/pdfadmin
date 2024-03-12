<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

$user_id = $_GET['id'];
$now = date('Y-m-d H:i:s');


$up = "UPDATE users SET deleted_at='$now' WHERE id ='$user_id' ";
$ex = mysqli_query($conn, $up);
if (!$ex) {
    $_SESSION['errors'] = "User deletion failed";
    header("location:index.php?act=users");
    exit;
}
$_SESSION['success'] = "User deleted succesfully";
header("location:index.php?act=users");
exit;
