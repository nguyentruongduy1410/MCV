<?php 
    class QldonhangController{
        public function __construct(){
            include_once("Model/QldonhangModel.php");
            $qldonhangmodel = new QldonhangModel();
            // $danhmucmodel -> dssp;
        }
    }
?>