<?php 
//系统函数库

/**
 * 获取和设置配置参数 支持批量定义
 * @param string|array $name 配置变量
 * @param mixed $value 配置值
 * @return mixed
 */
function C($name=null, $value=null) {
	static $_config = array();
	// 无参数时获取所有
	if (empty($name)) {
		if(!empty($value) && $array = S('c_'.$value)) {
			$_config = array_merge($_config, array_change_key_case($array));
		}
		return $_config;
	}
	// 优先执行设置获取或赋值
	if (is_string($name)) {
		if (!strpos($name, '.')) {
			$name = strtolower($name);
			if (is_null($value))
				return isset($_config[$name]) ? $_config[$name] : null;
			$_config[$name] = $value;
			return;
		}
		// 二维数组设置和获取支持
		$name = explode('.', $name);
		$name[0]   =  strtolower($name[0]);
		if (is_null($value))
			return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
		$_config[$name[0]][$name[1]] = $value;
		return;
	}
	// 批量设置
	if (is_array($name)){
		$_config = array_merge($_config, array_change_key_case($name));
		if(!empty($value)) {// 保存配置值
			S('c_'.$value,$_config);
		}
		return;
	}
	return null; // 避免非法参数
}


/**
 *	代码输出，详细信息
 * @param mixed $var 变量
 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
 * @param string $label 标签 默认为空
 * @param boolean $strict 是否严谨 默认为true
 * @return void|string
 */
function dump($var, $echo=true, $label=null, $strict=true) {
	$label = ($label === null) ? '' : rtrim($label) . ' ';
	if (!$strict) {
		if (ini_get('html_errors')) {
			$output = print_r($var, true);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		} else {
			$output = $label . print_r($var, true);
		}
	} else {
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		if (!extension_loaded('xdebug')) {
			$output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		}
	}
	if ($echo) {
		echo($output);
		return null;
	}else
		return $output;
}

?>