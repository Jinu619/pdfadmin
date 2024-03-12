<?php

include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);


$act = $_POST['act'];
$username = $_POST['username'];
$password = $_POST['password'];
$rememberme = '';
$now = date('Y-m-d H:i:s');

$sql = "SELECT * FROM users WHERE username = '$username' AND password = password('$password') AND deleted_at is null";
$res = mysql_query($sql);

//check for valid login

if (mysql_num_rows($res) == 0) {
    $_SESSION['errors'] = "Invalid user name or password!!";
    header("location:login.php");
    exit;
} else {
    $row = mysql_fetch_object($res);
    //update admin session
    session_start();
    $_SESSION['SESS_STU_ADMINID'] = $row->id;
    $_SESSION['SESS_STU_NAME'] = $row->name;
    $_SESSION['LIC_TYPE'] = 3;
    $_SESSION['timeout'] = time();

    $_SESSION['SESS_BRANCH'] = $row->branch_id;
    $_SESSION['SESS_TYPE'] = $row->type;

    if ($rememberme) {
        setcookie("user", "$username", time() + (3600 * 3600));
        setcookie("pwd", "$password", time() + (3600 * 3600));
    } else { //echo "cccc";
        setcookie("user", "", time() - 3600 * 3600);
        setcookie("pwd", "", time() - 3600 * 3600);
    }

    //if from any page 
    if (!empty($act)) {
        //redirect back to that page  
        header("location:index.php?act=$act");
        exit;
    }


    //redirect the user to the welcomepage
    header("location:index.php");
    exit;
}
