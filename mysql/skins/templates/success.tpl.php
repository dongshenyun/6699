<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示信息！</title>
<link rel="stylesheet" href="skins/style.css" type="text/css" />
<meta http-equiv='Refresh' content='<?=$waitSecond;?>;URL=<?=$jumpUrl;?>'>
</head>

<body>
<table cellpadding="0" cellspacing="0" id="rate">
   <tr>
     <td align="center"><img src="skins/images/<?=$status?>.png" /></td>
   </tr>
   <tr>
     <td id="message"><?=$msg;?>  <a href="<?=$jumpUrl;?>">立即跳转>></a></td>
   </tr>
</table>

</body>
</html>