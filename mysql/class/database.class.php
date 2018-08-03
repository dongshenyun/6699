<?php
class database{
	var $db;
	var $charset;
	function database()
	{   
		global $name;
		$this->db=&$this_db;
		if(isset($name)){
			$file='db_'.$name.'.php';
		    $setting=cache_read($file);
		    extract($setting);
		}
		$this->charset=$charset;
		if(!class_exists('import')){
	       require 'class/import.class.php';
        }
		$import = new import();
		$this_db = $import->connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname, $charset);
	}
	function export($tables,$sqlcompat,$sqlcharset,$sizelimit,$fileid,$random,$tableid,$startfrom,$tabletype,$name)
	{    
	    global $this_db;
		$dumpcharset = $sqlcharset ? $sqlcharset : 'utf8';
		$fileid = isset($fileid) ? $fileid : 1;
		if($fileid==1 && $tables)
		{
			if(!isset($tables) || !is_array($tables)) exit('请选择备份的表!');
			$random = mt_rand(1000, 9999);
			cache_write('bakup_tables.php', $tables);
		}
		else
		{
			if(!$tables = cache_read('bakup_tables.php')) exit('请选择备份的表!');
		}
		if($this->db->version() > '4.1')
		{
			if($sqlcharset)
			{
				$this->db->query("SET NAMES '".$sqlcharset."';\n\n");
			}
			if($sqlcompat == 'MYSQL40')
			{
				$this->db->query("SET SQL_MODE='MYSQL40'");
			}
			elseif($sqlcompat == 'MYSQL41')
			{
				$this->db->query("SET SQL_MODE=''");
			}
		}
		$tabledump = '';
		$tableid = isset($tableid) ? $tableid - 1 : 0;
		$startfrom = isset($startfrom) ? intval($startfrom) : 0;
		for($i = $tableid; $i < count($tables) && strlen($tabledump) < $sizelimit * 1000; $i++)
		{
			global $startrow;
			$offset = 100;
			if(!$startfrom)
			{
				
				$createtable = $this->db->query("SHOW CREATE TABLE `$tables[$i]` ");
				$create = $this->db->fetch_row($createtable);
				$tabledump .= $create[1].";\n\n";
				if($sqlcompat == 'MYSQL41' && $this->db->version() < '4.1')
				{
					$tabledump = preg_replace("/TYPE\=([a-zA-Z0-9]+)/", "ENGINE=\\1 DEFAULT CHARSET=".$dumpcharset, $tabledump);
				}
				if($this->db->version() > '4.1' && $sqlcharset)
				{
					$tabledump = preg_replace("/(DEFAULT)*\s*CHARSET=[a-zA-Z0-9]+/", "DEFAULT CHARSET=".$sqlcharset, $tabledump);
				}
			}
			$numrows = $offset;
			while(strlen($tabledump) < $sizelimit * 1000 && $numrows == $offset)
			{
				$rows = $this->db->query("SELECT * FROM `$tables[$i]` LIMIT $startfrom, $offset");
				$numfields = $this->db->num_fields($rows);
				$numrows = $this->db->num_rows($rows);
				while ($row = $this->db->fetch_row($rows))
				{
					$comma = "";
					$tabledump .= "INSERT INTO `$tables[$i]` VALUES(";
					for($j = 0; $j < $numfields; $j++)
					{
						$tabledump .= $comma."'".mysql_escape_string($row[$j])."'";
						$comma = ",";
					}
					$tabledump .= ");\n";
				}
				$this->db->free_result($rows);
				$startfrom += $offset;
			}
			$tabledump .= "\n";
			$startrow = $startfrom;
			$startfrom = 0;
		}

		if(trim($tabledump))
		{
			$tabledump = "# www.mysqlconvert.com bakfile\n# version:".MC_VERSION."\n# time:".date('Y-m-d H:i:s')."\n# type:mysqlconvert\n# mysqlconvert:http://www.mysqlconvert.com\n# --------------------------------------------------------\n\n\n".$tabledump;
			$tableid = $i;
			$filename = $name.'_'.date('Ymd').'_'.$random.'_'.$fileid.'.sql';
			$altid = $fileid;
			$fileid++;
			$bakfile = 'data/bakup/'.$filename;
			if(!is_writable('data/bakup/')) exit('data/bakup/不能写入！');
			file_put_contents($bakfile, $tabledump);
			@chmod($bakfile, 0777);
			$status='success';
			$msg='成功备份'.$filename;
			$waitSecond='1';
			$jumpUrl='?m=tool&a=export&sizelimit='.$sizelimit.'&sqlcompat='.$sqlcharset.'&tableid='.$tableid.'&fileid='.$fileid.'&startfrom='.$startrow.'&random='.$random.'&dosubmit=1&tabletype='.$tabletype.'&name='.$name;
			include tpl('success');
		}
		else
		{  
		     cache_delete('bakup_tables.php');
			 $waitSecond='1';
			 $status='success';
		    $msg='备份完成！';
			$jumpUrl='?m=tool';
			include tpl('success');		   
		}
	}
    function import($filename)//还原数据库
	{
		global $fileid,$name;
		if($filename && fileext($filename)=='sql')
		{
			$filepath = 'data/bakup/'.$filename;
			if(!file_exists($filepath)) error('备份文件不存在！');
			$sql = file_get_contents($filepath);
			$this->sql_execute($sql);
			success($filename.'成功导入数据库！');
		}
		else
		{
			$fileid = $fileid ? $fileid : 1;
			$pre = $filename;
			$filename = $filename.$fileid.'.sql';
			$filepath ='data/bakup/'.$filename;
			if(file_exists($filepath))
			{
				$sql = file_get_contents($filepath);
				$this->sql_execute($sql);
				$fileid++;
				success('成功导入'.$filename,'3',"?m=tool&a=restore&pre=".$pre."&fileid=".$fileid."&name=".$name. "&submit=1");
			}
			else
			{
				success('所有备份导入数据库成功！','3','?m=tool&a=restore');
			}
		}
	}
	
