<?php
class Page{
protected $number;
protected $totalcount;
protected $page;
protected $totalpage;
public $url;
//public $limit;
public function __construct($number,$totalcount)
{
$this->number=$number;
$this->totalcount=$totalcount;
$this->totalpage=$this->gettotalpage();
$this->page=$this->getpage();
$this->url=$this->geturl();	

//$this->limit=$this->limit();
}	
public function gettotalpage()
{
return ceil($this->totalcount/$this->number);	
}	
protected function getpage()
{
	if(empty($_GET['page'])){
$page=1;	
}else if($_GET['page']>$this->totalpage){
$page=$this->totalpage;	
	
}else if($_GET['page']<1){
	$page=1;
	}	
else{
	$page=$_GET['page'];
}
return $page;
}
public function geturl()
{
$schema=$_SERVER['REQUEST_SCHEME'];
$host=$_SERVER['SERVER_NAME'];
$port=$_SERVER['SERVER_PORT'];
$url=$_SERVER['REQUEST_URI'];
$urlarray=parse_url($url);
//var_dump($urlarray);
$path=$urlarray['path'];	
if(!empty($urlarray['query'])){
parse_str($urlarray['query'],$array);
unset($array['page']);
$query=http_build_query($array);
if($query!=''){
	$path=$path.'?'.$query;
	
}
//return $schema.'://'.$host.':'.$port.$path;	
return $path;
}	
}
protected function seturl($str)
{
	if(strstr($this->url,'?')){
		$url=$this->url.'&'.$str;
	}else{
	
$url=$this->url.'?'.$str;
	
}	
return $url;
}



public function first()
{
	$first="<a href='{$this->seturl('page=1')}'>&#39318;&#39029;</a>";
return $first;
	
	
}
public function midden()
{
	
for ($i>=1;$i<=$this->totalpage;$i++) {  //&#24490;&#29615;&#26174;&#31034;&#20986;&#39029;&#38754;

//echo "<a href='feny.php?page={$i}'>{$i}</a>";
echo "<a href='{$this->seturl('page='.$i)}'>{$i}</a>";

}
}	

public function middens()
{
$init=1; 
$page_len=9; 
//$max_p=$this->totalpage; 
$pages=$this->totalpage;	
$page_len = ($page_len%2)?$page_len:$pagelen+1;//&#39029;&#30721;&#20010;&#25968; 
$pageoffset = ($page_len-1)/2;//&#39029;&#30721;&#20010;&#25968;&#24038;&#21491;&#20559;&#31227;&#37327; 
if($pages>$page_len){ 
//&#22914;&#26524;&#24403;&#21069;&#39029;&#23567;&#20110;&#31561;&#20110;&#24038;&#20559;&#31227; 
if($this->page<=$pageoffset){ 
$init=1; 
$max_p = $page_len; 
}else{//&#22914;&#26524;&#24403;&#21069;&#39029;&#22823;&#20110;&#24038;&#20559;&#31227; 
//&#22914;&#26524;&#24403;&#21069;&#39029;&#30721;&#21491;&#20559;&#31227;&#36229;&#20986;&#26368;&#22823;&#20998;&#39029;&#25968; 
if($this->page+$pageoffset>=$pages+1){ 
$init = $pages-$page_len+1; 
}else{ 
//&#24038;&#21491;&#20559;&#31227;&#37117;&#23384;&#22312;&#26102;&#30340;&#35745;&#31639; 
$init = $this->page-$pageoffset; 
$max_p = $this->page+$pageoffset; 
} 
} 
} 
for($i=$init;$i<=$max_p;$i++){ 
if($i==$this->page){ 
echo '<span>'.$i.'</span>'; 
} else { 
//echo " <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";
echo "<a href='{$this->seturl('page='.$i)}'>{$i}</a>";
} 
} 	
}

public function tiao()
{
	echo "<form action='' method='get'>
          <input name='page' type='text' size='5' style='width:30px;'>
          <input type='submit' name='Submit' value='&#36339;&#36716;'>
          </form>";
}
public function next()
{
	if($this->page+1>$this->totalpage)
	{$page=$this->totalpage;}
else{$page=$this->page+1;}
$next="<a href='{$this->seturl('page='.$page)}'>&#19979;&#19968;&#39029;</a>";
	return $next;
	
}
public function prev()
{
if($this->page-1<1){$page=1;}
else{$page=$this->page-1;}
$prev="<a href='{$this->seturl('page='.$page)}'>&#19978;&#19968;&#39029;</a>";
return $prev;	
	
}
public function end()
{
	$end="<a href='{$this->seturl('page='.$this->totalpage)}'>&#26410;&#39029;</a>";
	return $end;
	
	
}

public function all()
{
echo "<center>&#24635;&#39029;&#25968;:{$this->page}/{$this->totalpage}";
echo $this->first();	
echo $this->prev();
echo $this->middens();
echo $this->next();	
echo "{$this->end()}</center>";
	
}

public function alla()
{
echo "<center>&#24635;&#39029;&#25968;:{$this->page}/{$this->totalpage}";
echo $this->first();	
echo $this->prev();
echo $this->middens();
echo $this->next();	
echo $this->end();
echo "{$this->tiao()}</center>";	
}




public function limit(){
	
	$offset=($this->page-1)*$this->number;
	return $offset.','.$this->number;
	}
}
//$page=new Page($page->number,$page->totalCount);

//$show=new page(5,20);
//echo $show->geturl();
?>
