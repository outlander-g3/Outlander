<?php
try{
    require_once('connectDb.php');
    $sql='select a.*, avg(rate) avgRate from productkind a join product b on a.pdkNo = b.pdkNo join `order` c on b.pdNo = c.pdNo group by pdkNo order by avgRate DESC';
    $selected = $pdo->prepare( $sql );
    $selected->execute();
    if( $selected->rowCount() == 0 ){ 
    echo "查無此筆資料";
  }else{ 
      while($selectedRow = $selected->fetch(PDO::FETCH_ASSOC)){
        $pdkPrice =number_format($selectedRow["pdkPrice"]);
    $html =
    "<div class='pro-item pro-item-three'>
            <a href='product.php?pdkNo={$selectedRow['pdkNo']}'>
                <div class='pro-item-pic pro-item-pic-hot'>
                    <img src='img/mt/{$selectedRow['pdkNo']}/1.jpg' alt='EBC'>
                </div>
                <h4>{$selectedRow["pdkName"]}</h4>
                <div class='pro-item-view-flex'>
                    <p>評價：</p>";
                    for($i=0; $i<floor($selectedRow['avgRate']); $i++){ 
                      $html .= "<span class='tree_f'><img src='img/tree_j.png' alt='rate'></span>";
                     } 
                      if($selectedRow['avgRate']*10%10 != 0){
                        $html .= '<span class="tree_f_h"><img src="img/tree_f_h.png" alt="rate"></span>';
                      }         
                    $html .="
                </div>
                <p>天數：{$selectedRow["day"]}天</p>
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
                    <div class='clearfix'></div>
                </div>
                <h4 id='pdk-price'>NTD{$pdkPrice}</h4>
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