<?php
session_start();
try{
  require_once("connectDB.php");
  if(isset($_REQUEST["tagUpdate"])){
    $tagUpdate = json_decode($_REQUEST["tagUpdate"]);
    $sql = "update tag set tagName=:tagName
    where tagNo=:tagNo";
    $tag = $pdo->prepare( $sql );
    $tag -> bindValue( ":tagNo", $tagUpdate->tagNo);
    $tag -> bindValue( ":tagName", $tagUpdate->tagName);
    $tag -> execute();
  }else if(isset($_REQUEST["tagDelete"])){
    $tagDelete = json_decode($_REQUEST["tagDelete"]);
    $sql = "delete from tag
    where tagNo=:tagNo";
    $tag = $pdo->prepare( $sql );
    $tag -> bindValue( ":tagNo", $tagDelete->tagNo);
    $tag -> execute();
  }else if(isset($_REQUEST["tagInsert"])){
    $tagInsert = json_decode($_REQUEST["tagInsert"]);
    $sql = "insert into tag(tagName)
    values(:tagName)";
    $tag = $pdo->prepare( $sql );
    $tag -> bindValue( ":tagName", $tagInsert->tagName);
    $tag -> execute();
    $last_id = $pdo->lastInsertId();
    echo json_encode($last_id);
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>