<?php 
    class DanhmucController{
        public function __construct(){
            include_once("Model/DanhmucModel.php");
            $danhmucmodel = new DanhmucModel();
            $danhmucmodel -> dsdm();
            include_once 'Views/danhmuc.php';
        }
    }
?>