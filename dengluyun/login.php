<meta charset="utf-8">
<?php
session_start();
if(!empty($_SESSION['name'])){
echo "你是管理员，你现在拥有后台管理权限";
header("Location:deng_2.php");}
?>

