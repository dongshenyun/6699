<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYSQL数据库转换系统 - Power By mysqlconver.com</title>
<link rel="stylesheet" href="skins/style.css" type="text/css" />
<script type="text/javaScript" src="skins/images/jquery.min.js"></script>
<script type="text/javaScript" src="skins/images/common.js"></script>
<style type="text/css">
#header #logo,#header #menu,#main{width:350px;margin:0 auto;}
#main h1{ font-family:Verdana, Geneva, sans-serif;font-size:16px;color:#333;height:40px;line-height:40px;}
#login{}
#login span{line-height:32px;}
#login .input{height:18px;line-height:18px;padding:2px 2px 2px 2px;border:1px solid #999;width:344px;}
</style>
</head>

<body>
<? global $m,$a; ?>
<div id="header">
<div id="top">
  <div id="logo">
    <img src="skins/images/logo.png" alt="MC数据库转换系统！" />
  </div>
  <div id="menu">
    <ul>
      <li <?=$a=='login'?'class="now"':'';?>><a href="?a=login">管理员登录</a></li>
      <li><a href="http://post.xgcms.com/forum/index-7-1.html" target="_blank">交流论坛</a></li>
   </ul>
  </div>
</div>
</div>
<div id="main">
<h1>Login to MysqlConvert</h1>
<p id="notice">管理员用户名及密码请到inc/config.inc.php中设置</p>
<form name="loginform" id="login" method="post" action="">
<span><font color="#FF0000">*</font>用户名：</span><br />
<input type="text" name="username" value="" class="input" /><br />
<span><font color="#FF0000">*</font>密　码：</span><br />
<input type="password" name="password" value="" class="input" /><br />
<p>&nbsp;</p>
<input type="submit" name="submit" class="button" value="登 录" />
</form>
</div>
<?
include tpl('footer');
?>