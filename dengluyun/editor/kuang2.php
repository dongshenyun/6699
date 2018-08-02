
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">

<?php
//在表格中显示表的数据，常用方式
include('index.php');
   include('../../mysql.php');
	echo "<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='pid'>";
       $sql=$db->select("hotai","where name !='' order by concat(path,id)");
		if($sql){
		while($rows=mysql_fetch_assoc($sql)){
			$m=substr_count($rows['path'],',')-1;
			$strpad=str_pad("",$m*6*2,"&nbsp;");
			
			
			 echo "<option value='{$rows['id']}'>{$strpad}{$rows['name']}</option>";
			
		}
		
		}
		
       echo "</select>";
?>
	 
     
      

	
	 


		
		
         




     
		
	
	
	
	
	
	



