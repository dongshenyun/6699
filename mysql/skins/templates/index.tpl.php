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
    <div id="main_l">
       <h1>链接库管理</h1>
       <p id="notice">链接库是链接到所需导入或者导出的数据库的基本连接信息。</p>
       <table cellpadding="0" cellspacing="0" class="table_list">
          <tr>
          <th>链接名称</th>
          <th>说明</th>
          <th>数据库名</th>
          <th>链接类型</th>
          <th>操作</th>
          </tr>
          <? foreach($db_list as $k=>$v){ ?>
          <tr>
            <td><?=$v['name'];?></td>
            <td><?=$v['note'];?></td>
            <td><?=$v['dbname'];?></td>
            <td><?=$v['dbtype'];?></td>
            <td><a href="?a=index&name=<?=$v['name'];?>">编辑</a>|<a href="?a=del_db&name=<?=$v['name'];?>">删除</a></td>
          </tr>
          <? }?>
       </table>
       <p>&nbsp;</p>
       <h1>添加链接库</h1>
       <table cellpadding="0" cellspacing="0" class="table_form bdtop-bottom">
       <form action="?m=index&a=add_db" method="post">
          <tr>
             <th>名称：</th>
             <td><input type="text" name="setting[name]" value="<?=$name;?>" /> *必须是英文、数字，禁止使用下划线！</td>
          </tr>
          <tr>
             <th>说明：</th>
             <td><input type="text" name="setting[note]" value="<?=$note;?>" /> 简要说明</td>
          </tr>
          <tr>
             <th>类型：</th>
             <td><select name="setting[dbtype]" id="dbtype" >
			<option value="mysql" <?=$dbtype=='mysql' ? 'selected' : ''?> >mysql</option>
			<option value="access" <?=$dbtype=='access' ? 'selected' : ''?>>access</option>
			<option value="mssql" <?=$dbtype=='mssql' ? 'selected' : ''?>>mssql</option>
		</select></td>
          </tr>
          <tr>
             <th>主机地址：</th>
             <td><input type="text" id="dbhost" name="setting[dbhost]" value="<?=$dbhost;?>" /> *如果是Access请填写数据库绝对地址 例:D:/data/db.mdb</td>
          </tr>
          <tr>
             <th>用户名：</th>
             <td><input type="text" id="dbuser" name="setting[dbuser]" value="<?=$dbuser;?>" /></td>
          </tr>
          <tr>
             <th>密码：</th>
             <td><input type="text" id="dbpw" name="setting[dbpw]" value="<?=$dbpw;?>" /></td>
          </tr>
          <tr>
             <th>数据库名：</th>
             <td><input type="text" id="dbname" name="setting[dbname]" value="<?=$dbname;?>" /> <a href="#" id="testdb">测试连接数据库</a></td>
          </tr>
          <tr>
             <th>数据库编码：</th>
             <td><input type="radio" name="setting[charset]" value="utf8" <?=$charset=='utf8' ? 'checked' : ''?>/>utf8 <input type="radio" name="setting[charset]" value="gbk" <?=$charset=='gbk' ? 'checked' : ''?> />gbk <input type="radio" name="setting[charset]" value="gb2312" <?=$charset=='gb2312' ? 'checked' : ''?> />gb2312 <input type="radio" name="setting[charset]" value="latin1" <?=$charset=='latin1' ? 'checked' : ''?> />latin1</td>
          </tr>
          <tr>
             <th></th>
             <td><input type="submit" name="submit" value="确认提交" class="button" /> <input class="button" type="reset" name="reset" value="重置" /> </td>
          </tr>
       </form>
       </table>
       
    </div>
    <div id="main_r">
       <div class="text_list">
          <h2>常用操作</h2>
          <ul>
            <li><a href="?m=tool">备份数据库</a></li>
            <li><a href="?m=tool&a=restore">还原数据库</a></li>
            <li><a href="?m=tool&a=replace">批量替换字符</a></li>
            <li><a href="?m=tool&a=runsql">执行sql语句</a></li>
          </ul>
       </div>
       <div id="about">
       <h2> 程序信息</h2>
        <p>程序版本：MysqlConvert <?=MC_VERSION;?><br />
        官方主页：<a href="http://www.xgcms.com" target="_blank">www.xgcms.com</a><br /></p>
       </div>
       <div id="ads">
       <script type="text/javascript">BAIDU_CLB_fillSlot("138867");</script>
       </div>
    </div>
</div>
<?php 
include tpl('footer');
?>
<script type="text/javascript">
$('#testdb').click(function(){
	$.get("?m=index&a=test", {dbtype:$('#dbtype').val(), dbhost:$('#dbhost').val(), dbuser:$('#dbuser').val(), dbpw:$('#dbpw').val(), dbname:$('#dbname').val()}, function(data) {
	if(data=="ok") 
	{
		alert('连接成功');
	}
	else
	{
		alert('连接失败');
	}
	});
});
</script>