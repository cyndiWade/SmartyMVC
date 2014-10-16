<?php 	//系统类库执行文件
//本系统MVC构架

require ROOT_PATH.'/Conf/config.php';							//配置文件
require ROOT_PATH.'/Common/common.php';					//系统函数库
require ROOT_PATH.'/Smarty/libs/Smarty.class.php';		//smarty模板类

//自动加载类库
spl_autoload_register('__autoload');		//其他系统出现同样的__autoload函数时，则进行绑定，兼容
function __autoload($_className) {
	if (substr($_className,-6) == 'Action') {
		require ROOT_PATH.'/Lib/Action/'.$_className.'.class.php';	//控制器
	} else if (substr($_className,-5) == 'Model') {
		require ROOT_PATH.'/Lib/Model/'.$_className.'.class.php';//模型类
	} else {
		require ROOT_PATH.'/Lib/Class/'.$_className.'.class.php';//其他系统类扩展
	}
}
//print_r(get_included_files() );//返回被引用的文件

//生成对象
Factory::RUN();	//根据URL生成不同的控制器对象

?>