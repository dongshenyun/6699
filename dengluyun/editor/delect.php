<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
          <center>
		  
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:18px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	width:600px;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
li{list-style:none;float:left;}
a{text-decoration:none;}
a:hover{
     color:black;
background:lightyellow;}
tr:hover{
     color:yellow;
}
</style>

<?php
include('../../fyclass.php');
include('../../mysql.php');
$sql=$db->select("hotai","");  
$totalRows=$db->rows($sql);   //总记录数  
$pageSize=8;


$fenye=new Page($pageSize,$totalRows);

echo "<center><table class='hovertable'>";
     echo "<tr><th>id</th><th>分类名</th><th>文章标题</th><th></th><th>管理</th></tr>";     
$sqlin=$db->select("hotai","order by concat(path,id) limit {$fenye->limit()}");
if($sqlin){
while($pows=mysql_fetch_array($sqlin)){

echo "<td>{$pows['id']}</td>
             <td>{$pows['name']}</td>
			 <td><a href='update.php?id={$pows['id']}&pid={$pows['pid']}&name={$pows['name']}&path={$pows['path']}'>{$pows['title']}</a></td>";
			if($pows['title']!=''){ 
			echo "<td><a href='update.php?id={$pows['id']}&pid={$pows['pid']}&name={$pows['name']}&path={$pows['path']}'>修改</a></td>";}
			else{echo"<td></td>";}
           echo "<td><a onclick=\"return confirm('确定删除么')\" href='del.php?id={$pows['id']}'>删除</a></td>
		    </tr></center>";
			
		}
	   echo "</table></center>";	
}		
			
	
echo "<center>{$fenye->alla()}</center>";

mysql_close();
?>
       