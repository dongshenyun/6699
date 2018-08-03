<?php
//转换日期至unix时间戳
function unixtime($date){
	$t=split(" ",$date);
	$d=split('/',$t['0']);
	//$d=split('-',$date);
	$h=split(':',$t['2']);
	//return $b=mktime($h['0'],$h['1'],$h['2'],$d['1'],$d['2'],$d['0']);
	return $b=mktime(0,0,0,$d['1'],$d['2'],$d['0']);
}
function contentid($id){
	return $id+24174;
}
function conurl($data){
	$urls=explode('#', $data);
	$url='';
	foreach($urls as $v){
		$url.=preg_replace('/(.*)\$/','', $v)."\n";
	}
	return $url;
}
function maxtopp($data){
	$urls=explode('$$',$data);
	$url='';
	$urlArr=explode('#',$urls[1]);
	foreach($urlArr as $v){
		$arr=explode('$',$v);
		$url.=$arr[1]."\n";
	}
	return $url;
	
}
function vod_play($data){
	$arr=explode('#',$data);
	$arr2=explode('|$',$arr[1]);
	return $arr2[1];
}
//判断是否为IP
function is_ip($str){  
   $ip = explode(".",$str);
   for($i=0;$i<count($ip);$i++){
       if($ip[$i]>255){  return (0);  }
   }
   return ereg("^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$",$str);
} 
function cut_ip($str){
	$isip=is_ip($str);
	if($isip){
		$expIP = explode(".",$str);
		return $author = $expIP[0].".".$expIP[1].".".$expIP[2].".*";
	}
	return replace_num($str);
}
function xgcat_setting($name){
	return "array (
  'workflowid' => '',
  'ishtml' => '0',
  'content_ishtml' => '0',
  'create_to_html_root' => '0',
  'template_list' => 'default',
  'category_template' => 'category',
  'list_template' => 'list',
  'show_template' => 'show',
  'meta_title' => '',
  'meta_keywords' => '',
  'meta_description' => '',
  'presentpoint' => '1',
  'defaultchargepoint' => '0',
  'paytype' => '0',
  'repeatchargedays' => '1',
  'category_ruleid' => '6',
  'show_ruleid' => '16',
  'play_ishtml' => '0',
  'play_ruleid' => '31',
)";
}
function replace_num($str){
	$num=array('1','2','3','4','5','6','7','二','三','四','五','六','七','九');
	$rp_num=array('y','e','s','x','w','l','q','y','e','s','x','w','l','q');
	return str_replace($num,$rp_num,$str);
}
function pid($id){
	return $id+28844;
}
?>