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
       <li class="now"><a href="?m=tool">备份数据</a></li>
       <li><a href="?m=tool&a=restore">还原数据</a></li>
       <li><a href="?m=tool&a=runsql">执行SQL</a></li>
       <li><a href="?m=tool&a=replace">批量替换</a></li>      
    </ul>
    </div>
    <p class="text">选择需要备份的数据库：<select name="bakdb" onChange="get_tables(this.value)">
             <option value="">选择链接库</option>
             <? foreach($db_list as $k=>$v){?>
             <option value="<?=$v['name'];?>" <?=$todb==$v['name']?'selected':'';?>><?=$v['name'];?></option>
             <? } ?>
    </select>
    </p>
    <form method="post" name="myform" id="myform" action="?m=tool&a=export">
    <table cellpadding="0" cellspacing="0" class="table_list" id="list_tables">

    </table>
    <input type="hidden" name="sqlcompat" value="" checked>
   </form>
</div>       
<?php 
include tpl('footer');
?>
<script type="text/javascript">

<!--
function get_tables(name)
{    
	//if($('#dbtype').val() != 'mysql') return false;
	$.get("?m=tool&a=get_tables&name="+name, function(data){
		$("#list_tables").html(data);
	});
}

function checkall(form) {
	for(var i = 0;i < form.elements.length; i++) {
		var e = form.elements[i];
		if (e.name != 'chkall' && e.disabled != true) {
			e.checked = form.chkall.checked;
		}
	}
}
//-->

</script>
