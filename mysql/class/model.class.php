<?php
class model {
	public function __construct(){
		header("Content-Type:text/html; charset=utf-8");
	}
	public function run(){
		global $a,$m;
		$newm=$m.'Model';
		require_once $newm.'.class.php';
		$model=new $newm;
		$model->$a();
	}	
	public function error($msg='操作失败！',$waitSecond='3',$jumpUrl=''){
		if(!$jumpUrl){
			$jumpUrl=$_SERVER["HTTP_REFERER"];
		}	
		$status='error';
		include tpl('success');
		exit;
	}
	public function success($msg='操作成功！',$waitSecond='3',$jumpUrl=''){
		if(!$jumpUrl){
			$jumpUrl=$_SERVER["HTTP_REFERER"];
		}	
		$status='success';
		include tpl('success');
		exit;
	}
}
?>