<?php
session_start();
error_reporting(1);
include "config.php";
include 'libraries/linkProcess.php';
$linkObj = new Link();

include "kiem-tra-login.php";

$randKey = rand() . time() . "6546dfgdfgdfg" . rand();
$strRandKey = substr(md5($randKey), -6);



$url = "";
$msg = "";
$oldUrl = "";
if(isset($_POST['id']) && isset($_POST['link'])){
    if(!empty($_POST['id']) && !empty($_POST['link'])){
        $id = $_POST['id'];
        $link = $_POST['link'];
        $addLink = $linkObj->insertNew($id, $link);
        if($addLink){
            $url = SITE_ROOT . $id;
        }else{
            $msg = "Không thể thêm, do có lỗi xảy ra";
            $oldUrl = $link;
        }
    }else{
        $msg = "Link không được rỗng";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm link mới</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid bg-3">
        <div style="margin-top:100px;"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center;">
                <a style="margin-bottom: 12px;float: right;" href="list.php" class="btn btn-primary" >Quản lý danh sách</a>
                <br>
                <?php
                    if(!empty($url)){
                ?>
                    <div class="from-group" style="text-align: left;">
                        <label>Click để chọn &amp; Ctrl + C :</label>
                        <input onClick="this.select();" type="text" value="<?=$url?>" class="input-md form-control"><br>
                    </div>
                <?php
                    }
                ?>
                <?php
                    if(!empty($msg)){
                ?>
                        <div class="alert alert-danger">
                            <?=$msg?>
                        </div>
                <?php
                    }
                ?>
                <form style="border: 1px solid;margin-top: 18px;padding: 10px;padding-top: 0px;" action="" method="post">
                    <h2>Tạo link</h2>
                    <input type="text" name="id" value="<?=$strRandKey?>" class="input-md form-control" placeholder="id">
                    <br>
                    <input type="text" name="link" value="<?=$oldUrl?>" class="input-lg form-control" placeholder="Link">
                    <br>
                    <input type="submit" class="btn btn-success" value="save" >
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>
</html>
