<?php
session_start();
$admName = $_REQUEST['admName'];
$admId = $_REQUEST['admId'];
$admPsw = $_REQUEST['admPsw'];
$admPower = $_REQUEST['admPower'];
try{
  require_once('connectDb.php');
  if(isset($_REQUEST['admNo'])){
    $admNo = $_REQUEST['admNo'];
    echo implode('',$_FILES["admImg"]);
    switch( $_FILES["admImg"]["error"] ){
      case UPLOAD_ERR_OK:
        if( file_exists("img/admin") === false){
          mkdir("img/admin");
        }
        $name = $_FILES["admImg"]["name"] = "$admNo.jpg";
        $from = $_FILES['admImg']['tmp_name'];
        $to = "img//admin//{$_FILES['admImg']['name']}";
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
        echo "['error']: " , $_FILES['admImg']['error'] , "<br>";
    }
    if($_FILES["admImg"]["error"] == 'OK'){
      $sql = 'update admin set admName=:admName, admId=:admId,
      admPsw=:admPsw, admPower=:admPower, admImg=:admImg
      where admNo=:admNo';
      $admin = $pdo -> prepare($sql);
      $admin->bindValue(':admImg', $_FILES["admImg"]["name"]);
    }else{
      $sql = 'update admin set admName=:admName, admId=:admId,
      admPsw=:admPsw, admPower=:admPower
      where admNo=:admNo';
      $admin = $pdo -> prepare($sql);
    }
    $admin->bindValue(':admNo', $admNo);
    $admin->bindValue(':admId', $admId);
    $admin->bindValue(':admName', $admName);
    $admin->bindValue(':admPsw', $admPsw);
    $admin->bindValue(':admPower', $admPower);
    $admin->execute();
    
  }else{
      $sql = 'insert into admin (admName, admId, admPsw, admPower)
      values (:admName, :admId, :admPsw, :admPower)';
      $admin = $pdo -> prepare($sql);
      $admin->bindValue(':admPsw', $admPsw);
      $admin->bindValue(':admName', $admName);
      $admin->bindValue(':admId', $admId);
      $admin->bindValue(':admPower', $admPower);
      $admin->execute();
  }
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}
if(isset($e) === false){
  header("location:back_admin.php");
}else{
  echo $e;
}
?>