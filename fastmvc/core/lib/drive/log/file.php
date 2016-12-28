<?php 
namespace core\lib\drive\log;
use core\lib\conf;

class file
{    
   
      public $path;
      public function __construct(){

         $conf = conf::get('OPTION','log');
          $this->path = $conf['PATH'];
      }
   
       //默认等于log
    public function log($message,$file ='log')
    {  
      //p($this->path);die;
        /**
         * 1.确定文件的存储位置是否存在如果不存在就创建一个
         * 2.写入日志
         */

        if(!is_dir($this->path)){
            //创建文件和文件权限
            mkdir($this->path,"0777",true);
        }
        $message = date('Y-m-d H:i:s').$message;
        // p($message);exit;
        //p($this->path.$file.'.php');
        //写入日志拼接我们日志存放的位置
        return file_put_contents($this->path.$file.'.php',json_encode($message).PHP_EOL,FILE_APPEND);
    }

}