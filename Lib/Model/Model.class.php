<?php 
//数据库连接父类，可以更换不同数据库对象
class Model {
	
	private $Db = null;						//数据库连接对象
	
	//连接数据库
	public function __construct() {
		$this->Db = Factory::setDbObj();	//数据库连接
	}
	
	
	//获取所有数据
	public  function select($_sql,$type = PDO::FETCH_OBJ) {
		return $this->Db->select($_sql);
	}
	
	
	//增加数据
	public function add($_sql) {
		return $this->Db->add($_sql);
	}
	
	
	//修改
	public function update($_sql) {
		return $this->Db->update($_sql);
	}
	
	
	//删除
	public function delete($_sql) {
		return $this->Db->delete($_sql);
	}
	
	
	//获取一条数据
	public function find($_sql) {
		return $this->Db->find($_sql);
	}
	
	
	//计算记录数
	public function row($_sql) {
		return $this->Db->row($_sql);

	}
	
	
	//执行原生SQL
	public function query($_sql) {
	
	}
	
	
	
	//事务处理
	public function open(Array $_sql) {
		return $this->Db->open($_sql);
	}
	
	

	
}


?>