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
       <h1>任务列表</h1>
       <p id="notice">管理你的数据库之间的转换任务。</p>
       <table cellpadding="0" cellspacing="0" class="table_list">
          <tr>
          <th>任务名称</th>
          <th>任务说明</th>
          <th>上次导入最大ID</th>
          <th>导入方式</th>
          <th>操作</th>
          </tr>
          <? foreach($task_list as $k=>$v){ ?>
          <tr>
            <td><?=$v['t_name'];?></td>
            <td><?=$v['note'];?></td>
            <td><?=$v['maxid'];?></td>
            <td><?=$v['in_type'];?></td>
            <td><a href="?m=task&a=taskrun&name=<?=$v['t_name'];?>" target="_blank">执行</a>|<a href="?m=task&a=taskadd&name=<?=$v['t_name'];?>">编辑</a>|<a href="?m=task&a=taskdel&name=<?=$v['t_name'];?>">删除</a></td>
          </tr>
          <? }?>
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