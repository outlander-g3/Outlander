<?php 

require_once("connectDb.php");
// echo "接通";
$sql = "SELECT b.* , AVG(rate) avgRate FROM( SELECT s.pdkNo FROM(SELECT `pdkNo`, count(*) counts FROM `productchecklist`  WHERE";
$i = 0;
if(isset($_REQUEST["equipment1"])){
  $equipment1 = $_REQUEST["equipment1"];
  $sql .="\t  eqmNo={$equipment1} \t or";
  $i++;
}
if(isset($_REQUEST["equipment2"])){
  $equipment2 = $_REQUEST["equipment2"];
  $sql .="\t  eqmNo={$equipment2}\t or";
  $i++;
  
}
if(isset($_REQUEST["equipment3"])){
$equipment3 = $_REQUEST["equipment3"];
$sql .="\t eqmNo={$equipment3}\t or";
$i++;
}
if(isset($_REQUEST["equipment4"])){
$equipment4 = $_REQUEST["equipment4"];
$sql .="\t eqmNo={$equipment4}\t or";
$i++;
  
}
if(isset($_REQUEST["equipment5"])){
$equipment5 = $_REQUEST["equipment5"];
$sql .="\t eqmNo={$equipment5}\t or";
$i++;
  
}
if(isset($_REQUEST["equipment6"])){
$equipment6 = $_REQUEST["equipment6"];
$sql .="\t eqmNo={$equipment6}\t or";
$i++;
  
}
if(isset($_REQUEST["equipment7"])){
$equipment7 = $_REQUEST["equipment7"];
$sql .="\t eqmNo={$equipment7}\t or";
$i++;
  
}
if(isset($_REQUEST["equipment8"])){
$equipment8 = $_REQUEST["equipment8"];
$sql .="\t eqmNo={$equipment8}\t or";
$i++;
}
$sql = substr($sql,0,-2);
// echo $sql;
$sql .= "\t GROUP BY pdkNo ) s   WHERE s.counts = $i) a LEFT JOIN `productkind` b on a.pdkNo = b.pdkNo LEFT JOIN `product` c ON c.pdkNo = b.pdkNo LEFT JOIN `order` d ON c.pdNo = d.pdNo GROUP BY b.pdkNo order by avgRate";

$te = $pdo -> query($sql);
// echo $sql;


?>

<?php	
            while($prodRowRe = $te->fetch(PDO::FETCH_ASSOC)){
              // echo $prodRowRe["pdkName"];
            ?>
            <div class="pro-item pro-item-three">
                <a href="product.php?pdkNo=<?php echo $prodRowRe['pdkNo'];?>">
                    <div class="pro-item-pic pro-item-pic-hot">
                        <img src="img/mt/<?php echo $prodRowRe['pdkNo'];?>/1.jpg" alt="EBC">
                    </div>
                    <h4><?php echo $prodRowRe["pdkName"];?></h4>
                    <div class="pro-item-view-flex">
                        <p>評價：</p>
                        <?php 
                        for($i=0; $i<floor($prodRowRe['avgRate']); $i++){ 
                        ?>
                        <span class="tree_f">
                            <img src="img/tree_j.png" alt="rate">
                        </span>
                        <?php 
                        } 
                        if($prodRowRe['avgRate']*10%10 != 0){
                        ?>
                        <span class="tree_f ">
                            <img src="img/tree_f_h.png" alt="rate" class="index-tree_f">
                        </span>
                        <?php
                        }?>  
                    </div>
                    <p>天數：<?php echo $prodRowRe["day"];?></p>
                    <div class="pro-item-view-float">
                        <p>難易度：</p>
                        <div class="hike-float">
                            <?php
                            for($i=0;$i<$prodRowRe["level"];$i++){
                            ?>
                            <span class="hike">
                                <i class="fas fa-hiking"></i>
                            </span>
                            <?php
                            }
                            ?>
                        </div>
                        <h4>NTD<?php echo $prodRowRe["pdkPrice"];?></h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
            <?php
            }
            ?>

