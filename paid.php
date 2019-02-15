<?php

echo $_REQUEST['buyName'];
echo $_REQUEST['buyMail'];
echo $_REQUEST['buyTel'];
$psgName=$_REQUEST['psgName'];
foreach ($psgName as $i=>$value){
    echo $value;
    echo $_REQUEST['psgTel'][$i];
    echo $_REQUEST['psgId'][$i];
    echo $_REQUEST['psgBd'][$i];    
}


?>