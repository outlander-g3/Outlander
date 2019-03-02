<?php
error_reporting(0);
session_start();

try {
    $cuStart=$_GET['cuStart'];
    $cuEnd=$_GET['cuEnd'];
    $_SESSION['pdStart']=$cuStart;
    $_SESSION['pdEnd']=$cuEnd;
    


    //撈嚮導
    require_once("connectDb.php");
    // $sql="select a.pdNO ,a.gdNo1,a.gdNo2 from product a , guide b where a.pdStart BETWEEN 'cuStart=:cuStart' AND 'cuEnd=:cuEnd' AND a.gdNo1 >15 or a.gdNo2>15  ";
    $sql="select a.pdNO ,a.gdNo1,a.gdNo2 from product a , guide b where a.pdStart BETWEEN :cuStart AND :cuEnd AND a.gdNo1 >15";
    // $sql="select a.pdNO ,a.gdNo1,a.gdNo2,a.pdStart from product a , guide b where a.pdStart BETWEEN '2019-03-13' AND '2019-03-17' AND a.gdNo1 >15";
    $scnG=$pdo->prepare($sql);
    $scnG->bindValue(':cuStart',$cuStart);
    $scnG->bindValue(':cuEnd',$cuEnd);
    $scnG->execute();  

   

    //當日有帶團之嚮導的小山屋
    $arr =[];
    while($scnGRows = $scnG->fetch(PDO::FETCH_ASSOC)){
        array_push($arr, $scnGRows['gdNo1'],$scnGRows['gdNo2']); 
    }
    //刪除重複的值
    $arrR =array_unique($arr);

    //給編號21-25的嚮導編號
    $arr2 =[];
    for($i =21 ; $i <= 25 ; $i++){
        array_push($arr2,$i);
    }

    //可帶團嚮導的小山屋
    $temparray =[];
    //判斷誰可帶團
    for($j=0; $j< count($arrR);$j++){
        for($k=0;$k<count($arr2);$k++){
            //如果是有空的嚮導就抓出來
            if(!in_array($arr2[$k] ,$arrR)  ){
                array_push($temparray,$arr2[$k]);
            }
        }
    }

    //將可帶團
    $values = implode(",",array_unique($temparray));
    
    $sql ="select gdName ,gdImg ,skill,gdNo from guide where gdNo in ($values)";
    $scnG2=$pdo->prepare($sql);
    $scnG2->execute();
    while($scnGRow2s = $scnG2->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="cu__guideItem cu__guideItem1">
                <img src="img/guide/',$scnGRow2s['gdImg'],'" alt="嚮導照片">
                <input type="hidden" value="',$scnGRow2s['gdName'],'|',$scnGRow2s['skill'],'|',$scnGRow2s['gdNo'],'">
            </div>  ';
    }

} catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>