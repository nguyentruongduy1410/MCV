<?php 
    class QlvoucherController{
        public function __construct(){
            include_once("Model/QlvoucherModel.php");
            $qlvouchermodel = new QlvoucherModel();
            // $danhmucmodel -> dssp;
        }
    }
?>