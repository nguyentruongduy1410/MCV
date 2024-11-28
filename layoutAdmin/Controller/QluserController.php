<?php 
    class QluserController{
        public function __construct(){
            include_once("Model/QluserModel.php");
            $qlusermodel = new QluserModel();
            $qlusermodel -> dsuser();
            include_once 'Views/qluser.php';
        }
    }
?>