<?php
defined('IN_MC') or exit('Access Denied');
include tpl('header');
?>
<div id="submenu">
   <div id="nav">
      使用步骤:新建链接库→添加任务→执行任务→完成
   </div>
</div>
<div id="main"> 
    <h1>数据库工具</h1>
    <p id="notice">集合备份、还原、执行SQL语句、批量替换等数据库常用操作。</p>
    <div id="tool_nav">
    <ul>
       <li><a href="?m=tool">备份数据</a></li>
       <li class="now"><a href="?m=tool&a=restore">还原数据</a></li>
       <li><a href="?m=tool&a=runsql">执行SQL</a></li>
       <li><a href="?m=tool&a=replace">批量替换</a></li>      
    </ul>
    </div>
    <form method="post" id="myform" name="myform" >
<table cellpadding="0" cellspacing="1" class="table_list">
	<tr>
		<th width="8%">选中</th>
		<th>文件名</th>
		<th width="10%">文件大小</th>
		<th width="20%">备份时间</th>
		<th width="10%">卷号</th>
		<th width="15%">操作</th>
	</tr>
<?php
if(is_array($infos)){
	foreach($infos as $id => $info){
$id++;
?>
  <tr >
    <td><input type="checkbox" name="filenames[]" value="<?=$info['filename']?>" id="sql_phpcms" boxid="sql_phpcms"></td>
    <td><a href="?m=tool&a=down&filename=<?=$info['filename']?>"><?=$info['filename']?></a></td>
    <td class="align_c"><?=$info['filesize']?> M</td>
	<td class="align_c"><?=$info['maketime']?></td>
    <td class="align_c"><?=$info['number']?></td>
    <td class="align_c">
	<a href="?m=tool&a=restore&pre=<?=$info['pre']?>&name=<?=$info['dbname'];?>&submit=1">导入</a> |
	<a href="?m=tool&a=down&filename=<?=$info['filename']?>">下载</a>
	</td>
</tr>
<?php
	}
}
?>
<tr>
  <td><input name="chkall" type="checkbox" id="chkall" onClick="checkall(this.form)" value="check">全选</td>
  <td colspan="5"><input type="submit" name="submit" class="button" value=" 删除备份 " onClick="document.myform.action='?m=tool&a=delbakup'"></td>
</tr>
</table>
</form>
</div>       
<?php 
include tpl('footer');
?>