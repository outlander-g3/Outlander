<?php
session_start();
$admId = $_POST["admId"];
$admPsw = $_POST["admPsw"];
$errMsg = "";
try {
	require_once("connectDB.php");
	$sql = "select * from admin where admId=:admId and admPsw=:admPsw";
	$admin = $pdo->prepare($sql);
	$admin->bindValue(":admId", $admId);
	$admin->bindValue(":admPsw", $admPsw);
	$admin->execute();
	if($admin->rowCount() == 0){
		$_SESSION['reason'] = 'nonexist';
		header("location:back_login.php");
	}else{
		$admRow = $admin->fetch(PDO::FETCH_ASSOC);
		if($admRow['admPower'] == 0){
			$_SESSION['reason'] = 'admPower0';
			header("location:back_login.php");
		}else{
      $_SESSION["admNo"] = $admRow["admNo"];
      $_SESSION["admId"] = $admRow["admId"];
      $_SESSION["admPsw"] = $admRow["admPsw"];
      $_SESSION["admName"] = $admRow["admName"];
      $_SESSION["admPower"] = $admRow["admPower"];
      if($admRow["admImg"] == ''){
        $admRow["admImg"] = 'default.jpg';
      }
			$_SESSION["admImg"] = $admRow["admImg"];
			if(isset($_SESSION['reason'])){
				unset($_SESSION['reason']);
			}
      header("location:back_pdk.php");

		}
	}
} catch (PDOException $e) {
	$errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
	$errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>