<?php 
//管理员模型
class ManageModel extends Model {
	
	private $_tables = array();	//表名
	private $_fields = array();		//字段
	
	//连接数据库
	public function __construct() {	
 		parent::__construct();	
 		$this->_tables = DB_FREFIX.'manage';
 		$this->_fields = array('id','user','pass','level','login_count','last_ip','last_time','reg_time');
	}
	
	
	//自动添加数据
	public function create() {
		foreach ($_POST as $key=>$value) {
			if (in_array($key,$this->_fields)) {
				$_addData[$key]  = $value;
			}
		}
		$_fields= array_keys($_addData);			//键名
		$_values= array_values($_addData);		//健值
		$_sql = "INSERT INTO {$this->_tables} ($_fields) VALUES ($_values)";
		return parent::add($_sql);	
	}
	
	//修改数据
	public function upCreate($_where) {
		//获取POST表单名与数据库字段名相同的部分
		foreach ($_POST as $key=>$value) {
			if (in_array($key,$this->_fields)) {
				$_addData[$key]  = $value;
			}
		}
		//组合修改语句SET
		foreach ($_addData as $k=>$v) {
			$_set [] = $k .'='."'$v'";
		}
		//组合修改语句WHERE
		foreach ($_where as $k=>$v) {
			$where [] = $k .'='. "'$v'";
		}
		$_set = implode(',', $_set);
		$where = implode(',', $where);
		
		$_sql = "UPDATE {$this->_tables} SET $_set WHERE $where";;
		return parent::update($_sql);
	}
	
	
	
	
}


?>