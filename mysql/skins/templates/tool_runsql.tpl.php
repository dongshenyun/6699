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
       <li class="now"><a href="?m=tool&a=runsql">执行SQL</a></li>
       <li><a href="?m=tool&a=replace">批量替换</a></li>      
    </ul>
    </div>
    <table cellpadding="0" cellspacing="0" class="table_form bdtop-bottom">
       <form action="?m=tool&a=runsql" method="post">
          <tr>
             <th>选择数据库：</th>
             <td><select name="name">
             <option value="">选择链接库</option>
             <? foreach($db_list as $k=>$v){?>
             <option value="<?=$v['name'];?>" <?=$todb==$v['name']?'selected':'';?>><?=$v['name'];?></option>
             <? } ?>
             </select></td>
          </tr>
          <tr>
             <th>SQL语句：</th>
             <td><textarea name="sql" style="height:100px;width:300px;"></textarea></td>
          </tr>
          <tr>
             <th></th>
             <td><input type="submit" name="submit" value="运行SQL" class="button" /> <input class="button" type="reset" name="reset" value="重置" /> </td>
          </tr>
       </form>
       </table>
</div>       
<?php 
include tpl('footer');
?>