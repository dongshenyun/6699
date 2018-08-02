
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<input type="hidden" name="pid" value="<?php if(isset($_GET['pid'])){echo "{$_GET['pid']}";}else{echo "0";} ?>">
	<input type="hidden" name="path" value="<?php if(isset($_GET['path'])){echo "{$_GET['path']}";}else{echo "0,";} ?>">
<?php
//在表格中显示表的数据，常用方式
  include('index.php');
	echo "<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name=''>";
       //$sql="select * from hotai where name !='' order by concat(path,id)";
		if(isset($_GET['name'])){
		  echo "<option value='{$_GET['name']}'>{$strpad}{$_GET['name']}</option>";
	  }else{
		  echo "<option>类别</option>";
		  }
       echo "</select>";
?>
	 
     
      

	
	 


		
		
         




     
		
	
	
	
	
	
	



