<head>

<style>
ul{list-style:none;}
li{list-style:none;}
li a{text-decoration:none;text-align:center;}
li:hover{
     color:black;
      background:yellow;
 }
 a:hover{
     color:black;
      background:yellow;
 }
</style>
</head>
<?php
header("Content-type: text/html; charset=utf-8"); 
include('mysql.php');
include('fyclass.php');
$sql=$db->select("hotai","");  
$totalRows=$db->rows($sql);   //总记录数  
$pageSize=20;


$fenye=new Page($pageSize,$totalRows);


$pql="select * from hotai limit {$fenye->limit()}";

if($row=mysql_query($pql)){ //根据前面的计算出开始的记录和记录数


while ($rows=mysql_fetch_array($row)) {
 echo "<br>";
 echo "<li><a href='set.php?id={$rows['id']}'>{$rows['title']}</a></li>";	
 echo "<hr>";//显示数据库的内容
}}
echo "<center>{$fenye->all()}</center>";
?>