<?php
//数据库配置信息
define('DB_HOST', 'localhost'); //数据库服务器主机地址
define('DB_USER', 'root'); //数据库帐号
define('DB_PW', 'root'); //数据库密码
define('DB_NAME', 'uuu'); //数据库名
define('DB_CHARSET', 'utf8'); //数据库字符集
define('DB_PCONNECT', 0); //0 或1，是否使用持久连接
define('DB_DATABASE', 'mysql'); //数据库类型
define('ADMIN_NAME','admin');//管理员用户名
define('ADMIN_PASSWORD','e10adc3949ba59abbe56e057f20f883e');//管理员密码,请输入将密码经过MD5加密后的密匙；

//程序相关
define('MC_VERSION','1.0');
define('DATA_PATH','data/');
define('MC_ROOT', str_replace("\\", '/', dirname(__FILE__)).'/');
?>