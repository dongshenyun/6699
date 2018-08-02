<meta charset="utf-8">

<?php
$filelist=array("12.php");


 $p = $_SERVER['DOCUMENT_ROOT'];

if($_GET['path']){
    $path=htmlentities($path);
	$path=htmlspecialchars($path);
	$path = $_GET['path'];
}else {
	$path=htmlentities($path);
	$path=htmlspecialchars($path);
    $path = $_SERVER['DOCUMENT_ROOT'];
}
 
  $is = opendir($path);
echo "<table width='100%' border='0'>";  
echo "<tr bgcolor='#cccccc' align='left'>";  
echo "<th>序号</th><th>名称</th><th>类型</th><th>大小</th><th>创建时间</th><th>操作</th>";  
echo "</tr>"; 
$i=0;
while($file = readdir($is)){
	
	echo "<tr>";
switch ($file) {
	            case '.':
				    echo "<td></td>";
                    echo "<td><a href='javascrip::valid(0)' onclick='window.history.back(-1);return false;'>返回上级</a></td>";
                    break;
                case '..':
				    echo "<td></td>";
                    echo "<td><a href='file.php?url={$p}'>站点首页</a></td>";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td><h4><a href='file.php?path={$path}&action=add'>创建文件</a></td>";
					echo "<td><div class='but'><button type='button' id='open' class='button'>编辑</button></div></td>";
                    break;
                default :
				     $i++;
                    /* $this->zsPath  拼接的gbk路径  用于判断是否为文件夹 */
                    $zsPath = $path.'/'.$file;
					$filee = trim($path,"/")."/".$file;
					//echo $filee;
                    if(is_dir($zsPath)){
						echo "<td>{$i}</td>";
                        echo "<td><a href='file.php?path={$path}/{$file}'>{$file}</a></td>";
						echo "<td>".filetype($filee)."</td>";  
                        echo "<td>".filesize($filee)."</td>";
                        echo "<td>".date("Y-m-d h:i:s",filectime($filee))."</td>"; 
                        echo "<td><a href='file.php?filename={$filee}&action=del'>删除</a></td>";
                        						
                    }else {
						echo "<td>{$i}</td>";
                        echo "<td><a href='file.php?filename={$filee}&action=edit'>{$file}</a></td>";
						//echo "<td><button type='button' onclick='clink();'>{$file}</button></td>";
						//echo "<td><button type='button' onclick='clink();'>{$file}</button></td>";
						echo "<td>".filetype($filee)."</td>";  
                        echo "<td>".filesize($filee)."</td>";
                        echo "<td>".date("Y-m-d h:i:s",filectime($filee))."</td>";
                        echo "<td><a href='file.php?filename={$filee}&action=del'>删除</a></td>";
                        						
                    }
					echo "</tr>";
}
}
 echo "<tr bgcolor='#cccccc' align='left'><td colspan='6'> </td></tr>";  
echo "</table>"; 

if($_GET['action']=="add"){  
echo "<br/><br/><form action='file.php?path={$path}&action=create' method='post'>";  
echo "新建文件：<input type='text' name='filename' size='12'/> ";  
echo "<input type='submit' value='新建文件'/>";  
echo "</form>";  
}  

closedir($is); //关闭目录  
 	
switch($_GET['action']){ 
case "create": //创建一个文件  
//1.获取要创建的文件名  
$filename = trim($path,"/")."/".$_POST["filename"];  
//2. 判断文件是否已存在  
if(file_exists($filename)){  
die("要创建的文件已存在！");  
}  
//3. 创建这个文件  
$f = fopen($filename,"w");  
fclose($f);
echo "<script>location.reload();</script>";  
break;
case "del": //删除一个文件  
unlink($_GET["filename"]);
echo "<script>window.history.back(0);</script>";
echo "<script>location.reload();</script>";
break;
case 'edit': //编辑文件信息  
//1. 获取文件名  
$filename=$_GET["filename"];  
//2.读取文件的内容：  
$fileinfo = file_get_contents($filename);  
break;
 
//default:
case 'update': //执行修改文件信息  
//获取信息：文件名，内容 

$filename = $_POST["filename"]; 
//echo $filename;
$content = $_POST["content"];  
//2. 执行文件内容修改  
file_put_contents($filename,$content);
//echo "<script>window.history.back(-1);</script>"; 
break;
}







?>
<html>
<head>
    <title><?php echo $filename; ?>-编辑</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            border: 0;
        }
        .box {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #eee;
        }
        .title {
            text-align: center;
            height: 80px;
            line-height: 80px;
        }
        .bjcontent {
            min-height:500px; 
        }
        textarea {
            width: 100%;
            margin: 0 auto;
            min-height: 500px;
            border: 1px solid #000;
            padding: 5px;
            outline: none;
        }
        .but {
            text-align: center;
        }
        .but button{
            
            width: 60px;
            height: 30px;
            
            line-height: 30px;
            border: 0;
            background: #AB82FF;
            color: #fff;
            outline: none;
        }
        .marleft {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div id="cover" style="display: none;position: fixed;width: 100%;height: 100%;top:0px;left:0px;background: gray;">    <!-- 通过遮罩层遮住背景 -->
<div style="background: #ffffff;border:1px solid green;" id="toast">     <!-- 设置display属性为none以隐藏内容       -->
<p><div class="box">
    <div class="title">-编辑</div>
    <div class="bjcontent">
        <form action="file.php?action=update" method="post">
		<input type="text" name="filename" value="<?php if($_GET["filename"]){echo $_GET["filename"];} ?>"/>
        文件名：<?php echo basename($_GET["filename"]); ?>
	     <textarea name="content">
		
            <?php echo $fileinfo; ?>
        </textarea>
    </div>
    <div class="but"><button name="bc">保存</button><button name="out" class="marleft" onclick="window.history.back(-1);return false;">取消</button></div>
 <button type="button" id="close">关闭</button>
	</form></p>
	</div>
</div>
</div>
<script type="text/javascript">
  var toast = document.getElementById("toast");
  var cover = document.getElementById("cover");
  document.getElementById("open").onclick = function(e){   <!--  定义点击事件显示隐藏内容     -->
  //lian();
    cover.style.display = "block";
    toast.style.position = "fixed";
    var winWidth = window.innerWidth;
    var winHeight = window.innerHeight;
    var targetWidth = toast.offsetWidth;
    var targetHeight = toast.offsetHeight;
    toast.style.top = (winHeight - targetHeight) / 2 + "px";
    toast.style.left = (winWidth - targetWidth) / 2 + "px";
	//window.location.href="12.php?filename={$filee}&action=edit";
  }
  document.getElementById("close").onclick = function(e){        <!--   将显示的内容再次隐藏     -->
    cover.style.display = "none";
	//return false;
  }
  function lian(){
	  window.location.href="http://127.0.0.1/huansuan/12.php?filename=<?php echo $filee; ?>&action=edit";
	  
  } 
   
 /*  function clink(){
	  lian();
  setTimeout(function() {
	// IE
	if(document.all) {
		document.getElementById("open").click();
	}
	// 其它浏览器
	else {
		var e = document.createEvent("MouseEvents");
		e.initEvent("click", true, true);
		document.getElementById("open").dispatchEvent(e);
	}
}, 2000);
  }
   */
 
 
  
  
</script>
</body>
</html>


  
  　　
  　
　　



