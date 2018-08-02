
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">


<?php
include('index.php');
function del(){
include('../../mysql.php');
$id=$_GET['id'];
	$id=htmlentities($id);
	$sql = $db->delete("hotai","where id = '$id' or path like '%,{$id},%'");

//执行
if(!$sql)
{
//跳转页面


echo "<script>alert('删除成功');history.back();</script>";


}else{
	echo "<script>alert('删除成功');history.back();</script>";
}}
	del();
	mysql_close();
?>
