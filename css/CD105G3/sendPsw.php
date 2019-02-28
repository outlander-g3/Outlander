<?php

include_once('connectDb.php');
$memMail=$_REQUEST['memMail'];
$sql="select * from member where memMail='{$memMail}'";
$member=$pdo->query($sql);
$row=$member->fetchObject();
$memPsw=$row->memPsw;

$url = 'https://api.sendgrid.com/';
$user = 'OutlanderG3';
$pass = 'cd105g3go';

$params = array(
     'api_user' => $user,
     'api_key' => $pass,
     'to' => $memMail,
     'subject' => '密碼寄送',//主旨
     'html' => '您的會員密碼為：'.$memPsw,//內容
     'text' => 'testing body',
     'from' => 'outlander.cd105g3@gmail.com',
  );

$request = $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);

// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);

// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
// print_r($response); 
?>