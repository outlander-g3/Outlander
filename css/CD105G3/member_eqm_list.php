<?php
session_start();
$ordNo=$_POST['ordNo'];
try {

    require_once("connectDb.php");

    $sql="select * from equipment e,orderchecklist oc where e.eqmNo=oc.eqmNo and ordNo=:ordNo order by oc.eqmNo desc";
    $list=$pdo->prepare($sql);
    $list->bindValue(':ordNo',$ordNo);
    $list->execute();
    
    if($list->rowCount()==0){
        echo "none";
    }
    //代表有這人存在
    else{
        // echo 'exist';
        $str1="<div class='eqList' id='eqmClass1'>
                <div class='eqCont'>
                <h3>寢具類</h3>
                <ul>";
        $str2="<div class='eqList' id='eqmClass2'>
                <div class='eqCont'>
                <h3>醫療類</h3>
                <ul>";
        $str3="<div class='eqList' id='eqmClass3'>
                <div class='eqCont'>
                <h3>衣物類</h3>
                <ul>";
        $str4="<div class='eqList' id='eqmClass4'>
                <div class='eqCont'>
                <h3>配件類</h3>
                <ul>";
        $str5="<div class='eqList' id='eqmClass5'>
                <div class='eqCont'>
                <h3>炊具類</h3>
                <ul>";
        $str6="<div class='eqList' id='eqmClass6'>
                <div class='eqCont'>
                <h3>食品類</h3>
                <ul>";

        while ($rows=$list->fetchObject()){
            //是否已被勾選
            if($rows->checked){
                $checked='checked="true"';
            }
            else{
                $checked='';
            }

            //判斷分類
            if($rows->eqmKind=='寢具類'){
                
                $str1.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';
            }
            else if($rows->eqmKind=='醫療類'){
                $str2.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';
            }
            else if($rows->eqmKind=='衣物類'){
                $str3.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';

            }
            else if($rows->eqmKind=='配件類'){
                $str4.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';

            }
            else if($rows->eqmKind=='炊具類'){
                $str5.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';

            }
            else if($rows->eqmKind=='食品類'){
                $str6.='<li>
                    <label for="eqmNo'.$rows->eqmNo.'">
                        <span>'.$rows->eqmName.'</span>
                        <input type="checkbox" '.$checked.'  id="eqmNo'.$rows->eqmNo.'">
                        <i class="material-icons">check_box</i>
                        <i class="material-icons">check_box_outline_blank</i>
                        <div class="clearfix"></div>
                    </label>
                    <i class="material-icons delete">delete</i>
                </li>';

            }
            
            
        }
        // //跑完while每一個後面都要加上add
        $str1.='</ul>
            <div class="eqPlus">
            <label for="add1">
                <input type="text" id="add1" maxlength="15" placeholder="按下enter增加裝備">
                <i class="material-icons add">add</i>
            </label>
            </div>
            </div>
            </div>';
        $str2.='</ul>
        <div class="eqPlus">
        <label for="add2">
            <input type="text" id="add2" maxlength="15" placeholder="按下enter增加裝備">
            <i class="material-icons">add</i>
        </label>
        </div>
        </div>
        </div>';
        $str3.='</ul>
        <div class="eqPlus">
        <label for="add3">
            <input type="text" id="add3" maxlength="15" placeholder="按下enter增加裝備">
            <i class="material-icons">add</i>
        </label>
        </div>
        </div>
        </div>';
        $str4.='</ul>
        <div class="eqPlus">
        <label for="add4">
            <input type="text" id="add4" maxlength="15" placeholder="按下enter增加裝備">
            <i class="material-icons">add</i>
        </label>
        </div>
        </div>
        </div>';
        $str5.='</ul>
        <div class="eqPlus">
        <label for="add5">
            <input type="text" id="add5" maxlength="15" placeholder="按下enter增加裝備">
            <i class="material-icons">add</i>
        </label>
        </div>
        </div>
        </div>';
        $str6.='</ul>
        <div class="eqPlus">
        <label for="add6">
            <input type="text" id="add6" maxlength="15" placeholder="按下enter增加裝備">
            <i class="material-icons">add</i>
        </label>
        </div>
        </div>
        </div>';

            $str=$str1.$str2.$str3.$str4.$str5.$str6;
            echo $str;
            //合成一個字串
    }
}

catch (PDOException $e) {
    echo "失敗",$e->getMessage(),"<br>";
    echo "行號",$e->getLine();
}
?>
