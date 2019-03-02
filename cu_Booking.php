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
        $_SESSION['pdStart']=$pdStart;
        // header('Location:cart.php');
        require_once("connectDb.php");

        $sql="insert into product(pdkNo,gdNo1,pdStart,pdStatus) values (:pdkNo,:gdNo1,:pdStart,0);";
        $product=$pdo->prepare($sql);
        $product->bindValue(':pdkNo',$_SESSION['pdkNo']);
        $product->bindValue(':gdNo1',$_SESSION['gdNo1']);
        $product->bindValue(':pdStart',$pdStart);
        $product->execute();
        $pdNo=$pdo->lastInsertId();

    } catch (PDOException $e) {
        echo "失敗",$e->getMessage(),"<br>";
        echo "行號",$e->getLine();
    }
?>