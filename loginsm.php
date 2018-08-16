<?php
session_start();
error_reporting(1);
include "config.php";

if(!isset($_POST['username']) || !isset($_POST['password'])){
    $_SESSION['log'] = array(
        "msg" => "Dữ liệu không hợp lệ",
        "type" => "error"
    );
    header("Location: login.php");
    exit;
}

if(empty($_POST['username']) || empty($_POST['password'])){
    $_SESSION['log' . SALT] = array(
        "msg" => "Dữ liệu không hợp lệ",
        "type" => "error"
    );
    header("Location: login.php");
    exit;
}

if($_POST['username'] != LOGIN_USERNAME){
    $_SESSION['log' . SALT] = array(
        "msg" => "Tài khoản không chính xác",
        "type" => "error"
    );
    header("Location: login.php");
    exit;
}

if($_POST['password'] != LOGIN_PASSWORD){
    $_SESSION['log' . SALT] = array(
        "msg" => "Mật khẩu không chính xác",
        "type" => "error"
    );
    header("Location: login.php");
    exit;
}

$_SESSION['userinfoyyyyy' . SALT] = "okbabieee";
header("Location: login.php");
exit;

?>