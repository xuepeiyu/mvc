<?php 
   namespace app\ctrl;
   class indexCtrl 
   {

       public function index()
       {
             $model = new \core\lib\model();
             $sql="select * from user";
             $arr=$model->query($sql);
             p($arr->fetchAll());
           
       }
   }

?>