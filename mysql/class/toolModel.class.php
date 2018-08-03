<?php
class toolModel extends model{
	public function index(){
		$files = glob('data/db_*.php');
	    $db_list = array();
		if(is_array($files))
		{
			foreach($files as $f)
			{
				$db_list[] = include($f);
			}
		}
		include tpl('tool');
	}
	public function restore(){
		global $submit,$name,$pre;
		if($submit){
			require 'class/database.class.php';
		    $database=new database();
		    $database->import($pre);
		}else{
			$sqlfiles = glob('data/bakup/*.sql');
		if(is_array($sqlfiles)){
			$prepre = '';
			$info = $infos = array();
			foreach($sqlfiles as $id=>$sqlfile){
				$names=explode('_', basename($sqlfile));
		        $info['filename'] = basename($sqlfile);
			    $info['filesize'] = round(filesize($sqlfile)/(1024*1024), 2);
			    $info['maketime'] = date('Y-m-d H:i:s', filemtime($sqlfile));
				$info['dbname'] = $names[0];
				$info['pre'] = $names[0].'_'.$names[1].'_'.$names[2].'_';
				$info['number'] = str_replace('.sql','',$names[3]);
				if(!$id) $prebgcolor = '#CFEFFF';
				if($info['pre'] == $prepre)
				{
					$info['bgcolor'] = $prebgcolor;
				}
				else
					{
					$info['bgcolor'] = $prebgcolor == '#CFEFFF' ? '#F1F3F5' : '#CFEFFF';
				}
				$prebgcolor = $info['bgcolor'];
				$prepre = $info['pre'];
				$infos[] = $info;		
			}
			
		}
		include tpl('tool_restore');
		}
		
	}
	//删除备份
	public function delbakup(){
		global $filenames;
	    if($filenames)
		{
			if(is_array($filenames))
			{
				foreach($filenames as $filename)
				{
					if(fileext($filename)=='sql')
					{
						@unlink('data/bakup/'.$filename);
					}
				}
				success('成功删除备份文件！');
			}
			else
			{
				if(fileext($filenames)=='sql')
				{
					@unlink('data/bakup/'.$filenames);
					success('成功删除备份文件！');
				}
			}
		}
		else{
			error('请选择要删除的备份！');;
	   }
	}
	//下载备份
	public function down()
	{   
		global $filename;
		$fileext = fileext($filename);
		if($fileext != 'sql')
		{
			success('只允许下载sql文件！');
		}
		file_down('data/bakup/'.$filename);

	}
	public function export(){
		global $name,$tables,$sqlcompat,$sqlcharset,$sizelimit,$fileid,$random,$tableid,$startfrom,$tabletype;
		require 'class/database.class.php';
		$database=new database();
		$database->export($tables,$sqlcompat,$sqlcharset,$sizelimit,$fileid,$random,$tableid,$startfrom,$tabletype,$name);
	}
	//执行sql语句
	public function runsql(){
		global $name,$sql,$submit;
		if($submit){
			require 'class/database.class.php';
		    $database=new database();
		    $result=$database->runsql($sql);
			if($result === true)
            {
				success('成功运行sql语句！');
            }
			elseif($result === false)
            {
				error('运行sql语句失败！');;
            }
		}else{
			$db_list=get_dblist();
			include tpl('tool_runsql');
		}
		
	}
	//批量替换
	public function replace(){
		global $name,$submit,$rpfield,$rpstring,$tostring,$exptable,$condition;
        if($submit){
    		if(empty($rpfield)){error("请手工指定要替换的字段!");}
		    if(empty($rpstring)){error("请指定要被替换内容！");}
		    $condition=empty($condition) ? '' : " where $condition ";
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
		    $this_db->query(" update $exptable set $rpfield=Replace($rpfield,'$rpstring','$tostring') $condition ");
		    success('批量替换完成!');
    	}else{
    		$db_list=get_dblist();
			include tpl('tool_replace');
    	}
		
	}
	
//获取数据表
	public function get_tables(){
	    global $name;
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
		$r=$this_db->select("SHOW TABLE STATUS FROM `".$dbname."`");
		$database = '<tr>
          <th width=60><input name="chkall" type="checkbox" id="chkall" onClick="checkall(this.form)" value="check">全选</th>
          <th>数据表</th>
          <th>类型</th>
          <th>编码</th>
          <th>记录条数</th>
          <th>占用空间</th>
          </tr>';
		foreach($r as $k=>$table){
			$database.="<tr>
            <td><input type=checkbox name=tables[] value='".$table['Name']."'</td>
            <td>".$table['Name']."</td>
            <td>".$table['Engine']."</td>
            <td>".$table['Collation']."</td>
            <td>".$table['Rows']."</td>
            <td>".sizecount($table['Data_length']+$table['Index_length'])."</td>
          </tr>";
		}
		echo $database.'<tr>
            <td colspan="6">每个分卷文件大小：<input style="width:50px;" type="text" name="sizelimit" value="2048" />K</td>
          </tr>
          <tr>
            <td><input type=hidden name=name value='.$name.' /></td>
            <td colspan="5"><input type="submit" name="submit" class="button" value="开始备份" /></td>
          </tr>';
	}
	//获取数据表
	public function get_table(){
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
		$database = '<option value="">请选择数据表</option>';
		while ($s = $this_db->fetch_array($r))
		{
			$database .= "<option value='".$s['Tables_in_'.$dbname]."'>".$s['Tables_in_'.$dbname]."</option>";
		}
		echo $database;
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
		$html = '<option value="">请选择</option>';
		foreach ($r as $key=>$val)
		{
			foreach ($val as $v)
			{
				$html .= '<option value="'.$v.'">'.$key.'.'.$v.'</option>';
			}
		}
		echo $html;
	}
}
?>