<?php 
//数据验证类
class Validate {
	
	/**
	 * 	判断是否为post提交
	 * @$value  post提交的值
	 * return 布尔值
	*/
	static public function isPost($value) {
		//是post提交 ，并且post值存在，或者post值不为空
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && sizeof($value) && !empty($value)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 判断是否是数组
	 */
	static public function isArray($_array) {
		return is_array($_array) ? true : false;
	}
	
	/**
	 * 判断数组是否为空
	 */
	static public function isNull ($_array) {
		return count($_array) == false ? true : false;
	}
	
	/**
	 * 判断字符串是否为空
	 */
	static public function isNullString($_str) {
		return empty($_str) ? true : false;
	}
	
	
	//判断字符串长度是否合法
	static public function checkStrLength($_string, $_length, $_flag, $_charset = 'utf-8') {
		if ($_flag == 'min') {
			if (mb_strlen(trim($_string), $_charset) < $_length) return true;
			return false;
		} elseif ($_flag == 'max') {
			if (mb_strlen(trim($_string), $_charset) > $_length) return true;
			return false;
		} elseif ($_flag == 'equals') {
			if (mb_strlen(trim($_string), $_charset) != $_length) return true;
			return false;
		}
	}
	
	//判断数据是否一致
	static public function checkStrEquals($_string, $_otherstring) {
		if (trim($_string) == trim($_otherstring)) return true;
		return false;
	}
	
	
}



?>