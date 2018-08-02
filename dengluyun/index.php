<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<style type="text/css">
 form{
    width:300px;
    background-color:#EEE0E5;
    margin-left:300px;
    margin-top:30px;
    padding:30px;
 }
</style>
<form method="post">
<label>username:<input type="text" name="name"></label>
<br/><br/>
<label>password:<input type="password" name="pass"></label>
<br/><br/>
<button type="submit" name="submit">login</button>
</form>
  </body>
</html>
<?PHP
  //header("Content-Type: text/html; charset=utf8");
include('../mysql.php'); 
  session_start();//开启session
  if(!isset($_POST["submit"])){
    exit("<center>请输入用户名密码</center>");
  }//检测是否有submit操作 
 
  //include('connect.php');//链接数据库
  $name = $_POST['name'];//post获得用户名表单值
  $pass = $_POST['pass'];//post获得用户密码单值
 
  if ($name && $pass){//如果用户名和密码都不为空
       //$sql = "select * from admin where name = '$name' and pass='$pass'";//检测数据库是否有对应的username和password的sql
      $result = $db->select("admin","where name = '$name' and pass='$pass'");
	  //$result = mysql_query($sql);//执行sql
       $rows=$db->rows($result);//返回一个数值
       if($rows){//0 false 1 true
	     
         $_SESSION['name'] = $name;
          header("location:login.php");//如果成功跳转至页面
          exit;
       }else{
        echo "<center>用户名或密码错误</center>";
        echo "
          <script>
              setTimeout(function(){window.location.href='index.php';},1000);
          </script>
 
        ";//如果错误使用js 1秒后跳转到登录页面重试;
       }
        }else{//如果用户名或密码有空
        echo "<center>表单填写不完整</center>";
        echo "
           <script>
              setTimeout(function(){window.location.href='index.php';},1000);
           </script>";
 
            //如果错误使用js 1秒后跳转到登录页面重试;
  }
 
  mysql_close();//关闭数据库
?>
 
  