<?php
if(!isset($_SESSION['userinfoyyyyy' . SALT]) 
|| $_SESSION['userinfoyyyyy' . SALT] != "okbabieee"){
    header("Location: login.php");
    exit;
}
?>