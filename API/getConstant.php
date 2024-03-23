<?php
error_reporting(1);
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

if ($json['code']) {
    $code = $json['code'];
    $de_code =  decryptString($code, $key);
    $sel = mysqli_query($conn, "SELECT * FROM branches WHERE branch_code = '$de_code' AND deleted_at is null");
    if (mysqli_num_rows($sel)) {
        $ret = mysqli_fetch_object($sel);
        $branch_id = $ret->id;

        //Pdf path
        $sel1 = mysqli_query($conn, "SELECT * FROM pdfpath WHERE branch_id = '$branch_id' AND deleted_at is null ");
        $ret1 = mysqli_fetch_object($sel1);
        if (!$ret1) {
            $message = array('Code' => 404, 'Message' => 'pdf path not found');
            goto __REDIRECT;
        }

        //ftp creds
        $sel2 = mysqli_query($conn, "SELECT * FROM ftp_cred WHERE branch_id = '$branch_id' AND deleted_at is null ");
        $ret2 = mysqli_fetch_object($sel2);
        if (!$ret2) {
            $message = array('Code' => 404, 'Message' => 'FTP is not ready');
            goto __REDIRECT;
        }

        //api creds
        $sel3 = mysqli_query($conn, "SELECT * FROM api_cred WHERE branch_id = '$branch_id' AND deleted_at is null ");
        $ret3 = mysqli_fetch_object($sel3);
        if (!$ret3) {
            $message = array('Code' => 404, 'Message' => 'Api is not ready');
            goto __REDIRECT;
        }
        $sel4 = mysqli_query($conn, "SELECT phone FROM api_add_nums WHERE api_cred_id = '$ret3->id' AND deleted_at is null ");
        while ($row = mysqli_fetch_assoc($sel4)) {
            $phones[] = $row['phone'];
        }
        $phones_string = '[' . implode(',', $phones) . ']';
        $output = [
            'pdfpath' => $ret1,
            'ftpcred' => $ret2,
            'apicred' => $ret3,
            'addphones' => $phones_string
        ];
        $message = array('Code' => 200, 'Message' => 'Valid', 'content' => $output);
        goto __REDIRECT;
    } else {
        $message = array('Code' => 404, 'Message' => 'Invalid Key');
        goto __REDIRECT;
    }
} else {
    $message = array('Code' => 404, 'Message' => 'Failed');
    goto __REDIRECT;
}

function decryptString($encryptedString, $key)
{
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
echo json_encode($respose, JSON_UNESCAPED_SLASHES);
exit;
