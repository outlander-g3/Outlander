<?php
$continent= $_REQUEST["continent"];
$budgetType= $_REQUEST["budgetType"];
$levelType= $_REQUEST["levelType"];

$dateInfo = $_REQUEST["dateInfo"];
echo"原本:",$dateInfo,"<br>";
$strtime = strtotime($dateInfo);
$newDate=date('Y-m-d',$strtime );
echo"日期str:",$newDate,"<br>";

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
  if($dateInfo!="請選擇日期"){
    $sql .= ' and b.pdStart > :pdStart';
  }
  $sql .= ' group by a.pdkNo';
  // $member = $pdo->query();
  // $sql = "select * from productkind where continent=:continent";//從行程總覽抓
  // $sql = "select * from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent limit 9";//從開團資訊抓
  // $sql = "select distinct pdkName from product a join productkind b on a.pdkNo = b.pdkNo where continent=:continent";//唯一性

  $selected = $pdo->prepare( $sql );
  $dateSearch = $pdo->prepare( $sql );//日期
  $dateSearch->bindParam(":pdStart",$newDate);//日期
  $selected->execute();

  if( $dateSearch->rowCount() == 0 ){ //找不到
    //   傳回空的JSON字串
      echo "查無此筆資料";
    }else{ //找得到
    //   取回一筆資料
        while($dateSearchRow = $dateSearch->fetch(PDO::FETCH_ASSOC)){
          echo "資料庫取回:",$dateSearchRow["pdStart"],"<br>";
    //   送出html結構字串
      $html =
      "<div class='pro-item pro-item-three'>
              <a href='products.html'>
                  <div class='pro-item-pic pro-item-pic-hot'>
                      <img src='img/mt/{$dateSearchRow['pdkNo']}/1.jpg' alt='EBC'>
                  </div>
                  <h4>{$dateSearchRow["pdkName"]}</h4>
                  <div class='pro-item-view-flex'>
                      <p>評價：</p>
                      <img src='img/tree_j.png' alt='rate'>
                  </div>
                  <p>天數：{$dateSearchRow["day"]}</p>
                  <div class='pro-item-view-float'>
                      <p>難易度：</p>
                      <div class='hike-float'>
                          <span class='hike'>
                              <i class='fas fa-hiking'></i>
                          </span>
                      </div>
                      <h4>NTD{$dateSearchRow['pdkPrice']}</h4>
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




  if( $selected->rowCount() == 0 ){ //找不到
    //傳回空的JSON字串
    echo "查無此筆資料";
  }else{ //找得到
    //取回一筆資料
      while($selectedRow = $selected->fetch(PDO::FETCH_ASSOC)){
    //送出html結構字串
    $html =
    "<div class='pro-item pro-item-three'>
            <a href='products.html'>
                <div class='pro-item-pic pro-item-pic-hot'>
                    <img src='img/mt/{$selectedRow['pdkNo']}/1.jpg' alt='EBC'>
                </div>
                <h4>{$selectedRow["pdkName"]}</h4>
                <div class='pro-item-view-flex'>
                    <p>評價：</p>";
                    for($i=0; $i<floor($selectedRow['avgRate']); $i++){ 
                      $html .= "<img src='img/tree_j.png'>";
                     } 
                      if($selectedRow['avgRate']*10%10 != 0){
                        $html .= '<img src="img/tree_f_h.png" class="tree_half" alt="rate">';
                      }         
                    $html .="
                </div>
                <p>天數：{$selectedRow["day"]}</p>
                <div class='pro-item-view-float'>
                    <p>難易度：</p>
                    <div class='hike-float'>
                        <span class='hike'>";
                        for($i=0; $i<$selectedRow["level"]; $i++){
                          $html .= '<i class="fas fa-hiking"></i>';
                        }                 
                        $html .="
                        </span>
                    </div>
                    <h4>NTD{$selectedRow['pdkPrice']}</h4>
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


