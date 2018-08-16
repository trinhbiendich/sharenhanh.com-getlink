<?php
session_start();
error_reporting(1);
include "config.php";
include 'libraries/linkProcess.php';
$linkObj = new Link();

include "kiem-tra-login.php";

if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] < 0 ){
    $_SESSION['log' . SALT] = array(
        "msg" => "Dữ liệu không hợp lệ",
        "type" => "error"
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$checkDel = $linkObj->deleteItem($_GET['id']);

if(!$checkDel){
    $_SESSION['log' . SALT] = array(
        "msg" => "Hẻm xóa được, chắc do ID không đúng",
        "type" => "error"
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

$_SESSION['log' . SALT] = array(
    "msg" => "Đã xóa thành công rồi nha",
    "type" => "success"
);
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;

?>
