<?php 
//控制器父类
abstract class Action {
	protected $_tpl;	//框架对象
	private $_m;			//当前运行方法名 
	
	abstract public function index() ;		//必须有个index方法
	
	public function __construct() {
		//Smarty模板对象
		$this->_tpl = Factory::setSmartyObj();
		
		$this->getM();	//执行方法			
	}

	//根据参数执行不同方法
	private function getM() {
		//判断执行方法
		$this->_m = isset($_GET['m']) ? $_GET['m'] : METHOD;
		//判断类中是否存在一个方法，有则执行此方法，没有则执行默认index方法
		method_exists($this, $this->_m) ? eval('$this->'.$this->_m.'();') : $this->index();
	}
	
	//执行模板方法
	protected function assign($name,$val) {
		$this->_tpl->assign($name,$val);
	}
	
	//执行模板方法
	protected function display($url = '') {
		if (empty($url)) {
			$url = substr(get_class($this),0,-6).'/'.$this->_m.'.tpl';
		}
		$this->_tpl->display($url);
	}
	
	
}


?>