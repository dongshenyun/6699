<?php
function new_stripslashes($string)
{
	if(!is_array($string)) return stripslashes($string);
	foreach($string as $key => $val) $string[$key] = new_stripslashes($val);
	return $string;
}
function tpl($file = 'index')
{
	return 'skins/templates/'.$file.'.tpl.php';
}
function str_charset($in_charset, $out_charset, $str_or_arr)
{
	if(is_array($str_or_arr))
	{
		foreach($str_or_arr as $k=>$v)
		{
			$str_or_arr[$k] = str_charset($in_charset, $out_charset, $v);
		}
	}
	else
	{
		$str_or_arr = iconv($in_charset, $out_charset, $str_or_arr);
	}
	return $str_or_arr;
}
//缓存文件写入、读取、删除
function cache_read($file, $path = '', $iscachevar = 0)
{
	if(!$path) $path = DATA_PATH;
	$cachefile = $path.$file;
	if($iscachevar)
	{
		global $TEMP;
		$key = 'cache_'.substr($file, 0, -4);
		return isset($TEMP[$key]) ? $TEMP[$key] : $TEMP[$key] = @include $cachefile;
	}
	return @include $cachefile;
}
function cache_write($file, $array, $path = '')
{
	if(!is_array($array)) return false;
	$array = "<?php\nreturn ".var_export($array, true).";\n?>";
	$cachefile = ($path ? $path : DATA_PATH).$file;
	$strlen = file_put_contents($cachefile, $array);
	@chmod($cachefile, 0777);
	return $strlen;
}

function cache_delete($file, $path = '')
{
	$cachefile = ($path ? $path : DATA_PATH).$file;
	return @unlink($cachefile);
}
function new_addslashes($string)
{
	if(!is_array($string)) return addslashes($string);
	foreach($string as $key => $val) $string[$key] = new_addslashes($val);
	return $string;
}
function sizecount($filesize)
{
	if($filesize >= 1073741824)
	{
		$filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
	}
	elseif($filesize >= 1048576)
	{
		$filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
	}
	elseif($filesize >= 1024)
	{
		$filesize = round($filesize / 1024 * 100) / 100 . ' KB';
	}
	else
	{
		$filesize = $filesize . ' Bytes';
	}
	return $filesize;
}
function fileext($filename)
{
	return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}
function success($msg='操作成功！',$waitSecond='3',$jumpUrl=''){
		if(!$jumpUrl){
			$jumpUrl=$_SERVER["HTTP_REFERER"];
		}	
		$status='success';
		include tpl('success');
		exit;
}
function error($msg='操作失败！',$waitSecond='3',$jumpUrl=''){
		if(!$jumpUrl){
			$jumpUrl=$_SERVER["HTTP_REFERER"];
		}	
		$status='error';
		include tpl('success');
		exit;
}
function file_down($filepath, $filename = '')
{
	if(!$filename) $filename = basename($filepath);
	if(is_ie()) $filename = rawurlencode($filename);
	$filetype = fileext($filename);
	$filesize = sprintf("%u", filesize($filepath));
	if(ob_get_length() !== false) @ob_end_clean();
	header('Pragma: public');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: pre-check=0, post-check=0, max-age=0');
	header('Content-Transfer-Encoding: binary');
	header('Content-Encoding: none');
	header('Content-type: '.$filetype);
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header('Content-length: '.$filesize);
	readfile($filepath);
	exit;
}
function is_ie()
{
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if((strpos($useragent, 'opera') !== false) || (strpos($useragent, 'konqueror') !== false)) return false;
	if(strpos($useragent, 'msie ') !== false) return true;
	return false;
}
function get_dblist(){
     $files = glob('data/db_*.php');
	 $db_list = array();
	 if(is_array($files))
	 {
		foreach($files as $f)
		{
			$db_list[] = include($f);
		}
	 }
	 return $db_list;
}
function set_config($config)
{
	if(!is_array($config)) return FALSE;
	$configfile = 'inc/config.inc.php';
	if(!is_writable($configfile)) error('请将 ./inc/config.inc.php 的属性设为 0777 !');
	$pattern = $replacement = array();
	foreach($config as $k=>$v)
	{
		$pattern[$k] = "/define\(\s*['\"]".strtoupper($k)."['\"]\s*,\s*([']?)[^']*([']?)\s*\)/is";
        $replacement[$k] = "define('".$k."', \${1}".$v."\${2})";
	}
	$str = file_get_contents($configfile);
	$str = preg_replace($pattern, $replacement, $str);
	return file_put_contents($configfile, $str);
}
require 'function.php';
?>