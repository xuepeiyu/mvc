<?php 
namespace app\ctrl;
class indexCtrl  extends \core\run
   {

       public function index()
       {
             //P("this is index");
             // $model = new \core\lib\model();
             // $sql="select * from user";
             // $arr=$model->query($sql);
             // p($arr->fetchAll());die;
          //$temp=\core\lib\conf::get('CTRL','route');
          //$temp=\core\lib\conf::get('ACTION','route');
          //$temp = new \core\lib\model();
           
          //print_r($temp);
           $data = "hello world";
           $this->assign("data",$data);
           $this->display('index.html');
       }

  }

?>