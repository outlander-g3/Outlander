<?php
session_start();
$scnTitle = $_REQUEST['scnTitle'];
$scnCont = $_REQUEST['scnCont'];


if(isset($_REQUEST['iconList'])){
  $iconList = implode("|", $_REQUEST['iconList']);
}
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['scnNo'])){
    $scnNo = $_REQUEST['scnNo'];
    if(isset($_FILES["scnImg"])){
      switch( $_FILES["scnImg"]["error"] ){
        case UPLOAD_ERR_OK:
          if( file_exists("img/mt/{$_REQUEST['pdkNo']}/scn") === false){
            mkdir("img/mt/{$_REQUEST['pdkNo']}/scn");
          }
          $name = $_FILES["scnImg"]["name"] = "$scnNo.jpg";
          $from = $_FILES['scnImg']['tmp_name'];
          $to = "img//mt//{$_REQUEST['pdkNo']}//scn//{$name}";
          copy($from, $to);
          echo "OK";
          break;
        case UPLOAD_ERR_INI_SIZE:
          echo "上傳檔案太大,不得超過: ", ini_get("upload_max_filesize"), "<br>";
          break;
        case UPLOAD_ERR_FORM_SIZE:
          echo "上傳檔案太大 <br>";
          break;
        case UPLOAD_ERR_PARTIAL:
          echo "上傳資料有問題，請重送<br>";
          break;
        case UPLOAD_ERR_NO_FILE:
          echo "未選檔案<br>";
          break;
        default : 
          echo "['error']: " , $_FILES['scnImg']['error'] , "<br>";
      } 

    }
    if(isset($name)){
      $sql = 'update scenery set scnTitle=:scnTitle, scnCont=:scnCont,
      scnImg=:scnImg, iconList=:iconList
      where scnNo=:scnNo';
      $scenery = $pdo -> prepare($sql);
      $scenery->bindValue(':scnImg', $name);
    }else{
      $sql = 'update scenery set scnTitle=:scnTitle, scnCont=:scnCont, iconList=:iconList
      where scnNo=:scnNo';
      $scenery = $pdo -> prepare($sql);
    }
    $scenery->bindValue(':scnNo', $scnNo);
    $scenery->bindValue(':scnCont', $scnCont);
    $scenery->bindValue(':scnTitle', $scnTitle);
    $scenery->bindValue(':iconList', $iconList);
    $scenery->execute();
    
    $sql = 'delete from scenerylist
    where pdkNo=:pdkNo and scnNo=:scnNo';
    $delScn = $pdo->prepare($sql);
    $delScn->bindValue(':pdkNo',$_REQUEST['pdkOri']);
    $delScn->bindValue(':scnNo',$scnNo);
    $delScn->execute();

    $sql = 'insert into scenerylist (pdkNo, scnNo, scnOrd)
    values (:pdkNo, :scnNo, 4)';
    $insertScn = $pdo->prepare($sql);
    $insertScn->bindValue(':pdkNo',$_REQUEST['pdkNo']);
    $insertScn->bindValue(':scnNo',$scnNo);
    $insertScn->execute();
    
  }else{
      $sql = 'insert into scenery (scnTitle, scnCont, iconList)
      values (:scnTitle, :scnCont, :iconList)';
      $scenery = $pdo -> prepare($sql);
      $scenery->bindValue(':scnTitle', $scnTitle);
      $scenery->bindValue(':scnCont', $scnCont);
      $scenery->bindValue(':iconList', $iconList);
      $scenery->execute();

      $last_id = $pdo->lastInsertId();
      $sql = 'insert into scenerylist (pdkNo, scnNo, scnOrd)
      values (:pdkNo, :scnNo, 4)';
      $newScn = $pdo->prepare($sql);
      $newScn->bindValue(':pdkNo',$_REQUEST['pdkNo']);
      $newScn->bindValue(':scnNo',$last_id);
      $newScn->execute();

  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
if(isset($e) === false){
  header("location:back_pdk.php");
}else{
  echo $e;
}
?>