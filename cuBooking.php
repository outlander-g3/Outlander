<?php
    session_start();
    $pdkPrice = $_POST['pdkPrice'];
    $gdNo1 = $_POST['gdNo1'];

    try {
        $_SESSION['pdkPrice']=$pdkPrice;
        $_SESSION['gdNo1']=$gdNo1;
        $_SESSION['where']=$_SERVER["PHP_SELF"];

    } catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }
?>