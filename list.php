<?php
session_start();
error_reporting(1);
include "config.php";
include 'libraries/linkProcess.php';
$linkObj = new Link();

include "kiem-tra-login.php";

$totalItem = $linkObj->getTotalLink();
$pages = ceil($totalItem / LINK_LIST_LIMIT);

$curPage = 1;
if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ){
    $curPage = $_GET['page'];
}
if($curPage > $pages){
    $curPage = $pages;
}

$curIndex = ($curPage - 1) * LINK_LIST_LIMIT;

$links = $linkObj->getAllLink($curIndex, LINK_LIST_LIMIT);

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
        <div class="row">
            <h1>Danh sách link đã tạo</h1>
            <a href="add" class="btn btn-primary" >Thêm link mới</a>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>UUID</th>
                            <th>Link</th>
                            <th>Created At</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($links as $item){
                        ?>
                            <tr>
                                <td><?=$item['id']?></td>
                                <td><?=$item['uuid']?></td>
                                <td>
                                    <div style="max-width: 585px;word-wrap: break-word;word-break: break-all;">
                                        <?=$item['target']?>
                                    </div>
                                </td>
                                <td><?=date("H:i d/m", strtotime($item['created_at']))?></td>
                                <td>
                                    <a href="del.php?id=<?=$item['id']?>" 
                                        onclick="return confirm('Ghét quá xóa luôn đúng hok?')" 
                                        title="Ghét quá bấm phát để xóa ẻm" 
                                        class="btn btn-warning btn-xs">
                                        <i class="glyphicon glyphicon-remove" aria-hidden="true"></i> Xóa ẻm</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <ul class="pagination">
                            <?php
                                for($i=1; $i <= $pages; $i++){
                                    $classActive = "";
                                    if($curPage == $i){
                                        $classActive = 'class="active"';
                                    }
                            ?>
                                <li <?=$classActive?>><a href="list.php?page=<?=$i?>"><?=$i?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
