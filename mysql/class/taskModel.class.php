<?php
class taskModel extends model{
	public function tasklist(){
		$files = glob('data/task_*.php');
	    $task_list = array();
		if(is_array($files))
		{
			foreach($files as $f)
			{
				$task_list[] = include($f);
			}
		}
		include tpl('tasklist');
	}
	//执行任务
	public function taskrun(){
		global $name,$total,$offset,$fas,$suc;	
		$info=require 'data/task_'.$name.'.php';
		$offset=isset($offset) ? intval($offset) : $info['maxid'] ;
		$number=$info['each_num'];
		include 'class/import.class.php';
		$import=new import();
		$result=$import->convert($info,$offset);
		list($finished, $total,$suc_num,$fas_num) = explode('-', $result);
		$newfas=$fas_num+$fas;
		$newsuc=$suc_num+$suc;
		$newoffset = $offset + $number;
		$start = $newoffset + 1;
		$end = $finished ? ($offset+$importnum) : $newoffset+$number;
		if($finished){
			$url='?m=task&a=tasklist';
		}else{
			$url='?m=task&a=taskrun&name='.$name.'&offset='.$newoffset.'&total='.$total.'&fas='.$newfas.'&suc='.$newsuc;
		}
		$message='总数'.$total.',成功：'.$newsuc.',失败：'.$newfas.'<br />正在导入第'.$start.'至第'.$end.'条数据！';
		$rate=intval(($start*100)/$total);
		include tpl('import_rate');
		//$this->success($message,'3',$url);		
	}
	//进度框
	function rate(){
		include tpl('import_rate');
	}
	//修改任务
   public function taskdel(){
   	    global $name;
   	    if(empty($name))
		{
			$this->error('请选择需要删除的任务！');
		}
		$file='task_'.$name.'.php';
		cache_delete($file,'data/');
		$this->success('任务删除成功！');
	}
	public function taskadd(){
	   global $name;  
	   if($name!=''){
   	        $task='task_'.$name.'.php';
   	        $taskinfo=cache_read($task);
   	        extract($taskinfo);
   	    }
		$files = glob('data/db_*.php');
	    $db_list = array();
		if(is_array($files))
		{
			foreach($files as $f)
			{
				$db_list[] = include($f);
			}
		}
		
		include tpl('taskadd');
	}
	public function fields(){
		global $setting;
		if($setting['t_name']==''){
			$this->error('请输入任务名！');
		}
		$task='task_'.$setting['t_name'].'.php';
		if(file_exists('data/'.$task)){
			$taskinfo=cache_read($task);
		}
		if(!class_exists('import')){
	       require 'class/import.class.php';
        }
        $import = new import();
		$to_table = explode(',', $setting['to_tables']);
	    if(isset($setting['todb'])){
			$file='db_'.$setting['todb'].'.php';
		    $dbinfo=cache_read($file);
		    extract($dbinfo);
		}
		$this_db = $import->connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname, $charset);
		$newfield=array();
		foreach ($to_table as $key=>$val)
		{
			$r[$val] = $this_db->get_fields($val);
			$newfield=array_merge($newfield,$r[$val]);
		}
		include tpl('taskadd_fields');
	}
	function add(){
		global $setting;
		if($setting['t_name']==''){
			$this->error('没有输入任务名称！');
		}
		$name='task_'.$setting['t_name'].'.php';
		cache_write($name,$setting,'data/');
		$this->success('任务配置保存成功！','1','?m=task&a=tasklist');
	}
	//获取数据表
	public function get_tables(){
	    global $name,$t;
	    if(isset($name)){
			$file='db_'.$name.'.php';
		    $setting=cache_read($file);
		    extract($setting);
		}
		if(!class_exists('import')){
	       require 'class/import.class.php';
        }
        $import = new import();
        $this_db = $import->connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname, $charset);
			
		$r = $this_db->query("SHOW TABLES");
		if($t=='from'){
		    $database = '<select id="tables" onchange="f_tables(this.value)"><option value="">请选择数据表</option>';
		}else{
			$database = '<select id="tables" onchange="in_tables(this.value)"><option value="">请选择数据表</option>';
		}
		while ($s = $this_db->fetch_array($r))
		{
			$database .= "<option value='".$s['Tables_in_'.$dbname]."'>".$s['Tables_in_'.$dbname]."</option>";
		}
		echo $database."</select>";
	}
	//获取字段
	public function get_field(){
		global $name,$table;
		if(!class_exists('import')){
	       require 'class/import.class.php';
        }
		$import=new import();
		$db_table = explode(',', $table);
		if(isset($name)){
			$file='db_'.$name.'.php';
		    $dbinfo=cache_read($file);
		    extract($dbinfo);
		}
		$this_db = $import->connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname, $charset);
		foreach ($db_table as $key=>$val)
		{
			$r[$val] = $this_db->get_fields($val);
		}
		$html = '<select onchange="if(this.value!=\'\'){put_fields(this.value)}"><option value="">请选择</option>';
		foreach ($r as $key=>$val)
		{
			foreach ($val as $v)
			{
				$html .= '<option value="'.$v.'">'.$key.'.'.$v.'</option>';
			}
		}
		echo $html.'</select>';
	}
}
?>