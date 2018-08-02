<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密码</title> 
</head> 
<body> 
  <?php
  include('../mysql.php');
 session_start (); 
  $username = $_POST ["username"]; 
  $oldpassword = $_POST ["oldpassword"]; 
  $newpassword = $_POST ["newpassword"]; 
   $username=htmlentities($username);
$oldpassword=htmlentities($oldpassword); 
 $newpassword=htmlentities($newpassword);
 
  $sql =$db->select("admin","where name = '$username' and pass='$oldpassword'");
  
 $row = mysql_fetch_row( $sql );
    if($row)
	{
		 $db->update("admin","pass='$newpassword'"," where name='$username'");
	  echo "<script type='text/javascript'> 
    alert('密码修改成功'); 
    window.location.href='yh.php'; 
  </script>";
		}
  
  else{ 
   
  echo "<script type='text/javascript'> 
    alert('用户名或密码错误'); 
    window.location.href='yh.php'; 
  </script>";  
 
  } 
  
  mysql_close(); 
  ?> 
  
  
 
</body> 
</html> 