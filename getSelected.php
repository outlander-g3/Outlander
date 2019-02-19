<?php
$memId= $_REQUEST["continent"];
// echo $memId->co;
// echo $memId;
try{
  $dsn = "mysql:host=localhost;port=3306;dbname=cd105g3;charset=utf8";
  $user = "root";
  $password = "root";
  $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO( $dsn, $user, $password, $options);  

  $sql = " select * from productkind where continent=:continent";//從行程總覽抓
  // $sql = "select * from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent limit 9";//從開團資訊抓
  // $sql = "select distinct pdkName from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent";//唯一性

  $member = $pdo->prepare( $sql );
  // $member = $pdo->query( $sql );
  $member->bindValue(":continent", $memId);
  $member->execute();

  if( $member->rowCount() == 0 ){ //找不到
    //傳回空的JSON字串
    echo "<center>篩選中</center>";
  }else{ //找得到
    //取回一筆資料
      while($memRow = $member->fetch(PDO::FETCH_ASSOC)){
    //送出html結構字串
    $html =
    "<div class='pro-item pro-item-three'>
            <a href='products.html'>
                <div class='pro-item-pic pro-item-pic-hot'>
                    <img src='img/mt/{$memRow['pdkNo']}/1.jpg' alt='EBC'>
                </div>
                <h4>{$memRow["pdkName"]}</h4>
                <div class='pro-item-view-flex'>
                    <p>評價：</p>
                        <span class='tree_f'><img src='img/tree_f.png' alt='tree'></span>
                </div>
                <p>天數：{$memRow["day"]}</p>
                <div class='pro-item-view-float'>
                    <p>難易度：</p>
                    <div class='hike-float'>
                        <span class='hike'>
                            <i class='fas fa-hiking'></i>
                        </span>
                    </div>
                    <h4>NTD{$memRow['pdkPrice']}</h4>
                    <div class='clearfix'></div>
                </div>
                <div class='clearfix'></div>
            </a>
      </div>";
    echo $html;  
    }
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>


