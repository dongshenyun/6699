<html>
<head>
<meta charset="UTF-8">
<title>&#19996;&#21319;&#30340;&#20315;&#27861;-<?php echo "{$_GET['fenlei']}"."{$_GET['id']}"; ?></title>
<link href="title.ico" rel="shortcut icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php
include('mysql.php');
include('fyclass.php');

//switch(''){
$pid=$_GET['fenlei'];	
	//case $id:
$id=$_GET['id'];
$id=htmlentities($id);
$pid=htmlentities($pid);
if(!empty($_GET['id'])){
$id=htmlspecialchars($id);
$sql = $db->select("hotai","where id='$id'");
$rows = mysql_fetch_array($sql);
echo "<center>".htmlspecialchars_decode($rows['text'])."</center>";;
      //break;
echo "<br>";
//default:
}
elseif($_GET['id']=""or!empty($_GET['fenlei'])){

$sql=$db->select("hotai","where pid={$pid}");  
$totalRows=mysql_num_rows($sql);   //&#24635;&#35760;&#24405;&#25968;  
$pageSize=8;
$fenye=new Page($pageSize,$totalRows);



//echo $startCount;
$sqli=$db->select("hotai","where pid={$pid} limit {$fenye->limit()}");
if($sqli){
while($tows=mysql_fetch_array($sqli)){
   echo "<li><a href='set.php?fenlei={$tows['id']}'>{$tows['name']}</a><li><br>";
   echo "<hr>";
   echo "<li><a href='set.php?id={$tows['id']}'>{$tows['title']}</a></li><br>";
  
}
}

$fenye->all();
}

?>

 </div>
 <div id="footer"><center><div class="u">&#22238;&#21521;:&#24895;&#27492;&#21151;&#24503;&#31181;&#21892;&#26681;&#65292;&#32047;&#19990;&#24616;&#20146;&#21516;&#27838;&#24681;&#12290;&#30001;&#27492;&#35299;&#33073;&#35832;&#33510;&#24700;&#65292;&#20849;&#35777;&#33769;&#25552;&#24230;&#26377;&#24773;!</div></center></div>
 </body>
 </html>     		
		
		
		

  		
