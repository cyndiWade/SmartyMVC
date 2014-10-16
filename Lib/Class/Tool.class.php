<?php 

class Tool {
	
	/**
	 * 获取客户端IP地址
	 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
	 * @return string
	 */
	static public function getIp($type = 0) {
		$type       =  $type ? 1 : 0;
		static $ip  =   NULL;
		if ($ip !== NULL) return $ip[$type];
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			$pos    =   array_search('unknown',$arr);
			if(false !== $pos) unset($arr[$pos]);
			$ip     =   trim($arr[0]);
		}elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip     =   $_SERVER['HTTP_CLIENT_IP'];
		}elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$ip     =   $_SERVER['REMOTE_ADDR'];
		}
		// IP地址合法验证
		$long = sprintf("%u",ip2long($ip));
		$ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
		return $ip[$type];
	}
	
	/**
	 * 获取当前时间
	 * @return string
	 */
	static public function getDate() {
		date_default_timezone_set('Asia/Shanghai');
		return date('Y-m-d H:i:s');
	}
	
	/**
	 * 开启表单转义，防止SQL注入
	 */
	static public function setFormString($_data) {
		if (!get_magic_quotes_gpc()) {
			if (is_array($_data)) {
				foreach ($_data as $key=>$value) {
					$_data[$key] = self::setFormString($value);
				}
			} else {
				$_data = addslashes($_data);
			}
		}
		return $_data;
	}

	
	//获取上一页地址
	static public function getPrevPage() {
		return $_SERVER['HTTP_REFERER'];
	}
	
	
	
	
	
	
}
?>