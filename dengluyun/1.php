<?php
session_start();



echo "<center>欢饮你，{$_SESSION['name']}管理员。<br>";
$_SERVER['REMOTE_ADDR']=htmlspecialchars($_SERVER['REMOTE_ADDR']);

  echo "您的ip：{$_SERVER['REMOTE_ADDR']}<br>";//显示ip 
  

 

 
  ?> 










