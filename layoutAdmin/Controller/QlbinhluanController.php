<?php 
    class QlbinhluanController{
        public function __construct(){
            include_once("Model/QlbinhluanModel.php");
            $qlbinhluanmodel = new QlbinhluanModel();
            // $danhmucmodel -> dssp;
        }
    }
?>