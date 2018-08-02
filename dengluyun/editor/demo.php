<html>
<head>
   <meta http-equiv="Content-Type" charset="utf-8">
    <title>SimpleTextEditor</title>
    <script type="text/javascript" src="SimpleTextEditor.js"></script>
    <link rel="stylesheet" type="text/css" href="SimpleTextEditor.css">

</head>
<body>
     <center>
    <form action="" method="post">
	<h3> <span> 标&nbsp;&nbsp;&nbsp; 题：</span><input type="text" name="bti" cols="120" style="WIDTH: 380px"></h3>
    <h3><span>关键字：</span><input type="text" name="bti2" cols="120" style="WIDTH: 380px"></></h3>
        	 
		
			 <?php 
			 include('../../mysql.php');
          //include('add.php');
		  include('kuang.php');
		  
		?>
		  <textarea id="body" name="body"  style="HEIGHT: 300px">

</textarea>
 <script type="text/javascript">
        var ste = new SimpleTextEditor("body", "ste");
        ste.init();
        </script>
           <br>
        <input type="submit" value="提交" name="sub" onclick="ste.submit();">

    </form>
</center>
</body>
</html>
<?php 
if(isset($_POST['sub'])){
	
        $title=$_POST['bti'];
		$keyword=$_POST['bti2'];
		$text=$_POST['body'];
		$pid=$_POST['pid'];
		$name=$_POST['name'];
		//$name=$rows['name'];
		$path=$_POST['path'];
		$sql=$db->insert("hotai","(id,title,keyword,text,pid,name,path)","('null','$title','$keyword','$text','$pid','$name','$path')");
if(empty($text) or empty($title) or empty($keyword)){
	echo "<script>alert('信息填写不完整！')</script>";
		}else{
			if(!$sql){
			echo "<script>alert('提交成功！')</script>";
}
}}
 mysql_close();
?>				
				
	  
		 
			
			




		
		
		
			
		
		



