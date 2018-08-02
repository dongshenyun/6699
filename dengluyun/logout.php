<meta charset="utf-8">
<?php

 include("session.php");
   
    if(isset($_SESSION['name'])){
            session_unset();//free all session variable
            session_destroy();//销毁一个会话中的全部数据
            setcookie(session_name(),'',time()-3600);//销毁与客户端的卡号
            header('location:tiao.php?info=注销成功，正在跳转！');
        }else{
            header('location:tiao.php?info=注销失败，请稍后重试！');
        }
?>

