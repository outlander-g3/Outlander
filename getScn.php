<?php
error_reporting(0);
$pdkNo=$_GET['pdkNo'];
try {

    require_once("connectDb.php");
    $sql="select a.pdkNo,a.scnOrd, b.scnTitle , b.scnImg , b.scnPrice , b.scnNo , b.scnCont , b.iconList from scenerylist a,scenery b where pdkNo=:pdkNo AND a.scnNo = b.scnNo";
    $scns=$pdo->prepare($sql);
    // $pdkNo =0;
    $scns->bindValue(':pdkNo',$pdkNo);
    $scns->execute();
    // $scnRows = $scns -> fetch();
    // if($scnRows['pdkNo']==1){
    //     echo $scnRows['pdkNo'];
    //     echo $scnRows['scnNo'];
    //     echo $scnRows['scnOrd'];

    // }
  
	while($scnRows = $scns->fetch(PDO::FETCH_ASSOC)){
		// echo $scnRows['scnImg'],"|";
        echo' <div class="cuCustom__sceneryItem" id="cu',$scnRows['scnNo'],'" style="background-image: url(../img/mt/',$scnRows['pdkNo'],'/scn/';
        echo $scnRows['scnNo']%3+1,'.jpg);">
        <div class="cuCustom__sceneryContent">
            <p>',$scnRows['scnTitle'],'</p>';
            $aaa = explode("|",$scnRows['iconList']);
            for($i=0;$i<count($aaa);$i++){
                if(strstr($aaa[$i],'fa-')){
                    echo '<i class="fas ',$aaa[$i],'"></i>';
                } else {
                    echo '<i class="material-icons">',$aaa[$i],'</i>';
                }
            };
        echo '</div>
                <button class="btn_cuAddScenery--767 cuBtn__styleClear">
                    <i class="material-icons">check_box_outline_blank</i>
                </button>
                <span class="cuCustom__price1">$',$scnRows['scnPrice'],'</span>
                <div class="cuCustom__showOption">
                    <button id="scu',$scnRows['scnNo'],'" class="btn_cuAddScenery">
                        <input type="hidden" value="',$scnRows['scnTitle'],"|",$scnRows['scnImg'],"|",$scnRows['scnPrice'],"|cu",$scnRows['scnNo'],"|",$scnRows['scnCont'],'">
                        <i class="material-icons">add</i>
                    </button>
                    <button class="btn_cuWatchScenery">
                        <i class="material-icons" >search</i>
                    </button>
                </div>
            </div>';
    // echo $scnRows['iconList'];

    }



} catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>