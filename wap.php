<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0" />
<title>&#19996;&#21319;&#30340;&#20315;&#27861;-&#31227;&#21160;&#29256;</title>
<link href="title.ico" rel="shortcut icon"/>
<style>
*{margin:0;padding:0;}
.header{
    height:50px;
    width:100%;
	margin:0 auto;
     background:#ECF5FF;
     margin-bottom:10px;
	 opacity:0.9;
 }
p {
    font-family:"&#26999;&#20307;";
    color:#C4E1FF;
	font-size:50px;
	text-align:center;
    -webkit-transition: all 2s ease;
            transition: all 2s ease;
}
p:hover {
	font-size:60px;
    color: red;
  opacity:0.3;
}
.header:hover{
	height:60px;
	
}


 #nav{
     width:100%;
     margin:0 auto;
     margin-bottom:10px;
	 opacity:0.9;
 }
 
 #main{
     width:100%;
     min-height:100%;
     _height:100%;
     margin:0 auto;
   overflow:auto;
     background:#ECF5FF;
    
	 opacity:0.9;
  }
 
.h{
	line-height:30px;
      list-style:none;
     background:#C4E1FF;
     overflow:hidden;
	 
  }
  .g{
	height:30px;
      list-style:none;
     background:#C4E1FF;
     overflow:hidden;
  }
  ul{list-style:none;}
  ul li a{text-decoration:none;display:block;}

#footer{
     width:100%;
     height:50px;
     background:#C4E1FF;
     margin:0 auto;
     margin-top:10px;
	 opacity:0.9;
  }
  #nav ul{
      list-style:none;
     background:#C4E1FF;
     overflow:hidden;
  }
 #nav li{
     float:left;
	 width:30%;
 }
 #nav li a{
     display:block;
      color:black;
     
    font-family:&#40657;&#20307;;
	line-height:30px;
     text-decoration:none;
     text-align:center;
	 opacity:0.8;
  }
 #nav .home{
     width:100%;
 }
 #nav li a:hover{
	 color:black;
      background:yellow;
	opacity:0.8;
 }
 .ziti{   font-family:"&#26999;&#20307;";
   font-size:25px;}
  a:hover{
     color:black;
      font-family:"&#26999;&#20307;";
   font-size:30px;
 }
 </style>
 <script> 
<!-- 
function setTab(name,cursel,n){ 
for(i=1;i<=n;i++){ 
var menu=document.getElementById(name+i); 
var con=document.getElementById("con_"+name+"_"+i); 
menu.className=i==cursel?" ":""; 
con.style.display=i==cursel?"block":"none"; 


} 
}
 
//-->
function cona(){
document.getElementById('con_menu_2').style.display='block';
}
function conb(){
document.getElementById('con_menu_3').style.display='block';
}
function conc(){
document.getElementById('con_menu_4').style.display='block';
}
function cond(){
document.getElementById('con_menu_5').style.display='block';
}
function cone(){
document.getElementById('con_menu_6').style.display='block';
}
function conf(){
document.getElementById('con_menu_7').style.display='block';
}
function cong(){
document.getElementById('con_menu_8').style.display='block';
}
function conh(){
document.getElementById('con_menu_1').style.display='block';
}




</script> 
 </head>
 <body>
 <?php
  switch($_GET["f"]){
	case "1":
     echo "<body onload='cona()'>";	
	break;
    case "2":
     echo "<body onload='conb()'>";		
	break;
	case "3":
	 echo "<body onload='conc()'>";	
	break;
	case "4":
	 echo "<body onload='cond()'>";	
	break;
	case "5":
	 echo "<body onload='cone()'>";	
	break;
	case "6":
	 echo "<body onload='conf()'>";	
	break;
	case "7":
	 echo "<body onload='cong()'>";	
	break;
	default:
	 echo "<body onload='conh()'>";
	 break;
 }
?>
 <div class="header"><p>&#19996;&#21319;&#30340;&#20315;&#27861;</p></div>
 <div id="nav">
<ul>
         <li id="menu1" onclick="setTab('menu',1,8)"><a class="home" href="index.php">&#35270;&#39057;1</a></li>
         <li id="menu2" onclick="setTab('menu',2,8)"><a href="#">&#35270;&#39057;2</a></li>
         <li id="menu3" onclick="setTab('menu',3,8)"><a href="#">&#35270;&#39057;3</a></li>
         <li id="menu4" onclick="setTab('menu',4,8)"><a href="#">&#35270;&#39057;4</a></li>
         <li id="menu5" onclick="setTab('menu',5,8)"><a href="#">&#35270;&#39057;5</a></li>
         <li id="menu6" onclick="setTab('menu',6,8)"><a href="#">&#35270;&#39057;6</a></li>
		 <li id="menu7" onclick="setTab('menu',7,8)"><a href="#">&#35270;&#39057;7</li>
		 <li id="menu8" onclick="setTab('menu',8,8)"><a href="#">&#32463;&#38401;</li>
    </ul>
	
 </div>
 <div id="main">
  <div class="left">
  <div class="g"><li></li></div>
  <div id="con_menu_1" style="display:none">
  <?php

include('shipin.php');
?>
</div>
<div id="con_menu_2" style="display:none">
<?php include("shipin2.php") ?>
</div>
<div id="con_menu_3" style="display:none">
<?php include("shipin5.php") ?>
</div>
<div id="con_menu_4" style="display:none">
<?php include("shipin6.php") ?>6
</div>
<div id="con_menu_5" style="display:none">
<?php include("shipin3.php") ?>
</div>
<div id="con_menu_6" style="display:none">
<?php include("shipin4.php") ?>
</div>
<div id="con_menu_7" style="display:none">
视频更新中......
</div>
<div id="con_menu_8" style="display:none">
<ul>
<?php
include('mysql.php');
$sql=$db->select("hotai","where pid=0 order by concat(path,id)");

if($sql){
while($rows=mysql_fetch_array($sql)){
echo "<center><div class='ziti'><li><a href='set.php?fenlei={$rows['id']}'>{$rows['name']}</a></li></div></center>";
}
}
?>
</ul>
</div>
  </div >

 </div>
 <div id="footer"></div>
 </body>
 </html>