<?php
$continent= $_REQUEST["continent"];
$budgetType= $_REQUEST["budgetType"];
$levelType= $_REQUEST["levelType"];

try{
  $dsn = "mysql:host=localhost;port=3306;dbname=cd105g3;charset=utf8";
  $user = "root";
  $password = "root";
  $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO( $dsn, $user, $password, $options);  
  $sql = 'select a.*, avg(rate) avgRate 
  from productkind a join product b on a.pdkNo=b.pdkNo
  join `order` c on b.pdNo=c.pdNo
  where continent is not null';
  if($continent != 'choose'){
    $sql .= ' and continent='.$continent;
  }
  if($budgetType != 'choose'){
    if ($budgetType == 1){
      $sql .= ' and pdkPrice between 0 and 10000';
    }elseif($budgetType == 2){
      $sql .= ' and pdkPrice between 10000 and 50000';
    }else{
      $sql .= ' and pdkPrice between 50000 and 200000';
    }
    // $sql .= ' and pdkPrice='.$budgetType;
  }
  if($levelType != 'choose'){
    $sql .= ' and level='.$levelType;
  }
  $sql .= ' group by a.pdkNo';
  // $member = $pdo->query();
  // $sql = "select * from productkind where continent=:continent";//從行程總覽抓
  // $sql = "select * from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent limit 9";//從開團資訊抓
  // $sql = "select distinct pdkName from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent";//唯一性

  $member = $pdo->prepare( $sql );
  $member->execute();

  if( $member->rowCount() == 0 ){ //找不到
    //傳回空的JSON字串
    echo "查無此筆資料";
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
                    <img src='img/tree_j.png' alt='rate'>
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


