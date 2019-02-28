<?php
$dsn='mysql:host=127.0.0.1;port=3306;dbname=cd105g3;charset=utf8';
$user='cd105g3';
$password='cd105g3';
$options=array(PDO::ATTR_CASE=>PDO::CASE_NATURAL,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$pdo=new PDO($dsn,$user,$password,$options);

// echo "<script>alert('連DB成功');</script>";
?>