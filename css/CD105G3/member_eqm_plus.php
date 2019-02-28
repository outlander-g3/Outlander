<?php
session_start();
$eqmName=$_POST['eqmName'];
$eqmKind=$_POST['eqmKind'];
$ordNo=$_POST['ordNo'];
try {
    require_once("connectDb.php");
    //塞入裝備表格
    $sql="insert into equipment(eqmName,eqmKind) values(:eqmName,:eqmKind)";
    $plus=$pdo->prepare($sql);
    $plus->bindValue(':eqmName',$eqmName);
    $plus->bindValue(':eqmKind',$eqmKind);
    $plus->execute();
    $str=$pdo->lastInsertId();
    $newItem = 
                '<li>
                    <label for="eqmNo'.$str.'">
                        <span>'.$eqmName.'</span>
                        <input type="checkbox" id="eqmNo'.$str.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>,'.$str;
    echo $newItem;

    //加入訂單裝備清單
    $sql="insert into orderchecklist(eqmNo,ordNo) values(:eqmNo,:ordNo)";
    $plus=$pdo->prepare($sql);
    $plus->bindValue(':eqmNo',$str);
    $plus->bindValue(':ordNo',$ordNo);
    $plus->execute();
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>