function sql_execute($sql)
{
    $sqls =$this-> sql_split($sql);
	if(is_array($sqls))
    {
		foreach($sqls as $sql)
		{
			if(trim($sql) != '')
			{
				$this->db->query($sql);
			}
		}
	}
	else
	{
		$this->db->query($sqls);
	}
	return true;
}

function sql_split($sql)
{
	if($this->db->version() > '4.1' && $this->charset)
	{
		$sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "TYPE=\\1 DEFAULT CHARSET=".$this->charset,$sql);
	}
	$sql = str_replace("\r", "\n", $sql);
	$ret = array();
	$num = 0;
	$queriesarray = explode(";\n", trim($sql));
	unset($sql);
	foreach($queriesarray as $query)
	{
		$ret[$num] = '';
		$queries = explode("\n", trim($query));
		$queries = array_filter($queries);
		foreach($queries as $query)
		{
			$str1 = substr($query, 0, 1);
			if($str1 != '#' && $str1 != '-') $ret[$num] .= $query;
		}
		$num++;
	}
	return($ret);
}
    
	function runsql($sql){
       if(empty($sql))
        {
            return false;
        }
        //sql执行
        $sql = stripslashes($sql);
        $sql = str_replace("\\", "", $sql);
        $sql = str_replace("\r", "", $sql);
        $query_items = split(";[ \t]{0,}\n",$sql);
        foreach ($query_items as $key=>$value)
        {
            if (empty($value))
            {
                unset($query_items[$key]);
            }
        }
        if(count($query_items) > 1)
        {
            foreach ($query_items as $key=>$value)
            {
                if(!$result=$this->db->query($value, 'SILENT'))
                {
                    return false;
                }
            }
            return true; //退出函数
        }
        else
        {
            if (preg_match("/^(?:UPDATE|DELETE|TRUNCATE|ALTER|DROP|FLUSH|INSERT|REPLACE|SET|CREATE)\\s+/i", $sql))
            {
                $result = $this->db->query($sql);
                return $result;
            }
            else
            {
                 $result = $this->db->query($sql);
                 $data=array();
				 while($r=$this->db->fetch_array($result))
                 {
                    $data[]=$r;
                 }
                 return $data;
            }
        }
	}

}
?>