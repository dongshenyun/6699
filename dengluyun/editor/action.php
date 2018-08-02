<?php

include('../../mysql.php');
switch($_GET['action']){
	case 'add':
	
	
	
	if(isset($_POST['sub'])){
		
		$name=$_POST['name'];
	   $pid=$_POST['pid'];
	   $path=$_POST['path'];
		
		$sql=$db->insert("hotai","(id,name,pid,path)","('null','$name','$pid','$path')");
	if(!empty($name)){
	if($sql){
		
	   echo "添加成功";		
		header("location:select.php");
		
	}else{
		header("location:select.php");
		
	}}}
	
	echo "<br><a href='fenlei.php'>继续添加</a>";
	break;
	
	case 'del':
	
	function del(){
		//include('mysql.php');
	
	$id = $_GET['id'];
	$sqli = $db->delect("hotai","where id = '$id' or path like '%,{$id},%'");
	$id=htmlentities($id);
	//mysql_query($sql);
		if($sqli){
		
	   echo "删除成功";		
		header("location:select.php");
		
	}else{
		
		echo "删除失败";
	}

	}
	del();
		
        break;
}

?>