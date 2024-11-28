<?php 
    class QldonhangController{
        public function __construct(){
            include_once("Model/QldonhangModel.php");
            $qldonhangmodel = new QldonhangModel();
            $qldonhangmodel -> dsdh();
            include_once 'Views/qldonhang.php';
            // $danhmucmodel -> dssp;
        }
    }
?>