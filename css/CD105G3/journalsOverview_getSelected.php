<?php
ob_start();
session_start();

$mt= $_REQUEST["pdkNo"];


try{
    require_once("connectDb.php");

    // $sqlJns = "SELECT * FROM `journal` a LEFT JOIN `productkind` b ON a.pdkNo =b.pdkNo order by a.jnDate desc";
    // $sqlJns = "SELECT * FROM `journal` order by jnDate desc";
    $sqlJns="SELECT * FROM `journal` where pdkNo = :pdkNo and jnStatus = 1 order by jnDate desc";
   
     
    $selected = $pdo->prepare($sqlJns);
    $selected -> bindValue(":pdkNo",$mt);
    $selected->execute();


    
    if( $selected->rowCount() == 0 ){ //找不到
      //傳回空的JSON字串    
    //   echo "查無此筆資料";
    }else{ //找得到
      //取回一筆資料
        while($selectedRow = $selected->fetch(PDO::FETCH_ASSOC)){
            $jnCont = mb_substr(strip_tags($selectedRow["jnCont"]),0,50,"utf-8");
      //送出html結構字串
      $html =
        " <div class='row'></div>
        <a href='jn.php?jnNo={$selectedRow['jnNo']}'>
                <article class='jo__onecard jnsView'>
                    <div class='whole'>
                    <img src='img/jn/{$selectedRow['jnNo']}/1.jpg'>
                        <div class='jo__allinfo'>
                            <p class='jo__publish'>發表於{$selectedRow['jnDate']}<span class='jnNo'>{$selectedRow['jnNo']}</span></p>
                            <h3>{$selectedRow['jnTitle']}</h3>
                            <p class='jo__text'>{$jnCont}...</p>

                            <div class='icon'>
                                <div class='icon heart'>
                                    <i class='material-icons favHeart favJoBtn3' >favorite_border</i>
                                    <span>{$selectedRow['jnCollect']}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </a>";
      echo $html;  
      }
    }    
}catch(PDOException $e){
    echo $e->getMessage();
}
?>