<?php
$id = "00000";
$rightText = "";

if(!isset($_GET['id']) || empty($_GET['id'])){
    $msg = "Đường dẫn không hợp lệ, hoặc đã bị xóa !";
}else{
    $id = $_GET['id'];
    $rightText = "right-text";
}

$mst = rand() . time(). "sldt";
$key = md5($mst);

$randKey = rand() . time() . "6546dfgdfgdfg" . rand();
$strRandKey = substr(md5($randKey), -6);
if(!isset($_SESSION[DATA_KEY]) || count($_SESSION[DATA_KEY]) < 1){
    $_SESSION[DATA_KEY] = array(
        $id => array(
            "val" => $key,
            "matchkey" => $strRandKey,
            "systime" => time()
        )
    );
}else{
    $_SESSION[DATA_KEY][$id] = array(
            "val" => $key,
            "matchkey" => $strRandKey,
            "systime" => time()
        );
}
?>