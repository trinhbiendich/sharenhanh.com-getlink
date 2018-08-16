<?php
session_start();
include "config.php";

if(!isset($_SESSION[DATA_KEY]) || count($_SESSION[DATA_KEY]) == 0){
    echo "#hacker"; exit;
}

$data = $_SESSION[DATA_KEY];
$objData = array();
$clientKey = "hack22222222222222222252222222222222222";
$linkId = "kack453464655657547575756756767567567567";
foreach($data as $key=>$item){
    $matchKey = $item['matchkey'];
    if(isset($_POST[$matchKey])){
        $linkId = $key;
        $clientKey = $_POST[$matchKey];
        $objData = $item;
        break;
    }
}
if(count($objData) < 1){
    echo "#di-duong-tat-khong-hop-le"; exit;
}

if($clientKey != $objData['val']){
    echo "#khong-khop"; exit;
}

$requestTime = $_SERVER['REQUEST_TIME'];
$logTime = $objData['systime'];

if(($requestTime - $logTime) < WAIT_TIME){
    echo "#hacker-tap-2"; exit;
}

include 'libraries/linkProcess.php';
$linkObj = new Link();

$link = $linkObj->getLink($linkId);
if(!$link || count($link) == 0){
    echo "#link-khong-ton-tai"; exit;
}

echo $link['target']; exit;

?>
