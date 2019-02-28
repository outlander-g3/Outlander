<?php
session_start();
$gdNo = $_GET["gdNo"];

$errMsg = "";
try {
	require_once("connectDB.php");
    $sql = "DELETE FROM guide WHERE gdNo=:gdNo";
    $guideD = $pdo->prepare($sql);
    $guideD->bindValue(':gdNo', $gdNo);
    $guideD->execute(); 
    header("location:back_guide.php"); 
} catch (PDOException $e) {
	$errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
	$errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>