  <?php 
 include("session.php");
  ?> 
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>修改密码</title> 
<style type="text/css"> 
  form{ 
    
  } 
 #b{
            width: 500px;
            
            text-align: right;        /*右对齐*/·
			text-align: center; 
        }
.put{width:120px; height:18px; padding: px; marging: px;}

</style> 
</head> 
<body> 

  <div id="b">
  <form action="xg.php" method="post" onsubmit="return alter()"> 
    用户名<input type="text" name="username" id ="username" class="put"><br/> 
	旧密码<input type="password" name="oldpassword" id ="oldpassword" class="put"/><br/> 
	新密码<input type="password" name="newpassword" id="newpassword" class="put"/><br/> 
确认新密码<input type="password" name="assertpassword" id="assertpassword" class="put"/><br/> 
	<input type="submit" value="修改密码" onclick="return alter()"> 
  </form> 
  </div>
    <script type="text/javascript"> 
     document.getElementById("username").value="<?php echo "{$_SESSION['name']}";?>" 
    </script> 
  
  <script type="text/javascript"> 
    function alter() { 
        
      var username=document.getElementById("username").value; 
      var oldpassword=document.getElementById("oldpassword").value; 
      var newpassword=document.getElementById("newpassword").value; 
      var assertpassword=document.getElementById("assertpassword").value; 
      var regex=/^[/s]+$/; 
      if(regex.test(username)||username.length==0){ 
        alert("用户名格式不对"); 
        return false; 
      } 
      if(regex.test(oldpassword)||oldpassword.length==0){ 
        alert("密码格式不对"); 
        return false; 
      } 
      if(regex.test(newpassword)||newpassword.length==0) { 
        alert("新密码格式不对"); 
        return false; 
      } 
      if (assertpassword != newpassword||assertpassword==0) { 
        alert("两次密码输入不一致"); 
        return false; 
      } 
      return true; 
  
    } 
  </script>  
</body> 
</html> 
