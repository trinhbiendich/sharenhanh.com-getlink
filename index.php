<?php
session_start();
error_reporting(1);
include "config.php";

include "xu-ly-getlink.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chuyển trang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid bg-3 text-center">
        <div class="row custom-row <?=$rightText . 'a'?>">
            <div class="col-lg-12" id="error">
                Trang sẽ tự chuyển hướng sau <span val="<?=$key?>" id="countdown">10</span> giây.
                <a target="_blank" id="btn-click" href="#" class="btn btn-success hidden">Nhấn vào đây nếu trang không tự chuyển hướng >> </a>
                <?php
                    if(empty($msg)){
                ?>
                
                <?php
                    }else{
                ?>
                    <span class="countdown label label-warning"><?=$msg?></span>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    <a href="https://irontrade.go2affise.com/click?pid=75&amp;offer_id=2"><img src="https://sharenhanh.com/wp-content/uploads/2018/07/sharenhanh-quangcaodao-irontrade-12hg.jpeg" class="img-responsive"></a>
                </p>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script type='text/javascript'>

var count = 10;
var myInterval;
var msg = {
    error : "Đường dẫn không hợp lệ hoặc không tồn tại, Vui lòng kiểm tra lại"
};
// Active
window.addEventListener('focus', startTimer);

// Inactive
window.addEventListener('blur', stopTimer);

function datax(data){
    $("#btn-click").attr("href", data);
    
    if(data != "" && data.startsWith("http")){
        $("#btn-click").removeClass("hidden");
        window.location.href=data;
    }else{
        $("#error").html(msg.error);
        $("#error").removeClass("hidden");
    }
}

function timerHandler() {
    count--;
    document.getElementById("countdown").innerHTML = count;
    if(count < 1){
        window.clearInterval(myInterval);
        callme();
        $("#countdownx").hide();
    }
}



startTimer();
// Start timer
function startTimer() {
    if(count > 1){
        myInterval = window.setInterval(timerHandler, 1000);
    }
}

// Stop timer
function stopTimer() {
    window.clearInterval(myInterval);
}

function callme(){
    $.post('validation', {'<?=$strRandKey?>' : $("#countdown").attr("val")}, datax);
}
    </script>
</body>
</html>
