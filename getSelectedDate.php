<?php
session_start();

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
    // $sql ="select b.pdStart, a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo where b.pdStart > curdate() group by a.pdkNo order by b.pdStart";
    $sql ="select b.pdStart, a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo where b.pdStart > :pdStart group by a.pdkNo order by b.pdStart";
    $dateSearch = $pdo->prepare( $sql );
    $dateSearch->bindParam(":pdStart",$newDate);
    $dateSearch->execute();
  
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

?>


