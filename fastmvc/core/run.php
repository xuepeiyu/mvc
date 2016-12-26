<?php 
namespace core;
class run
{
    public static $classMap = array();
	static public function dump()
	{
       //p('ok');
       $route = new \core\lib\route();
       p($route);
       $ctrlClass = $route->ctrl;
       $action = $route->action;
       $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
       $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';                                                                    
       p($ctrlClass);die;
       if(is_file($ctrlfile)){

              include $ctrlfile;
              $ctrl=new $cltrlClass();
              $ctrl->$action();

       }else{

           throw new \Exception('找不到控制器'.$ctrlClass);
       }
	}

	
	static public function load($class)
	{	
       //自动加载类库
		if(isset($classMap[$class])){
			return true;
		}else{
		$class = str_replace('\\', '/', $class);
		$file = FASTMVC.'/'.$class.'.php';
		//p($file);
		if(is_file($file)){
			include  $file;
			self::$classMap[$class] = $class;
		}else{
			return  false;
		}
	 }
	}
}


 ?>