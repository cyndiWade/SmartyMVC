<?php 
//前台页面
class IndexAction extends Action{
	

	public function index () {
		//用户自动验证数据
		$Manage = new ManageModel();
		$Model = new Model();
		$content = $Model->select("select * from mall_manage");
		
		$this->assign('content',$content);
		$this->display();
	}

	public function delete() {
		$this->assign('a', 'delete');
		$this->display();
	}
	
}

?>