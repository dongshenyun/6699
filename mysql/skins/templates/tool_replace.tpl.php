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
       <li><a href="?m=tool&a=restore">还原数据</a></li>
       <li><a href="?m=tool&a=runsql">执行SQL</a></li>
       <li class="now"><a href="?m=tool&a=replace">批量替换</a></li>      
    </ul>
    </div>
    <table cellpadding="0" cellspacing="0" class="table_form bdtop-bottom">
       <form action="?m=tool&a=replace" method="post">
          <tr>
             <th>选择数据库：</th>
             <td><select name="name" id="name" onChange="get_tables(this.value)">
             <option value="">选择链接库</option>
             <? foreach($db_list as $k=>$v){?>
             <option value="<?=$v['name'];?>" <?=$todb==$v['name']?'selected':'';?>><?=$v['name'];?></option>
             <? } ?>
             </select></td>
          </tr>
          <tr>
             <th>选择数据表：</th>
             <td><select name="exptable" id="select_tables" onchange="get_field(this.value)">
             <option value="">选择数据表</option></select></td>
          </tr>
          <tr>
             <th>选择字段：</th>
             <td><select id="field" name="rpfield">
             <option value="">选择字段</option></select></td>
          </tr>
          <tr>
             <th>被替换的内容：</th>
             <td><textarea name="rpstring" style="height:60px;width:300px;"></textarea></td>
          </tr>
          <tr>
             <th>替换为：</th>
             <td><textarea name="tostring" style="height:60px;width:300px;"></textarea></td>
          </tr>
          <tr>
             <th>替换条件：</th>
             <td><input name="condition" type="text" id="condition" style="width:300px;"/>(为空全部替换 请遵循SQL的条件语句 如id=61 id>39)</td>
          </tr>
          <tr>
             <th></th>
             <td><input type="submit" name="submit" value="开始替换" class="button" /> <input class="button" type="reset" name="reset" value="重置" /> </td>
          </tr>
       </form>
       </table>
</div>       
<?php 
include tpl('footer');
?>
<script type="text/javascript">
<!--

function get_tables(name)
{    
	$.get("?m=tool&a=get_table&name="+name, function(data){
		$("#select_tables").html(data);
	});
}
function get_field(table)
{    
	$.get("?m=tool&a=get_field&name="+$('#name').val()+"&table="+table, function(data){
		$("#field").html(data);
	});
}
-->
</script>
