
       
       <input type="hidden" name="pid" value="<?php if(isset($_GET['pid'])){echo "{$_GET['pid']}";}else{echo "0";} ?>">
	<input type="hidden" name="path" value="<?php if(isset($_GET['path'])){echo "{$_GET['path']}";}else{echo "0,";} ?>">
	
	<h3>分类：</h3><input type="text" disabled="true" name="name" value="<?php if(isset($_GET['name'])){echo "{$_GET['name']}";}else{echo "类别";} ?>">
		 <br>
