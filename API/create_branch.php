<?php
error_reporting(1);
set_time_limit(0);
ini_set('memory_limit', '5G');
date_default_timezone_set("Asia/Kolkata");

include_once("../common/includes/constants.php");
include_once("../common/includes/functions.php");
include_once("../common/includes/common.php");

$headers = getallheaders();
header('Content-Type: application/json');

$json_content = file_get_contents('php://input');
$json = json_decode($json_content, true);
$content = array();
$message = array();
$key = "svjg";
$now = date('Y-m-d H:i:s');

if ($json['branch']) {



    $brnch = $json['branch'];
    $sel1 = mysqli_query($conn, "SELECT * FROM branches WHERE branch_name = '$brnch' AND deleted_at is null ");
    if (!mysqli_num_rows($sel1)) {
        $message = array('Code' => 404, 'Message' => 'Invalid Branch');
        goto __REDIRECT;
    } else {
        $ret1 = mysqli_fetch_object($sel1);
        if ($ret1->branch_code) {
            $message = array('Code' => 404, 'Message' => 'Already key created');
            goto __REDIRECT;
        }
    }

    $unique_code = CreateUniqueCode($conn);
    $base64 = encryptString($unique_code, $key);
    // echo $base64;exit;

    $up = "UPDATE branches SET branch_code = '$unique_code',updated_at = '$now' WHERE branch_name = '$brnch' AND deleted_at is null  ";
    $exe = mysqli_query($conn, $up);
    if (!$exe) {
        $message = array('Code' => 404, 'Message' => 'Failed! Please try again');
        goto __REDIRECT;
    }

    // $ins = "INSERT INTO branches(branch_name,branch_code,created_at) VALUES ('$brnch','$unique_code','$now')";
    // $exe = mysqli_query($conn,$ins);
    // if(!$exe){
    //     $message = array('Code' => 404, 'Message' => 'Failed! Please try again');
    //     goto __REDIRECT;
    // }

    $message = array('Code' => 200, 'Message' => 'Success', 'key' => $base64);
    goto __REDIRECT;
} else {
    $message = array('Code' => 404, 'Message' => 'Failed');
    goto __REDIRECT;
}

function encryptString($string, $key)
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($string, 'aes-256-cbc', $key, 0, $iv);
    $encrypted = base64_encode($iv . $encrypted);
    return $encrypted;
}

function CreateUniqueCode($conn)
{
    $new_code = "";
    $status = false;
    while ($status == false) {
        $num = mt_rand(0, 999999);

        $sel = mysqli_query($conn, "SELECT * FROM branches WHERE branch_code = '$num' ");
        if (mysqli_num_rows($sel)) {
            $new_code = "";
            $status = false;
        } else {
            $new_code = $num;
            $status = true;
        }
    }

    return $new_code;
}

__REDIRECT:

$respose = array('Message' => $message);
echo json_encode($respose, JSON_UNESCAPED_SLASHES);
exit;
