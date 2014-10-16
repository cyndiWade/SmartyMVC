<?php 
//工厂类,实例各种对象，单例模式
class Factory {
	
	static private $obj = null;	//存放对象	
	
	//获取控制器名
	static public function getActionName() {
		return isset($_GET['a']) && !empty($_GET['a']) ? $_GET['a'] : ACTION;	//控制器类名
	}
	
	//生成控制器对象
	static public function RUN () {
		$ActionName = self::getActionName();
		//验证类文件是否存在
		if (!file_exists(ROOT_PATH.'/Lib/Action/'.$ActionName.'Action.class.php')) {
			eval('self::$obj = new '.ACTION.'Action();');						//默认控制器类
		} else {
			//实例类
			eval('self::$obj = new '.ucfirst($ActionName).'Action();');	//根据不同参数，实例不同类
		}
		return self::$obj;																	//返回控制器对象
	}

	
	//生成Smarty模板对象
	static public function setSmartyObj () {
		if (!self::$obj instanceof SmartyTpl) {	//如果对象不是本类的实例
			self::$obj = new SmartyTpl();			
		}
		return self::$obj;								
	}
	
	
	//生成Db数据库连接对象
	static public function setDbObj () {
		if (!self::$obj instanceof DB) {
			self::$obj = new DB();//执行本类的构造方法
		}
		return self::$obj;	//数据库连接对象
	}
	
	
	
	
	
	
}

?>