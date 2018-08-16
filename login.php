<?php
session_start();
error_reporting(1);
include "config.php";

if(isset($_SESSION['userinfoyyyyy' . SALT]) && $_SESSION['userinfoyyyyy' . SALT] == "okbabieee"){
    header("Location: add");
    exit;
}
?>

<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/custom.css" rel="stylesheet" >
    <!------ Include the above in your HEAD tag ---------->
</head>

<body id="LoginForm">
    <div class="container">
        
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Đăng nhập hệ thống</h2>
                    <p>Vui lòng nhập vào tài khoản và mật khẩu của đại ca</p>
                </div>
                <?php
                    if(isset($_SESSION['log' . SALT]) && $_SESSION['log' . SALT]['type'] == 'error'){
                ?>
                <div class="alert alert-danger">
                    <?=$_SESSION['log' . SALT]['msg']?>
                </div>
                <?php
                    }
                ?>
                <form id="Login" method="post" action="loginsm.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username"">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
    </div>


</body>

</html>