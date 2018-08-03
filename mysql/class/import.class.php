<?php
if(!defined('CACHE_IMPORT_PATH'))
{
	define('CACHE_IMPORT_PATH', 'data/');
}

class import
{
	var $msg;
	var $db;
	var $sameserver = 0;
	var $sqldb;
	var $remotedb;
    var $mail_datadir = '';
    var $counter = '';
	function __construct()
	{
		global $db;
		$this->db = &$db;
        $this->mail_datadir = 'data/mail/data/';
        $this->counter = 0;
	}

	function import()
	{
		$this->__construct();
	}
    function connect_db_name($name,$tocharset=''){
		$dbinfo=cache_read('db_'.$name.'.php');//源数据库
		extract($dbinfo);
		$dbclass = 'db_'.$dbtype;			
		if(!class_exists($dbclass))
		{
			require 'class/'.$dbclass.'.class.php';
		}
		$this->remotedb = $dbname;	
		$this->sqldb = new $dbclass;
		if(!$this->sqldb->connect($dbhost, $dbuser, $dbpw, $this->remotedb, 0, $tocharset))
		{
			return false;
		}
		return $this->sqldb;
		
	}
	function connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname = '', $charset = '')
	{
		global $db;
		$this->remotedb = $dbname;
		$dbclass = 'db_'.$dbtype;			
		if(!class_exists($dbclass))
		{
			require $dbclass.'.class.php';
		}	
		$this->sqldb = new $dbclass;
		if(!$this->sqldb->connect($dbhost, $dbuser, $dbpw, $this->remotedb, 0, $charset))
		{
			return false;
		}
		return $this->sqldb;
	}

	function filter_fields($info, $offset, $keyid)
	{

		$result['table'] = trim($info['from_tables']);
		$firstdot = strpos($result['table'], ',');
		if($firstdot)
		{
			$startpos = intval(strpos($result['table'], ' '));
			$firsttable = trim(substr($result['table'], $startpos, $firstdot-$startpos));
		}

		$result['maxid'] = intval($info['maxid']);
		$condition = str_replace('$maxid', $result['maxid'], $info['condition']);
        if($condition) $result['condition'] = " WHERE $condition";
		$number = $info['each_num'];
		if($number) $result['limit'] = " LIMIT $offset,$number";

		if($this->sameserver) $this->sqldb->select_db($this->remotedb);
		$r = $this->sqldb->get_one("SELECT count(*) AS total FROM $result[table] $result[condition]");
		$result['total'] = $r['total'];

		$result['orderby'] = $firsttable ? $firsttable.'.'.$keyid : $keyid;
		$result['selectfield'] = $info['selectfield'] ? $info['selectfield'] : '*';
		return $result;
	}
    function convert($import_info,$offset)
	{
		$tokeyid = $import_info['keyid'];
		$keyid=$import_info[$tokeyid]['field'];
		if(!$keyid) $this->error('The keyid si not exit!');
		$fromdb=$import_info['fromdb'];
		$fromdbinfo=cache_read('db_'.$fromdb.'.php');//源数据库
		$todb=$import_info['todb'];
		$todbinfo=cache_read('db_'.$todb.'.php');//导入数据库		
		$this->connect_db_name($fromdb,$todbinfo['charset']);
		$data=array();
		foreach($import_info as $k=>$v){
			if(is_array($v)){
			    //if($k == $keyid) continue;
			    $oldfield = trim($v['field']);
			    $fun = trim($v['fun']);
			    $value = trim($v['value']);
				if($value!==''){
				    $data[$k] = $value;
			    }else{
					if($oldfield && $fun){
						$oldfields[$oldfield] = $k;
					    $oldfuns[$oldfield] = $fun;
						
						$newfields[$k]=$oldfield;
						$newfuns[$k]=$fun;
					}elseif($oldfield ){
					    $oldfields[$oldfield] = $k;
						
						$newfields[$k]=$oldfield;
				    }
				}
			}
			
		}
		$result = $this->filter_fields($import_info, $offset, $keyid);
		@extract($result);
		$ddata = $data;//有默认值的字段
		$query = $this->sqldb->query("SELECT $selectfield FROM $table $condition ORDER BY $orderby $limit");
		$importnum = $this->sqldb->num_rows($query);//导入次数
		while ($r = $this->sqldb->fetch_array($query))
		{
			$data = $ddata;
			$r = new_addslashes($r);
			foreach($newfields as $_k=>$_v){
				if(isset($r[$_v])){
					if($newfuns[$_k]){
						$data[$_k]=$newfuns[$_k]($r[$_v]);
					}else{
						if(!$oldvalues[$k])	$data[$_k] = $r[$_v];
					}
				}
			}
			/*
			foreach ($r as $k=>$v)
			{
				if(isset($oldfields[$k]) && $v)
				{
					if($oldfuns[$k])
					{
						$data[$oldfields[$k]] = $oldfuns[$k]($v);
						if(!$data[$k]) continue;
					}
					else
					{
						if(!$oldvalues[$k])	$data[$oldfields[$k]] = $v;
					}
				}
			}
			*/
			$maxid = max($maxid, $r[$keyid]);
			$s[] = $data;
			//print_r($data);exit;
		}
		$this->sqldb->free_result($query);
		if($todb!==$fromdb){
			$this->sqldb->close();
			$this->connect_db_name($todb,$todbinfo['charset']);
		}
		$suc_num=0;
		$fas_num=0;
		foreach ($s as $val)
		{
			$val=new_addslashes($val);
			if($todbinfo['charset'] == 'utf8' && $fromdbinfo['dbtype'] == 'access') $val = str_charset('gbk', 'utf-8', $val);
			$to_tables =explode(',',trim($import_info['to_tables']));
			if($import_info['in_type']=='add'){
			   foreach($to_tables as $v){
				    $fields = $this->sqldb->get_fields($v);
					foreach($fields as $f){
						$new[$f]=$val[$f];
					}
			        $rs= $this->sqldb->insert($v,$new);
					if($rs){
						$suc_num+=1;
					}else{
						$fas_num+=1;
					}
					unset($new);
			   }
			}elseif($import_info['in_type']=='update'){	
				foreach($to_tables as $v){
					$where="$tokeyid=$val[$tokeyid]";
					$rs= $this->sqldb->update($v,$val,$where);
					if($rs){
						$suc_num+=1;
					}else{
						$fas_num+=1;
					}
				}
			}
		}
		$number = $import_info['each_num'];
		$finished = 0;
		if($number && ($importnum < $number))
	    {
			$finished = 1;			
		}
		$import_info['maxid'] = $maxid;
		$this->setting($import_info);
		return $finished.'-'.$total.'-'.$suc_num.'-'.$fas_num;		
	}


	/**
	 * 更新用户模型配置文件
	 *
	 * @param array $setting
	 * @param strong $type
	 * @return true
	 */
	function setting($setting)
	{
		if(empty($setting) || !is_array($setting)) return false;
		cache_write('task_'.$setting['t_name'].'.php', $setting);
		return true;
	}

	function error($msg='操作失败！',$waitSecond='3',$jumpUrl=''){
		if(!$jumpUrl){
			$jumpUrl=$_SERVER["HTTP_REFERER"];
		}	
		include tpl('success');
		exit;
	}

}

function catstr($str)
{
	return substr($str,0,80);
}
?>