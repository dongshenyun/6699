<html>
<meta charset="utf-8">
<head>
<style>
*{background:#ECF5FF;margin:0.8px;padding:0px;}
#container{margin: 0 auto;width: 1002px;}
#header{background:#FFFFFF;width:802px;height:100px;margin-left:150px;opacity:0.9;}
#daohang{background:#FFFFFF;width:802px;height:30px;margin-left:150px;opacity:0.9;}
#center{background:#FFFFFF;width:802px;height:600px;float:left;margin-left:150px;opacity:0.9;}

#end{background:#FFFFFF;width:802px;height:100px;margin:20px;margin-left:150px;clear:both;opacity:0.9;}
 #ul{
 font-size:25px;
 height:30px;
 width:200px;
 background:#FFFFFF;

 }

 #ul li {
 float:left;
background:#FFFFFF
  width: 90px;
  
 margin:1px;
 list-style:none;
 text-align:center;
  border-left:0;
 }
 #ui a{
 color: #000000;
 

 }
 #ul li a{
 text-decoration:none;
 background:#FFFFFF;

 }
 
 .right{
 
 height:300px;
  width:220px;
  
 margin:18px;
 margin-left:20px;
 background:#ECF5FF;
 
 
 }
 .right ul{
  background:#ECF5FF;
  list-style:none;
  }
 .right li{
 
  margin:1px;
 list-style:none;
 text-align:center;
 background:#ECF5FF;
 
 }
 .right ul li a{
 
 
 text-decoration:none;
 background:#ECF5FF;
 
 
 }
 .right2{
 
  height:500px;
  width:780px;
  
 
 margin-left:0px;
 background:#ECF5FF;
 
 margin:10px;
 
 
 
 
 
 
 }
 
 
 
 
 
 
 
 
 
</style>




</head>
<body>
<div id="container">
<div id="header"></div>
<div id="daohang">
<ul id="ul">
<li><a href="">首页</a></li>
<li><a href="">内容</a></li>






</div>
<div id="center">
<div class="right2">
<a href="fenlei.php?fenlei=0">主目录</a>&gt&gt<br>
<?php
include('conn.php');


//switch($pid){



     // case $pid:
	  
$pid=$_GET['fenlei']+0;
if($pid>0){
$sq="select path from hotai where id={$pid}";	
$res=mysql_query($sq,$conn);	

$path=mysql_result($res,0,0);
//echo $path;
$sql2="set * from hotai where id in ({$path}{$pid}) order by id";
$typeres=mysql_query($sql2);
	//echo $typeres;
}


if($typeres && mysql_num_rows($typeres)>0){
	while($row=mysql_fetch_assoc($typeres)){
echo "<a href='fenlei.php?fenlei={$row['id']}'>{$row['name']}</a>&gt&gt";		
		//echo $row['name'];
		
		
		
		
}}
$sqli="select*from hotai where pid={$pid} order by concat(path,id)";
if($tow=mysql_query($sqli)){
while($tows=mysql_fetch_array($tow)){
   echo "<a href='fenlei.php?fenlei={$tows['id']}'>{$tows['name']}</a><br>";
   echo "<hr>";
   echo "<a href='set.php?id={$tows['id']}'>{$tows['title']}</a><br>";
   echo "<br>";
}
}
//break;}
?>





</div>







</div>
</div>


</body>
</html>
<meta charset="utf-8">

