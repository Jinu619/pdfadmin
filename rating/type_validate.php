<?php

$type = $_POST['submit'];
$phone = $_POST['phone'];

if ($type  == '1') {
    $data['number'] = (int)$phone;
    $data['type'] = 'media';
    $data['message'] = 'Dear Valued Client,Thank you for choosing [Your Company Name]. Attached is your invoice. We appreciate your partnership and look forward to serving you again soon!';
    $data['media_url'] = 'https://tatgj5cwua50pl74r7ytwa.on.drv.tw/www.creativehub.com/Demo.pdf';
    $data['instance_id'] = '65D3031F5CA94';
    $data['access_token'] = '65bb367d638b1';
    $url = "https://pingerbot.in/api/send";
    $method = "POST";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    header('location:type.php?msg=success');
    exit;
}
if ($type  == '2') {
    $data['number'] = (int)$phone;
    $data['type'] = 'text';
    $data['message'] = 'Dear Valued Client,Thank you for choosing [Your Company Name]. https://tatgj5cwua50pl74r7ytwa.on.drv.tw/www.creativehub.com/rating.html ';
    $data['instance_id'] = '65D3031F5CA94';
    $data['access_token'] = '65bb367d638b1';
    $url = "https://pingerbot.in/api/send";
    $method = "POST";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    header('location:type.php?msg=success');
    exit;
}
if ($type  == '3') {
    $data['number'] = (int)$phone;
    $data['type'] = 'media';
    $data['message'] = 'Dear Valued Client,Thank you for choosing [Your Company Name]. Attached is your ticket. We appreciate your partnership and look forward to serving you again soon!';
    $data['media_url'] = 'https://tatgj5cwua50pl74r7ytwa.on.drv.tw/www.creativehub.com/ticket.jpg';
    $data['instance_id'] = '65D3031F5CA94';
    $data['access_token'] = '65bb367d638b1';
    $url = "https://pingerbot.in/api/send";
    $method = "POST";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    header('location:type.php?msg=success');
    exit;
}
