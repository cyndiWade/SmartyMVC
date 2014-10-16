<?php
//后台用户控制页面
class AdminAction extends Action {
	
	public function index () {
		$this->assign('a', '123123');
		$this->display();
	}
	
	public function delete() {
		$this->assign('a', '12313');
		$this->display();
	}
	
	
	
	
	
}

?>