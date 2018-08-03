<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>已完成<?=$rate.'%';?>-<?=$name;?></title>
<link rel="stylesheet" href="skins/style.css" type="text/css" />
<meta http-equiv='Refresh' content='3;URL=<?=$url;?>'>
</head>

<body>
<table cellpadding="0" cellspacing="0" id="rate">
   <tr>
     <td align="center"><img src="skins/images/qb90.gif" /></td>
   </tr>
   <tr>
     <td id="progress"><table cellpadding="0" cellspacing="0" width="<?=$rate<100?$rate.'%':'100'.'%';?>"><tr><td> 已完成<?=$rate.'%';?></td></tr></table></td>
   </tr>
   <tr>
     <td id="notice">总数：<?=$total;?> 成功：<?=$newsuc;?> 失败：<?=$newfas;?> <a href="<?=$url;?>">正在导入<?=$start;?>至<?=$end;?>条数据>></a></td>
   </tr>
</table>
</body>
</html>