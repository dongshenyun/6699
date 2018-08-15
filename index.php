<html>
<head>
<meta charset="utf-8">
<title>&#19996;&#21319;&#30340;&#20315;&#27861;</title>
<link href="title.ico" rel="shortcut icon"/>
<style>
*{margin:0;padding:0;}
.header{
    height:50px;
    width:960px;
	margin:0 auto;
     background:#ECF5FF;
     margin-bottom:10px;
	 opacity:0.9;
 }
p {
    font-family:"yellow";
    color:#C4E1FF;
	font-size:20px;
	text-align:left;
padding:20px 5px 15px 20px;
    -webkit-transition: all 2s ease;
            transition: all 2s ease;
}
p:hover {
	font-size:30px;
    color: red;
  opacity:0.3;
}
.header:hover{
	height:60px;
	
}
.u{
font-family:&#26999;&#20307;;
padding:20px 5px 15px 20px;
}

 #nav{
     width:960px;
     margin:0 auto;
     margin-bottom:10px;
	 opacity:0.9;
 }
 
 #main{
     width:960px;
     min-height:100%;
     _height:100%;
     margin:0 auto;
     overflow:hidden;
	 opacity:0.9;
  }
 #main .right{
	 font-family:"&#26999;&#20307;";
	 font-size:20px;
     width:200px;
    min-height:100%;
     _height:100%;
     background:#ECF5FF;
     float:right;
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
 #main .left{
     width:750px;
     min-height:100%;
     _height:100%;
	 background:#ECF5FF;
    float:left;
   margin-bottom:10px;
	opacity:0.9;
 }
 
 
 
 #footer{
     width:960px;
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
	 
 }
 #nav li a{
     display:block;
      color:black;
     width:104px;
    font-family:&#40657;&#20307;;
	line-height:30px;
     text-decoration:none;
     text-align:center;
	 opacity:0.8;
  }
 #nav .home{
     width:128px;
 }
 #nav li a:hover{
	 color:black;
      background:yellow;
	opacity:0.8;
 }
  a:hover{
    font-family:"&#26999;&#20307;";
   font-size:30px;
background:yellow;
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
 //&#24179;&#21488;&#12289;&#35774;&#22791;&#21644;&#25805;&#20316;&#31995;&#32479;  
var system ={  
win : false,  
mac : false,  
xll : false  
};  
//&#26816;&#27979;&#24179;&#21488;  
var p = navigator.platform;  
system.win = p.indexOf("Win") == 0;  
system.mac = p.indexOf("Mac") == 0;  
system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);  
//&#36339;&#36716;&#35821;&#21477;&#65292;&#22914;&#26524;&#26159;&#25163;&#26426;&#35775;&#38382;&#23601;&#33258;&#21160;&#36339;&#36716;&#39029;&#38754;  
if(system.win||system.mac||system.xll){  
}else{  
window.location.href="<?php echo "wap.php"; ?>";  
}  

</script> 
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
 </head>
 <body>
 <div class="header"><p>&#19996;&#21319;&#30340;&#20315;&#27861;</p></div>
 <div id="nav">
<ul>
	 <li><a href="http://dongshenfofa.top">首页</a></li>
         <li id="menu1" onclick="setTab('menu',1,8)"><a href="index.php">&#35270;&#39057;1</a></li>
         <li id="menu2" onclick="setTab('menu',2,8)"><a href="#">&#35270;&#39057;2</li>
         <li id="menu3" onclick="setTab('menu',3,8)"><a href="#">&#35270;&#39057;3</li>
         <li id="menu4" onclick="setTab('menu',4,8)"><a href="#">&#35270;&#39057;4</li>
         <li id="menu5" onclick="setTab('menu',5,8)"><a href="#">&#35270;&#39057;5</li>
         <li id="menu6" onclick="setTab('menu',6,8)"><a href="#">&#35270;&#39057;6</li>
		 <li id="menu7" onclick="setTab('menu',7,8)"><a href="#">&#35270;&#39057;7</li>
		 <li id="menu8" onclick="setTab('menu',8,8)"><a href="#">&#35270;&#39057;8</li>
    </ul>
	
 </div>
 <div id="main">
  <div class="left">
  <div class="g"><li></li></div>
  <div id="con_menu_1" style="display:none">
  
  <?php
include('mysql.php');
include('shipin.php');
?>
  
 

</div>
<div id="con_menu_2" style="display:none">
  <?php
include('shipin2.php');
?>
</div>
<div id="con_menu_3" style="display:none">
  <?php
include('shipin5.php');
?>
</div>
<div id="con_menu_4" style="display:none">
<?php include("shipin6.php") ?>
</div>
<div id="con_menu_5" style="display:none">
   <?php
include('shipin3.php');
?>
</div>
<div id="con_menu_6" style="display:none">
 <?php
include('shipin4.php');
?>
</div>
<div id="con_menu_7" style="display:none">
视频更新中......
</div>
<div id="con_menu_8" style="display:none">
视频更新中......
</div>
  </div >
   <div class="right">
   <center>
   <ul>
<div class="h"><h4>&#32463;  &#38401;</h4></div>
<ul>

<?php

$sql=$db->select("hotai","where pid=0 order by concat(path,id)");

if($sql){
while($rows=mysqli_fetch_array($sql)){
echo "<li><a href='set.php?fenlei={$rows['id']}'>{$rows['name']}</a></li>";
}
}


	

?>
</ul>
</ul>
  </center> 
   
   </div>
 </div>
 <div id="footer">
<center><div class="u">&#22238;&#21521;:&#24895;&#27492;&#21151;&#24503;&#31181;&#21892;&#26681;&#65292;&#32047;&#19990;&#24616;&#20146;&#21516;&#27838;&#24681;&#12290;&#30001;&#27492;&#35299;&#33073;&#35832;&#33510;&#24700;&#65292;&#20849;&#35777;&#33769;&#25552;&#24230;&#26377;&#24773;!</div></center></div>
 </body>
 </html>     

