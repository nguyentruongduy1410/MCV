<?php
    class ProductdetailController{
        public function __construct(){
            include_once 'Models/ProductdetailModel.php';
            $productdetailmodel = new ProductdetailModel();
        }
    }
?>