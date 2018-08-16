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
                Trang sẽ tự chuyển hướng sau <span id="countdown"><?=WAIT_TIME?></span> giây.
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
            <div class="col-lg-12">
                <?php
                    include "quang-cao.php";
                ?>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script type='text/javascript'>

var count = <?=WAIT_TIME?>;

var _0x7161=[];var myInterval

var msg = {
    error : "Đường dẫn không hợp lệ hoặc không tồn tại, Vui lòng kiểm tra lại"
};

var _0xf80e=["\x66\x6F\x63\x75\x73","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x62\x6C\x75\x72","\x68\x72\x65\x66","\x61\x74\x74\x72","\x23\x62\x74\x6E\x2D\x63\x6C\x69\x63\x6B","","\x68\x74\x74\x70","\x73\x74\x61\x72\x74\x73\x57\x69\x74\x68","\x68\x69\x64\x64\x65\x6E","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x65\x72\x72\x6F\x72","\x68\x74\x6D\x6C","\x23\x65\x72\x72\x6F\x72","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x63\x6F\x75\x6E\x74\x64\x6F\x77\x6E","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x63\x6C\x65\x61\x72\x49\x6E\x74\x65\x72\x76\x61\x6C","\x68\x69\x64\x65","\x23\x63\x6F\x75\x6E\x74\x64\x6F\x77\x6E\x78","\x73\x65\x74\x49\x6E\x74\x65\x72\x76\x61\x6C"];window[_0xf80e[1]](_0xf80e[0],startTimer);window[_0xf80e[1]](_0xf80e[2],stopTimer);function datax(_0x71d6x2){$(_0xf80e[5])[_0xf80e[4]](_0xf80e[3],_0x71d6x2);if(_0x71d6x2!= _0xf80e[6]&& _0x71d6x2[_0xf80e[8]](_0xf80e[7])){$(_0xf80e[5])[_0xf80e[10]](_0xf80e[9]);window[_0xf80e[11]][_0xf80e[3]]= _0x71d6x2}else {$(_0xf80e[14])[_0xf80e[13]](msg[_0xf80e[12]]);$(_0xf80e[14])[_0xf80e[10]](_0xf80e[9])}}function timerHandler(){count--;document[_0xf80e[17]](_0xf80e[16])[_0xf80e[15]]= count;if(count< 1){window[_0xf80e[18]](myInterval);callme();$(_0xf80e[20])[_0xf80e[19]]()}}startTimer();function startTimer(){if(count> 1){myInterval= window[_0xf80e[21]](timerHandler,1000)}}function stopTimer(){window[_0xf80e[18]](myInterval)}

function callme(){
    $.post('validation', {'<?=$strRandKey?>' : '<?=$key?>'}, datax);
}
    </script>
</body>
</html>
