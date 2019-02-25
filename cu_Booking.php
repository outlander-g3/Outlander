<?php
    session_start();
    $pdkPrice = $_POST['pdkPrice'];
    $gdNo1 = $_POST['gdNo1'];
    $day = $_POST['day'];
    $pdkName = $_POST['pdkName'];

    try {
        $_SESSION['pdkPrice']=$pdkPrice;
        $_SESSION['gdNo1']=$gdNo1;
        $_SESSION['day']=$day;
        $_SESSION['pdkName']="客製行程 - ".$pdkName;
        $_SESSION['where']=$_SERVER["PHP_SELF"];
        header('Location:cart.php');

    } catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }
?>