<?php
class indexModel extends model{
	public function __construct(){
		header("Content-Type:text/html; charset=utf-8");
	}
	public function login(){
		global $submit,$username,$password;
		if($submit){
			if(md5($password)==ADMIN_PASSWORD&&$username==ADMIN_NAME){
				$_SESSION['admin']='1';
				success('登录成功！','3','?m=index');
			}else{
				error('用户名或者密码错误！');
			}
		}else{
			include tpl('login');
		}
	}
	public function logout(){
		if($_SESSION['admin']){
			unset($_SESSION['admin']);
			success('退出成功！','3','?a=login');
		}else{
			error('已经退出！','3','?a=login');
		}
	}
	public function index(){
		global $name;
	    $files = glob('data/db_*.php');
	    $db_list = array();
		if(is_array($files))
		{
			foreach($files as $f)
			{
				$db_list[] = include($f);
			}
		}
		if(isset($name)){
			$file='db_'.$name.'.php';
		    $setting=cache_read($file);
		    extract($setting);
		}
		include tpl('index');
	}
	//添加链接库
	public function add_db(){
		global $setting;
		if(empty($setting['name']))
		{
			$this->error('请填写配置名称！');
		}
		$name='db_'.$setting['name'].'.php';
		cache_write($name,$setting,'data/');
		$this->success('数据导入配置保存成功！','1','?m=index');

	}
	//删除链接库
	public function del_db(){
		global $name;
	    if(empty($name))
		{
			$this->error('请选择需要删除的链接库！');
		}
		$file='db_'.$name.'.php';
		cache_delete($file,'data/');
		$this->success('链接库删除成功！');
	}
	public function test(){
		global $dbtype, $dbhost, $dbuser, $dbpw, $dbname;
		if(!class_exists('import')){
	       require 'class/import.class.php';
        }
        $import = new import();
        $r = $import->connect_db($dbtype, $dbhost, $dbuser, $dbpw, $dbname);
		if ($r) {
			echo 'ok';
		}else{
			echo 'error';
		}
	}
}
?>