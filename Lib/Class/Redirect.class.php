<?php
//跳转类
class Redirect {
	//用于存放实例化的对象
	static private $_instance = null;
	
	//公共静态方法获取实例化的对象
	static public function getInstance(&$_tpl) {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
			self::$_instance->_tpl = $_tpl;
		}
		return self::$_instance;
	}
	
	//私有克隆
	private function __clone() {}
	
	//私有构造
	private function __construct() {}
	
	//成功跳转
	public function succ($_url, $_info) {
		$this->_tpl->assign('message', $_info);
		$this->_tpl->assign('url', $_url);
		$this->_tpl->display(SMARTY_ADMIN.'public/succ.tpl');
		exit();
	}
	
	//失败返回
	public function error($_info) {
		$this->_tpl->assign('message', $_info);
		$this->_tpl->assign('prev', Tool::getPrevPage());
		$this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
		exit();
	}
	
	/**
	 * URL重定向
	 * @param string $url 重定向的URL地址
	 * @param integer $time 重定向的等待时间（秒）
	 * @param string $msg 重定向前的提示信息
	 * @return void
	 */
	public function redirect($url, $time=0, $msg='') {
		//多行URL地址支持
		$url        = str_replace(array("\n", "\r"), '', $url);
		if (empty($msg))
			$msg    = "系统将在{$time}秒之后自动跳转到{$url}！";
		if (!headers_sent()) {
			// redirect
			if (0 === $time) {
				header('Location: ' . $url);
			} else {
				header("refresh:{$time};url={$url}");
				echo($msg);
			}
			exit();
		} else {
			$str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
			if ($time != 0)
				$str .= $msg;
			exit($str);
		}
	}
	
}
?>