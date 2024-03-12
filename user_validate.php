<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

error_reporting(1);
// print_r($_POST);
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$role = $_POST['role'];
$c_password = $_POST['c_password'];
$now = date('Y-m-d H:i:s');
$user_id = $_POST['user_id'];
$branch = $_POST['branch'];

if ($user_id) {
    if (!$user_name || !$email || !$name || !$role || !$branch) {
        $_SESSION['errors'] = "Please fill all mandatory fields";
        header("location:index.php?act=users");
        exit;
    }

    if ($password) {
        if ($password != $c_password) {
            $_SESSION['errors'] = "Password mis match";
            header("location:index.php?act=users");
            exit;
        }
    }

    $sel = mysqli_query($conn, "SELECT * FROM users WHERE id != '$user_id' AND (username = '$username' or email = '$email') and deleted_at is null  ");
    if (mysqli_num_rows($sel)) {
        $_SESSION['errors'] = "User name or email already exists";
        header("location:index.php?act=users");
        exit;
    }

    if ($password) {
        $up = "UPDATE users SET name='$name',username='$user_name',email='$email',branch_id='$branch',type='$role',updated_at='$now', password = password('$password') WHERE id ='$user_id' ";
        $ex = mysqli_query($conn, $up);
        if (!$ex) {
            $_SESSION['errors'] = "User modification failed";
            header("location:index.php?act=users");
            exit;
        }
    } else {
        $up = "UPDATE users SET name='$name',username='$user_name',email='$email',branch_id='$branch',type='$role',updated_at='$now' WHERE id ='$user_id' ";
        $ex = mysqli_query($conn, $up);
        if (!$ex) {
            $_SESSION['errors'] = "User modification failed";
            header("location:index.php?act=users");
            exit;
        }
    }

    $_SESSION['success'] = "User modification succesfully";
    header("location:index.php?act=users");
    exit;
} else {
    if (!$user_name || !$email || !$password || !$name || !$role || !$c_password || !$branch) {
        $_SESSION['errors'] = "Please fill all mandatory fields";
        header("location:index.php?act=users");
        exit;
    }
    if ($password != $c_password) {
        $_SESSION['errors'] = "Password mis match";
        header("location:index.php?act=users");
        exit;
    }
    $sel = mysqli_query($conn, "SELECT * FROM users WHERE  (username = '$username' or email = '$email') and deleted_at is null  ");
    if (mysqli_num_rows($sel)) {
        $_SESSION['errors'] = "User name or email already exists";
        header("location:index.php?act=users");
        exit;
    }

    $ins = "INSERT into users(name,username,email,password,branch_id,type,created_at) values ('$name','$user_name','$email',password('$password'),'$branch','$role','$now') ";
    $exe = mysqli_query($conn, $ins);
    if (!$exe) {
        $_SESSION['errors'] = "Failed! Please try again";
        header("location:index.php?act=users");
        exit;
    }
    $_SESSION['success'] = "User Created";
    header("location:index.php?act=users");
    exit;
}
