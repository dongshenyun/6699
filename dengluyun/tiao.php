<?php
    if(!isset($_GET['info'])){
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3"/>
        <title>正在跳转中...</title>
    </head>
    <body>
        <div><?php echo $_GET['info']; header("location:index.php");?></div>
    </body>
</html>
