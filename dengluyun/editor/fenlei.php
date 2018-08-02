<?php include('index.php'); ?>
<html>
<meta charset="utf-8">
<head>
</head>
<body>
<center>
          <a href="select.php">查看分类</a>
		  <a href="fenlei.php">继续添加</a><br>
       
		   <h2><?php if(isset($_GET['name'])){echo "{$_GET['name']}";}else{echo "总内容";} ?></h2>
           <form action="action.php?action=add" method="post">
		   类别名称:<input type="text" name="name">
		   <input type="hidden" name="pid" value="<?php if(isset($_GET['pid'])){echo "{$_GET['pid']}";}else{echo "0";} ?>">
		   <input type="hidden" name="path" value="<?php if(isset($_GET['path'])){echo "{$_GET['path']}";}else{echo "0,";} ?>">
		   <input type="submit" value="添加" name="sub">
		   <input type="reset" value="重置">
		  
		   </form>


</body>
</html>
