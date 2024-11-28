<?php 
    class QlbinhluanController{
        public function __construct(){
            include_once("Model/QlbinhluanModel.php");
            $qlbinhluanmodel = new QlbinhluanModel();
            $qlbinhluanmodel -> dsbl();
            include_once 'Views/qlbinhluan.php';

        }
    }
?>