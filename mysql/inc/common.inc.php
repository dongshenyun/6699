<?php
session_start();
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
require 'config.inc.php';
define('IN_MC',true);
define('CLASS_PATH','class/');
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
require 'common.func.php';
if($_REQUEST)
{
	if(!MAGIC_QUOTES_GPC)
	{
		$_REQUEST = new_addslashes($_REQUEST);
		if($_COOKIE) $_COOKIE = new_addslashes($_COOKIE);
	}
	extract($_REQUEST, EXTR_SKIP);
}
$m=isset($m)?$m:'index';
$a=isset($a)?$a:'index';
if(!$_SESSION['admin']&&$a!=='login'){
	error('你还没有登录或者登录超时！','3','?a=login');
}
?>