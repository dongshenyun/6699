<html>
<head>
   <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <title>SimpleTextEditor</title>
    <script type="text/javascript" src="SimpleTextEditor.js"></script>
    <link rel="stylesheet" type="text/css" href="SimpleTextEditor.css">
</head>
<body>
<?php
include('../../mysql.php');
$id=$_GET['id'];
$id=htmlentities($id);
$sql = $db->select("hotai","where id='$id'");
$rows = mysql_fetch_array($sql);
if(isset($_POST['sub'])){
	
        $title=$_POST['bti'];
		$keyword=$_POST['bti2'];
		$text=$_POST['body'];
		$pid=$_POST['pid'];
		$name=$_POST['name'];
		$path=$_POST['path'];
		$db->update("hotai","title='$title',keyword='$keyword',text='$text',pid='$pid',name='$name',path='$path'","where id='$id'");
		$rows = mysql_affected_rows();
  // 返回影响行数
  // 如果影响行数>=1,则判断添加成功,否则失败
  if($rows >= 1)
  {
    echo "编辑成功";
    header("location:delect.php");
  }else{
    echo   "编辑失败" ;
//   href("addUser.php");
    }
	 
	 
 }

mysql_close();

?>
     <center>
    <form action="" method="post">
	    <h3> <span> 标&nbsp;&nbsp;&nbsp;&nbsp;题：</span><input type="text" name="bti" style="width:380px" value=<?php echo $rows['title'] ?> ></h3>
        <h3><span>关键字：</span><input type="text" name="bti2" style="width:380px" value=<?php echo $rows['keyword'] ?> ></h3>
        <input type="hidden" name="pid" value="0">
	<input type="hidden" name="path" value="0,">
	
	   <?php 
          include('add.php');
	   ?>
	   
	   <textarea id="body" name="body" style="width:600px;height:300px;">
		 <?php echo $rows['text'] ?>
        </textarea>
    
   <script type="text/javascript">
        var ste = new SimpleTextEditor("body", "ste");
        ste.init();
        </script>

        <input type="submit" value="提交" name="sub" onclick="ste.submit();">

    </form>
</center>
</body>
</html>