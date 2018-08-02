<?php
include('index.php');
  include('../../mysql.php');
  $pid=$_GET['pid']+0;
if($pid>0){
$sql="select path from hotai where id={$pid}";	
$res=mysql_query($sql);	

$path=mysql_result($res,0,0);

$typeres=$db->select("hotai","where id in ({$path}{$pid}) order by id");

	
}
?>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
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
a{text-decoration:none;}
a:hover{
     color:black;
background:lightyellow;}
tr:hover{
     color:yellow;
}
</style>
<center>
       <table class="hovertable">   
		  <tr><th><a href="delect.php">查看文章</a></th><th><a href="select.php">查看分类</a></th>
          <th><a href="fenlei.php">添加分类</a></th></tr>
<a href="select.php?pid=0">总内容</a>&gt&gt
<?php
if($typeres && $db->rows($typeres)>0){
	while($row=mysql_fetch_assoc($typeres)){
echo "<a href='select.php?pid={$row['id']}'>{$row['name']}</a>&gt&gt";		
		
		
		
		
		
	}
	
	
	
	
}



   
$pid=$_GET['pid']+0;
$pid=htmlspecialchars($pid);

   //function ShowTable(){
   
	 
	 echo "<table class='hovertable'>";
     echo "<tr><th>分类名</th><th>删除</th><th>文章</th><th>子类</th><th></th></tr>";
        $sqlin=$db->select("hotai","where pid={$pid} order by concat(path,id)");
		
       while($rows=mysql_fetch_array($sqlin)){
	  if($rows['name']!=''){ 
		  echo "<td>{$rows['id']}</td>"; 
      echo "<td><a href='select.php?pid={$rows['id']}'>{$rows['name']}</a></td>";
		   
           echo "<td><a onclick=\"return confirm('&#30830;&#23450;&#21024;&#38500;&#20040;')\" href='action.php?action=del&id={$rows['id']}'>&#21024;&#38500;</a></td>";
		   echo "<td><a href='demo.php?pid={$rows['id']}&name={$rows['name']}&path={$rows['path']}{$rows['id']},'>&#28155;&#21152;&#25991;&#31456;</a></td>";
		     echo "<td><a href='fenlei.php?pid={$rows['id']}&name={$rows['name']}&path={$rows['path']}{$rows['id']},'>&#28155;&#21152;&#23376;&#31867;</a></td>";
			    
			 }
			if($rows['text']!=''){
			echo "<td>{$rows['id']}</td>";	
			echo "<td><a href='update.php?id={$rows['id']}&pid={$rows['pid']}&name={$rows['name']}&path={$rows['path']}'>{$rows['title']}</a></td>";
			echo "<td><a onclick=\"return confirm('&#30830;&#23450;&#21024;&#38500;&#20040;')\" href='action.php?action=del&id={$rows['id']}'>&#21024;&#38500;</a></td>";
			echo "<td><a href='update.php?id={$rows['id']}&pid={$rows['pid']}&name={$rows['name']}&path={$rows['path']}'>&#20462;&#25913;</a></td>";
			echo "<td><a href=''>&#27983;&#35272;&#25991;&#31456;</a></td>";
			}		
	  echo "</tr>";
}
            
		
	echo "</table></center>";	
		
	//ShowTable();
	
	mysql_close();

?>
 
