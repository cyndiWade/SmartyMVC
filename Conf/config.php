<?php
//定义编码
header('Content-Type:text/html;charset=utf-8');

//系统配置文件
error_reporting(E_ALL);	//错误类别

//开启session
session_start();

//设置亚洲时间
date_default_timezone_set('Asia/Shanghai');

//数据库配置
define('DB_DNS','mysql:host=127.0.01;dbname=shopp;charset=UTF8');
define('DB_CHARSET','SET NAMES UTF8');
define('DB_USER','root');
define('DB_PASS','514591');
define('DB_FREFIX', 'mall_');	//表前缀


//控制器默认类，及默认方法
define('ACTION','Index');
define('METHOD','index');



?>