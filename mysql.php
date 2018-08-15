<?php
    class Mysql{
        private $host;//服务器地址
        private $root;//用户名
        private $password;//密码
        private $database;//数据库名
         
        //后面所提到的各个方法都放在这个类里
        //...
		
		public function __construct($host,$root,$password,$database){
    $this->host = $host;
    $this->root = $root;
    $this->password = $password;
    $this->database = $database;
    $this->connect();
}


public function connect(){
    $this->conn = mysqli_connect($this->host,$this->root,$this->password,$this->database) or die("DB Connnection Error !".mysql_error());
   // mysqli_select_db($this->conn,$this->database);
    mysqli_query($this->conn,"set names utf8");
}
         
public function dbClose(){
    mysql_close($this->conn);
}

//对mysql_query()、mysql_fetch_array()、mysql_num_rows()函数进行封装
public function query($sql){
     
	 return mysqli_query($this->conn,$sql);
}
        
public function myarray($result){
    return mysqli_fetch_array($result);
}
        
public function rows($result){
    return mysqli_num_rows($result);
}

		
public function select($tableName,$condition){
    return $this->query("SELECT * FROM $tableName $condition");
}
public function selecb($tableName,$condition){
    return $this->query("SELECT count(*) FROM $tableName $condition");
}	
		
public function insert($tableName,$fields,$value){
    $this->query("INSERT INTO $tableName $fields VALUES$value");
}

public function update($tableName,$change,$condition){
    $this->query("UPDATE $tableName SET $change $condition");
}

public function delete($tableName,$condition){
    $this->query("DELETE FROM $tableName $condition");
}
}
$db = new Mysql("mysql.88.svc","dongshenyun","dongshenyun","dongshenyun");		
		
?>		
		
		
		
		
		
		
		
		
		
		
		
		
		
    
