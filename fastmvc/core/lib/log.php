<?php 
namespace core\lib;
use core\lib\conf;
class log
{
	static $class;
  static public function init(){
  	$drive = conf::get("DRIVE",'log');
  	$class = '\core\lib\drive\log\\'.$drive;
  	//p($class);die;
  	self::$class = new $class;
  }
  static public function log($name,$file="log")
  {	
  		self::$class->log($name,$file);
  }	

}



 ?>