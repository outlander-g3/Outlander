<?php
session_start();
error_reporting(0); 
$gdNo = $_REQUEST['gdNo'];
$gdName = $_REQUEST['gdName'];
$gdId = $_REQUEST['gdId'];
$gdTel = $_REQUEST['gdTel'];
$gdImg = $_REQUEST['gdImg'];
$gdStatus = $_REQUEST['gdStatus'];
$hp = $_REQUEST['hp'];
$exp = $_REQUEST['exp'];
$survival = $_REQUEST['survival'];
$strain = $_REQUEST['strain'];
$yds = $_REQUEST['yds'];
$skill = $_REQUEST['skill'];

try {
    require_once("connectDB.php");
    if(isset($_REQUEST['gdNo'])){
        $gdNo = $_REQUEST['gdNo'];
        $sql = 'update guide set gdName=:gdName,gdId=:gdId,gdTel=:gdTel,gdStatus=:gdStatus, hp=:hp, 
        exp=:exp, survival=:survival, yds=:yds,skill=:skill,strain=:strain
        where gdNo=:gdNo';
        $guide = $pdo -> prepare($sql);
        $guide->bindValue(':gdNo', $gdNo);
        $guide->bindValue(':gdId', $gdId);
        $guide->bindValue(':gdName', $gdName);
        $guide->bindValue(':gdTel', $gdTel);
        $guide->bindValue(':gdStatus', $gdStatus);
        $guide->bindValue(':hp', $hp);
        $guide->bindValue(':exp', $exp);
        $guide->bindValue(':survival', $survival);
        $guide->bindValue(':yds', $yds);
        $guide->bindValue(':skill', $skill);
        $guide->bindValue(':strain', $strain);
        $guide->execute();   
        header("location:back_guide.php");
    }else 
        if($gdNo == NULL){
            $sql = 'insert into guide ( gdName, gdId,gdTel,gdImg ,gdStatus,hp ,exp ,survival ,yds ,skill,strain)
            values ( :gdName,:gdId,:gdTel, :gdImg, :gdStatus, :hp,:exp,:survival,:yds,:skill,:strain)';
            $guide = $pdo -> prepare($sql);
            $guide->bindValue(':gdName', $gdName);
            $guide->bindValue(':gdId', $gdId);
            $guide->bindValue(':gdTel', $gdTel);
            $guide->bindValue(':gdImg', $gdImg);
            $guide->bindValue(':gdStatus', $gdStatus);
            $guide->bindValue(':hp', $hp);
            $guide->bindValue(':exp', $exp);
            $guide->bindValue(':survival', $survival);
            $guide->bindValue(':yds', $yds);
            $guide->bindValue(':skill', $skill);
            $guide->bindValue(':strain', $strain);
            $guide->execute(); 
            header("location:back_guide.php"); 
        }
	
} catch (PDOException $e) {
	echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}


?>