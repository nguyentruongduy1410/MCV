<?php 
    class QlbaivietController{
        public function __construct(){
            include_once("Model/QlbaivietModel.php");
            $qlbaivietmodel = new QlbaivietModel();
            $qlbaivietmodel -> dsbv();
            include_once 'Views/qlbaiviet.php';

       
        }
    }
?>