<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYSQL数据库转换系统 - Powered By xgcms.com</title>
<link rel="stylesheet" href="skins/style.css" type="text/css" />
<script type="text/javaScript" src="skins/images/jquery.min.js"></script>
<script type="text/javaScript" src="skins/images/common.js"></script>
<!--<script type="text/javascript" src="http://cbjs.baidu.com/js/m.js"></script>-->
</head>

<body>
<? global $m,$a; ?>
<div id="header">
<div id="top">
  <div id="right">
  <div id="logo">
    <img src="skins/images/logo.png" alt="MC数据库转换系统！" />
  </div>
  <div id="menu">
    <ul>
      <li <?=$m=='index'?'class="now"':'';?>><a href="?m=index">链接库</a></li>
      <li <?=$a=='taskadd'||$a=='fields'?'class="now"':'';?>><a href="?m=task&a=taskadd">添加任务</a></li>
      <li <?=$a=='tasklist'?'class="now"':'';?>><a href="?m=task&a=tasklist">任务列表</a></li>
      <li <?=$m=='tool'?'class="now"':'';?>><a href="?m=tool">数据库工具</a></li>
      <li><a href="http://post.xgcms.com/forum/index-7-1.html" target="_blank">交流论坛</a></li>
      <li><a href="?a=logout">退出登录</a></li>
   </ul>
  </div>
  </div>
  <div id="banner">
  <!--
  <script type="text/javascript">BAIDU_CLB_fillSlot("138866");</script>-->
  </div>
</div>  
</div>