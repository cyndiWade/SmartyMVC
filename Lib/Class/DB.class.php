<?php
//数据库连接
class DB {	
 	static private $PDO = null; //PDO数据库对象
	
// 	//获取对象
// 	static protected  function getInstance () {
// 		if (!self::$PDO instanceof self) {
// 			self::$PDO = new self();//执行本类的构造方法
// 		}
// 		return self::$PDO;	//数据库连接对象	
// 	}
	
	//数据库连接对象
	public function __construct () {
		try {
			$pdoConfig = array (PDO::MYSQL_ATTR_INIT_COMMAND=>DB_CHARSET);
			$this->PDO = new PDO(DB_DNS, DB_USER,DB_PASS);
			//设置异常报错模式
			$this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			exit ($e->getMessage());
		}	
	}
	
	
	//获取所有数据
	public  function select($_sql,$type = PDO::FETCH_OBJ) {
		/*
		 * 1)PDO::FETCH_NUM  数字数组
 		*	2)PDO::FETCH_ASSOC  关联数组
		 * 	3)PDO::FETCH_OBJ  	对象关联数组
		 */
		$_stmt = $this->PDO->prepare($_sql);		//准备语句
		$_stmt->execute();									//执行SQL
		return $list = $_stmt->fetchAll($type);		//解析结果集
	}
	
	
	//增加数据
	public function add($_sql) {
		$_stmt = $this->PDO->prepare($_sql);		//准备语句SQL
		$_stmt->execute();									//执行SQL
		return $this->PDO->lastInsertId();				//返回新增记录的id *
	}
	
	
	//修改
	public function update($_sql) {
		$_stmt =  $this->PDO->prepare($_sql);		//准备语句SQL
		$_stmt->execute();										//执行SQL	
		return $_stmt->rowCount();							//影响行数
	}
	
	
	//删除
	public function delete($_sql) {
		$_stmt = $this->PDO->prepare($_sql);		//准备语句SQL
		$_stmt->execute();							//执行SQL
		return $_stmt->rowCount();				//影响行数
	}
	
	
	//获取一条数据
	public function find($_sql) {
		$_stmt = $this->PDO->query($_sql);		//准备语句SQL
		return $_stmt->fetch();
	}
	
	
	//计算记录数
	public function row($_sql) {
		$_stmt = $this->PDO->query($_sql);		//准备语句SQL
		return $_stmt->rowcount();						//返回结果记录数
	}
	
	
	//执行原生SQL
	public function query($_sql) {
	
	}
		
	
	
	//事务处理
	public function open(Array $_sql) {
		try {
			$this->PDO->beginTransaction();	//开启事务处理
			//
			foreach ($_sql as $value) {
				$this->PDO->prepare($value)->execute();
			}
			return $this->PDO->commit();				//提交
		} catch (PDOException $e) {
			$e->getMessage();
			$this->PDO->rollBack();			//回滚
		}
	}
	
	
}



?>