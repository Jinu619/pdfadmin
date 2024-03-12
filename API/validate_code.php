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

if($json['code']){
    $code = $json['code'];
    $de_code =  decryptString($code,$key);
    $sel = mysqli_query($conn,"SELECT * FROM branches WHERE branch_code = '$de_code' ");
    if(mysqli_num_rows($sel)){
        $message = array('Code' => 200, 'Message' => 'Valid', 'key' => $de_code );
        goto __REDIRECT;
    }else{
        $message = array('Code' => 404, 'Message' => 'Invalid Key');
        goto __REDIRECT;
    }
}else{
    $message = array('Code' => 404, 'Message' => 'Failed');
    goto __REDIRECT;
}

function decryptString($encryptedString, $key) {
    // Separate initialization vector and encrypted string
    $data = base64_decode($encryptedString);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $ivSize);
    $encrypted = substr($data, $ivSize);
    
    // Decrypt the string using AES-256-CBC cipher
    $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    
    return $decrypted;
}


__REDIRECT:

$respose = array('Message' => $message);
echo json_encode($respose,JSON_UNESCAPED_SLASHES);
exit;