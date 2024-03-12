<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");


$_SESSION = array();
$_SESSION['success'] = "Sign out Sucessfully";
header("location: login.php");
