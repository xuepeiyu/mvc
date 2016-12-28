<?php 
namespace core;
class run
{
    public static $classMap = array();
    public  $assign;
	static public function dump()
	{

       \core\lib\log::init();
       \core\lib\log::log('test');

       //p('ok');
       $route = new \core\lib\route();
       //p($route);
       $ctrlClass = $route->ctrl;  //控制器
       $action = $route->action;   //方法名
       $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
       $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';                                                                    
       //p($cltrlClass);die;

       if(is_file($ctrlfile)){

              include $ctrlfile;
              $ctrl = new $cltrlClass();
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
  //视图的赋值方法
  public function  assign($name,$value){
       $this->assign[$name] = $value;
  }

  //调用视图方法
  public  function display($file){
          $file = APP.'/views/'.$file;
          //p($this->assign);exit();
          if(is_file($file)){
              extract($this->assign);
             include $file;
          }
  }


}


 ?>