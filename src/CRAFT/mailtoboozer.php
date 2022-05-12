<?php
$name = $_POST['name'];
$email = $_POST['email']; 
$tel = $_POST['tel']; 
$subject = $_POST['subject']; 
$content = $_POST['content'];

$from = 'craft@example.com';
$to   = 'kazuki@example.com';
$subject = 'テスト';
$body = '';



$ret = mb_send_mail($to, $subject, $body, "From: {$from} \r\n");
var_dump($ret);

?>