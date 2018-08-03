<?php
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
require 'inc/common.func.php';
if($_POST['submit']){
	$data = $_POST['data'];
		$rs = @mysql_connect($data['DB_HOST'].":".$data['DB_PORT'],$data['DB_USER'],$data['DB_PW']);
		if(!$rs){
            error('数据库连接失败!请检查数据库连接参数!');	
		}
		// 数据库不存在,尝试建立
		if(!@mysql_select_db($data['DB_NAME'])){
			$sql = "CREATE DATABASE `".$data["DB_NAME"]."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
			mysql_query($sql);
		}
		// 建立不成功
		if(!@mysql_select_db($data['DB_NAME'])){
			$this->error('建立失败,请手动创建数据库!~或者填写管理员分配的数据库名!');
		}
		// 保存配置文件
		//$config_old = C();
		$config = array(
		                'DB_HOST'=>$data['DB_HOST'],
						'DB_USER'=>$data['DB_USER'],
						'DB_PW'=>$data['DB_PW'],
						'DB_NAME'=>$data['DB_NAME'],
						'DB_PCONNECT'=>'0',
						'DB_CHARSET'=>'utf8',
		);
		set_config($config);
		echo 'eeeeeeeeeee';

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYSQL数据库转换系统 - Power By mysqlconver.com</title>
<link rel="stylesheet" href="skins/style.css" type="text/css" />
<script type="text/javaScript" src="skins/images/jquery.min.js"></script>
<script type="text/javaScript" src="skins/images/common.js"></script>
<style type="text/css">
#header #logo,#header #menu,#main{width:450px;}
#main h1{ font-family:Verdana, Geneva, sans-serif;font-size:16px;color:#333;height:40px;line-height:40px;}
#login{}
#login span{line-height:32px;}
#login .input{height:18px;line-height:18px;padding:2px 2px 2px 2px;border:1px solid #999;width:444px;}
</style>
</head>

<body>
<? global $m,$a; ?>
<div id="header">
  <div id="logo">
    <img src="skins/images/logo.png" alt="MC数据库转换系统！" />
  </div>
  <div id="menu">
    <ul>
      <li class="now"><a href="?a=login">安装程序</a></li>
      <li><a href="http://www.mysqlconvert.com" target="_blank">交流论坛</a></li>
   </ul>
  </div>
</div>
<div id="main">
<h1>Install the MysqlConvert</h1>
<p id="notice">安装之前请确保你的inc/config.inc.php文件及data目录可写。</p>
<form name="form" id="login" method="post" action="">
<span><font color="#FF0000">*</font>主机地址：</span><br />
<input type="text" name="data[DB_HOST]" value="localhost" class="input" /><br />
<span><font color="#FF0000">*</font>用 户 名：</span><br />
<input type="text" name="data[DB_USER]" value="root" class="input" /><br />
<span><font color="#FF0000">*</font>密　　码：</span><br />
<input type="text" name="data[DB_PW]" value="123456" class="input" /><br />
<span><font color="#FF0000">*</font>数据库名：</span><br />
<input type="text" name="data[DB_NAME]" value="mc" class="input" /><br />
<span><font color="#FF0000">*</font>数据库端口：</span><br />
<input type="text" name="data[DB_PORT]" value="3306" class="input" /><br />
<p>&nbsp;</p>
<input type="submit" name="submit" class="button" value="安 装" />
</form>
</div>
<?
include tpl('footer');
?>