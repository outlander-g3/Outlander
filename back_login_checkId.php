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
		$_SESSION['backwhere'] = $_SERVER['PHP_SELF'];
		header("location:back_login.php");
	}else{
		$admRow = $admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION["admNo"] = $admRow["admNo"];
      $_SESSION["admId"] = $admRow["admId"];
      $_SESSION["admPsw"] = $admRow["admPsw"];
      $_SESSION["admName"] = $admRow["admName"];
      $_SESSION["admPower"] = $admRow["admPower"];
      if($admRow["admImg"] == ''){
        $admRow["admImg"] = 'default.jpg';
      }
			$_SESSION["admImg"] = $admRow["admImg"];
			if(isset($_SESSION['backwhere'])){
				unset($_SESSION['backwhere']);
			}
      header("location:back_product.php");
	}
} catch (PDOException $e) {
	$errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
	$errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>