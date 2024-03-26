<?php
$key = "619";
$originalData = $_POST['code'];
echo 'Original Data: ' . $originalData . '<br>';

$encryptedData = encrypt($originalData, $key);
echo 'Encrypted Data: ' . $encryptedData . '<br>';

$decryptedData = decrypt($encryptedData, $key);
echo 'Decrypted Data: ' . $decryptedData . '<br>';

function encrypt($data, $key)
{
    // Filter out non-alphanumeric characters
    $filteredData = preg_replace("/[^a-zA-Z0-9]/", "", $data);

    $cipher = 'aes-256-cbc'; // AES encryption with a 256-bit key in CBC mode
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLength); // Generate a random IV

    $encrypted = openssl_encrypt($filteredData, $cipher, $key, OPENSSL_RAW_DATA, $iv);

    // Combine IV and encrypted data, then perform Base64URL encoding
    $result = rtrim(strtr(base64_encode($iv . $encrypted), '+/', '-_'), '=');

    return $result;
}

function decrypt($data, $key)
{
    // Perform Base64URL decoding first
    $data = str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT);
    $data = base64_decode($data);

    $cipher = 'aes-256-cbc'; // AES encryption with a 256-bit key in CBC mode
    $ivLength = openssl_cipher_iv_length($cipher);

    // Extract IV and encrypted data
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);

    $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);

    if ($decrypted === false) {
        return "Decryption failed.";
    }

    return $decrypted;
}
