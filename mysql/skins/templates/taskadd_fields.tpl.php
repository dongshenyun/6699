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
       <p id="notice">设置数据表字段的对应关系，如果填写默认值将覆盖源字段的值，处理函数请放在inc/function.php文件中。</p>
              <table cellpadding="0" cellspacing="0" class="table_list bdtop-bottom">
       <form action="?m=task&a=add" method="post">
         <input type="hidden" name="setting[t_name]" value="<?=$setting['t_name'];?>" />
         <input type="hidden" name="setting[note]" value="<?=$setting['note'];?>" />
         <input type="hidden" name="setting[to_tables]" value="<?=$setting['to_tables'];?>" />
         <input type="hidden" name="setting[from_tables]" value="<?=$setting['from_tables'];?>" />
         <input type="hidden" name="setting[todb]" value="<?=$setting['todb'];?>" />
         <input type="hidden" name="setting[fromdb]" value="<?=$setting['fromdb'];?>" />
         <input type="hidden" name="setting[in_type]" value="<?=$setting['in_type'];?>" />
         <input type="hidden" name="setting[each_num]" value="<?=$setting['each_num'];?>" />
         <input type="hidden" name="setting[maxid]" value="<?=$setting['maxid'];?>" />
         <input type="hidden" name="setting[condition]" value="<?=$setting['condition'];?>" />
       <tr>
          <th>主键</th>
          <th>导入字段</th>
          <th>源数据表字段</th>
          <th>默认值</th>
          <th>处理函数</th>
       </tr>
       <?  foreach ($newfield as $k=>$v)
			  { ?>
          <tr>
             <td><input name="setting[keyid]" type="radio" value="<?=$v;?>" <?=$taskinfo['keyid']==$v?'checked':'';?> /></td>
             <td><?=$v;?></td>
             <td class="list_fields"><input type="text" name="setting[<?=$v;?>][field]" id="field_<?=$k;?>" class="fields" value="<?=$taskinfo[$v]['field']?>" /> <span></span></td>
             <td><input type="text" name="setting[<?=$v;?>][value]" value="<?=$taskinfo[$v]['value']?>" /></td>
             <td><input type="text" name="setting[<?=$v;?>][fun]" value="<?=$taskinfo[$v]['fun']?>" /></td>
          </tr>
       <? } ?>   
          <tr>
             <td></td>
             <td colspan="4"><input type="submit" name="submit" value="确认提交" class="button" /> <input class="button" type="reset" name="reset" value="重置" /> </td>
          </tr>
       </form>
       </table>
</div> 
<?php 
include tpl('footer');
?>
<script type="text/javascript">
var html='';
var id = '';
$(document).ready(function(){
$(".fields").click(function(){
	$(".list_fields").children('span').html('&nbsp;');
	id = $(this).attr('id');
	if(html!='' && html != 'no')
	{
		$(this).parent('td').children('span').html(html);
	}
	else
	{
		html = $.ajax({
		type: "GET",
		url:'?m=task&a=get_field&name=<?=$setting['fromdb'];?>&table=<?=$setting['from_tables'];?>',
		data:'',
		async: false 
		}).responseText;
		if(html!='' && html != 'no')
		{
			$(this).parent('td').children('span').html(html);
		}
	}
});
})
function put_fields(obj)
{
	if(obj!='')
	{
		$("#"+id).val(obj);
	}
}

</script>