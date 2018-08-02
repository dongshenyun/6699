<?php include("session.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>blog</title>
<style type="text/css">
body{font-size:12px;}
ul,li,h2{margin:0;padding:0;}
ul{list-style:none;}
#top{width:900px;height:40px;margin:0 auto;background-color:#cc0}
#top h2{width:150px;height:40px;background-color:#FFF4C1;float:right;font-size:14px;text-align:center;line-height:40px;}
#topTags{width:750px;height:40px;margin:0 auto;background-color:#cc0;float:left}
#topTags ul li{float:left;width:100px;height:25px;margin-right:5px;display:block;text-align:center;cursor:pointer;padding-top:15px;}
#main{width:900px;height:500px;margin:0 auto;background-color:#F5F7E6;}
#leftMenu{width:150px;height:500px;background-color:#cc0;float:left}
#leftMenu ul{margin:10px;}
#leftMenu ul li{width:130px;height:30px;display:block;background:#F5F7E6;cursor:pointer;line-height:30px;text-align:center;margin-bottom:5px;}
#leftMenu ul li a{color:#000000;text-decoration:none;}
#content{width:750px;height:500px;float:left}
.content{width:740px;height:490px;display:none;padding:5px;overflow-y:auto;line-height:30px;}
#footer{width:900px;height:30px;margin:0 auto;background-color:#ccc;line-height:30px;text-align:center;}
.content1 {width:740px;height:490px;display:block;padding:5px;overflow-y:auto;line-height:30px;}
a{color:#000000;text-decoration:none;}
</style>
</head>
<body>
<div id="top">
<h2><a href="1.php" target="xianshi">管理菜单</a></h2>
<div id="topTags">
<ul>
</ul>
</div>
</div>
<div id="main"> 
<div id="content">

<iframe width=100% height=100% name="xianshi" frameborder=0 src="1.php"></iframe>
</div>
<div id="leftMenu">
<ul>
<li><a href="editor/demo2.php" target="xianshi">添加文章</a></li>
<li><a href="editor/delect.php" target="xianshi">管理文章</a></li>
<li><a href="editor/select.php" target="xianshi">文章分类</a></li>
<li>留言管理</li>
<li><a href="file.php" target="xianshi">文件管理</li>
<li><a href="yh.php" target="xianshi">用户管理</li>
<li><a href="logout.php">退出登录</a></li>
</ul>
</div>
</div>
<div id="footer">攀缘颠倒.佛</div>
</body>
</html>
