<?php 
//适配器模式、与单列模式	。调用引入Smarty类库
class SmartyTpl extends Smarty {
	//static private $_instance;			//存放本类对象	
	
	//外部获取SmartyTpl模板对象,单例模式
// 	static public function getInstance () {
// 		if (!self::$_instance instanceof self) {	//如果对象不是本类的实例
// 			self::$_instance = new self();			//实例本对象，也可以这样写new TPL();
// 		}
// 		return self::$_instance;				//返回对象
// 	}

	//构造方法
	public function __construct () {
		parent::__construct();		//调用Smarty模板类构造方法
		$this->setConfigs();			//设置配置文件
	}
	
	
	//Smarty配置信息
	private function setConfigs() {
		$this->config_dir = ROOT_PATH.'/Conf/';					//smarty配置文件
		$this->template_dir = ROOT_PATH.'/Tpl/';				//模板目录
		$this->compile_dir = ROOT_PATH.'/Templates_c/';	//编译目录
		
		/* 缓存设置
		 * @ 0 关闭缓存
		* @ 1 模板修改后，生命周期结束后，重新生成缓存
		* @ 2 不常用
		*/
		$this->cache_dir = ROOT_PATH.'/Cache/';				//缓存目录
		$this->caching = 0;
		$this->cache_lifetime = 60*60*24; //缓存的生命周期(秒数)
		
		//设计模板定界符
		$this->left_delimiter = '{';
		$this->right_delimiter = '}';
	}
}


?>