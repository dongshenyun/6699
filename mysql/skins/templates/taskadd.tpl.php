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
       <h1>添加任务</h1>
       <p id="notice">添加数据库之间的转换任务，被导入表和来源表均可为多张表，导入方式选择更新，表示更新主键相同的记录。</p>
              <table cellpadding="0" cellspacing="0" class="table_form bdtop-bottom">
       <form action="?m=task&a=fields" method="post">
          <tr>
             <th>任务名称：</th>
             <td><input type="text" name="setting[t_name]" value="<?=$t_name;?>" /> *必须是英文、数字和下划线</td>
          </tr>
          <tr>
             <th>任务说明：</th>
             <td><input type="text" name="setting[note]" value="<?=$note;?>" /> </td>
          </tr>
          <tr>
             <th>导入数据表：</th>
             <td><input type="text" name="setting[to_tables]" id="to_tables" value="<?=$to_tables;?>" /> <span id="select_tables"></span> <select name="setting[todb]" onChange="get_tables(this.value)">
             <option value="">选择链接库</option>
             <? foreach($db_list as $k=>$v){?>
             <option value="<?=$v['name'];?>" <?=$todb==$v['name']?'selected':'';?>><?=$v['name'];?></option>
             <? } ?>
             </select> 非mysql的请手动输入数据表</td>
          </tr>
          <tr>
             <th>源数据表：</th>
             <td><input type="text" name="setting[from_tables]" id="from_tables" value="<?=$from_tables;?>" /> <span id="select_tables2"></span> <select name="setting[fromdb]" onChange="get_tables2(this.value)">
             <option value="">选择链接库</option>
             <? foreach($db_list as $k=>$v){?>
             <option value="<?=$v['name'];?>" <?=$fromdb==$v['name']?'selected':'';?>><?=$v['name'];?></option>
             <? } ?>
             </select></td>
          </tr>
          <tr>
             <th>导入方式：</th>
             <td><input type="radio" name="setting[in_type]" value="add" <?=$in_type=='add'?'checked':'';?> />追加 <input type="radio" name="setting[in_type]" value="update" <?=$in_type=='update'?'checked':'';?> />更新</td>
          </tr>
          <tr>
             <th>数据提取条件：</th>
             <td><input type="text" name="setting[condition]" value="<?=$condition;?>" /> 例如：id>100</td>
          </tr>
          <tr>
             <th>每次导入：</th>
             <td><input type="text" name="setting[each_num]" value="<?=$each_num?$each_num:'100';?>" /></td>
          </tr>
          <tr>
             <th>上次导入ID：</th>
             <td><input type="text" name="setting[maxid]" value="<?=$maxid?$maxid:'0';?>" /></td>
          </tr>
          <tr>
             <th></th>
             <td><input type="submit" name="submit" value="下一步" class="button" /> <input class="button" type="reset" name="reset" value="重置" /> </td>
          </tr>
       </form>
       </table>
</div> 
<?php 
include tpl('footer');
?>
<script type="text/javascript">
function get_tables(name)
{    
	//if($('#dbtype').val() != 'mysql') return false;
	$.get("?m=task&a=get_tables&t=to&name="+name, function(data){
		$("#select_tables").html(data);
	});
}
function get_tables2(name)
{    
	//if($('#dbtype').val() != 'mysql') return false;
	$.get("?m=task&a=get_tables&t=from&name="+name, function(data){
		$("#select_tables2").html(data);
	});
}
function in_tables(val)
{
	if($('#to_tables').val()!='')
	{
		$('#to_tables').val($('#to_tables').val()+','+val);
	}
	else
	{
		$('#to_tables').val(val);
	}
}
function f_tables(val)
{
	if($('#from_tables').val()!='')
	{
		$('#from_tables').val($('#from_tables').val()+','+val);
	}
	else
	{
		$('#from_tables').val(val);
	}
}
</script>