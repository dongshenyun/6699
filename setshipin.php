<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>&#19996;&#21319;&#30340;&#20315;&#27861;-<?php echo $_GET['title']; ?></title>
<link href="title.ico" rel="shortcut icon"/>

 <script>
 var system ={};  
    var p = navigator.platform;       
    system.win = p.indexOf("Win") == 0;  
    system.mac = p.indexOf("Mac") == 0;  
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);     
    if(system.win||system.mac||system.xll){//&#22914;&#26524;&#26159;&#30005;&#33041;&#36339;&#36716;&#21040;&#30334;&#24230;  
        document.write("<link href='./css/win.css' rel='stylesheet' type='text/css'>");  
    }else{  //&#22914;&#26524;&#26159;&#25163;&#26426;,&#36339;&#36716;&#21040;&#35895;&#27468;
        document.write("<link href='./css/android.css' rel='stylesheet' type='text/css'>"); 
    }
 

 </script>
</head>
 <body>
 <div id="header"><div class="j">&#19996;&#21319;&#30340;&#20315;&#27861;</div></div>
 <div id="nav">
      <ul>
	 <li><a href="http://dongshenfofa.top">首页</a></li>
         <li><a  class="home" href="index.php">&#35270;&#39057;1</a></li>
         <li><a href="index.php?f=1">&#35270;&#39057;2</a></li>
         <li><a href="index.php?f=2">&#35270;&#39057;3</a></li>
         <li><a href="index.php?f=3">&#35270;&#39057;4</a></li>
         <li><a href="index.php?f=4">&#35270;&#39057;5</a></li>
         <li><a href="index.php?f=5">&#35270;&#39057;6</a></li>
		 <li><a href="index.php?f=6">&#35270;&#39057;7</a></li>
		 <li><a href="index.php?f=7">&#35270;&#39057;8</a></li>
    </ul>
 </div>
 <div id="main">
 <div class="g"></div>
 <center>
  <script>
 var system ={};  
    var p = navigator.platform;       
    system.win = p.indexOf("Win") == 0;  
    system.mac = p.indexOf("Mac") == 0;  
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);     
    if(system.win||system.mac||system.xll){//&#22914;&#26524;&#26159;&#30005;&#33041;&#36339;&#36716;&#21040;&#30334;&#24230;  
        document.write("<?php
 echo "<center>{$_GET['title']}</center>";
 switch($_GET['j']){
 case "2":
 //&#20248;&#37239;;&#22303;&#35910;
  $url="http://player.youku.com/embed/".$_GET['b']."";
 echo "<iframe src='{$url}' width=660 height=500 allowfullscreen=true></iframe>";
 break;
 case "4":
 //blibli;
   $urll="http://player.bilibili.com/player.html?aid=".$_GET['c']."";
 echo "<iframe src='{$urll}' width=660 height=500 allowfullscreen=true></iframe>";
 break;
 case "6":
 //blibli;
 $urlin="http://open.iqiyi.com/developer/player_js/coopPlayerIndex.html?vid=".$_GET['k']."&tvid=".$_GET['i']."";
 echo "<iframe src='{$urlin}' width=660 height=500 allowfullscreen=true></iframe>";
 break;
  case "8":
 //blibli;
   $urli="https://tv.sohu.com/upload/static/share/share_play.html#".$_GET['e']."";
 echo "<iframe src='{$urli}' width=660 height=500 allowfullscreen=true></iframe>";
 break;
    case "10":
 //qq;
   $urlinn="https://v.qq.com/iframe/player.html?vid=".$_GET['q']."";
 echo "<iframe src='{$urlinn}' width=660 height=500 allowfullscreen=true></iframe>";
 break;
 
 }

 ?>");  
    }else{  //&#22914;&#26524;&#26159;&#25163;&#26426;,&#36339;&#36716;&#21040;&#35895;&#27468;
        document.write("<?php
 echo "<center>{$_GET['title']}</center>";
 switch($_GET['j']){
 case "2":
 //&#20248;&#37239;;&#22303;&#35910;
  $url="http://player.youku.com/embed/".$_GET['b']."";
 echo "<iframe src='{$url}' width=100% height=500 allowfullscreen=true></iframe>";
 break;
 case "4":
 //blibli;
   $urll="http://player.bilibili.com/player.html?aid=".$_GET['c']."";
 echo "<iframe src='{$urll}' width=100% height=500 allowfullscreen=true></iframe>";
 break;
 case "6":
 //blibli;
 $urlin="http://open.iqiyi.com/developer/player_js/coopPlayerIndex.html?vid=".$_GET['k']."&tvid=".$_GET['i']."";
 echo "<iframe src='{$urlin}' width=100% height=500 allowfullscreen=true></iframe>";
 break;
  case "8":
 //blibli;
   $urli="https://tv.sohu.com/upload/static/share/share_play.html#".$_GET['e']."";
 echo "<iframe src='{$urli}' width=100% height=500 allowfullscreen=true></iframe>";
 break;
   case "10":
 //qq;
   $urlinn="https://v.qq.com/iframe/player.html?vid=".$_GET['q']."";
 echo "<iframe src='{$urlinn}' width=100% height=500 allowfullscreen=true></iframe>";
 break;
 
 }

 ?>"); 
    }
 

 </script>
 
</center>
 </div>
 <div id="footer"><center><div class="u">&#22238;&#21521;:&#24895;&#27492;&#21151;&#24503;&#31181;&#21892;&#26681;&#65292;&#32047;&#19990;&#24616;&#20146;&#21516;&#27838;&#24681;&#12290;&#30001;&#27492;&#35299;&#33073;&#35832;&#33510;&#24700;&#65292;&#20849;&#35777;&#33769;&#25552;&#24230;&#26377;&#24773;!</div></center></div>
 </body>
 </html>  
