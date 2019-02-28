<?php
ob_start();
session_start();
$memNo = $_SESSION['memNo'];
$memId=$_POST['memId'];
$memMail=$_POST['memMail'];


try {
        require_once("connectDb.php");
        echo $memId;
        $sql = "UPDATE `member` SET `memId`=:memId,`memMail`=:memMail WHERE `memNo`= ".$_SESSION['memNo']."";
        $qq = $pdo->prepare($sql);
        $qq -> bindValue(":memId", $memId);
        $qq -> bindValue(":memMail", $memMail);
        $qq->execute();

        switch( $_FILES["upImg"]["error"] ){
                case UPLOAD_ERR_OK:
                        $name = $_FILES["upImg"]["name"] ="$memNo.jpg";
                        $from = $_FILES['upImg']['tmp_name'];
                        $to = "img/member/{$_FILES['upImg']['name']}";
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
                        echo "['error']: " , $_FILES['upImg']['error'] , "<br>";
        }
    	

} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}

header("Location: member.php"); 
?> 