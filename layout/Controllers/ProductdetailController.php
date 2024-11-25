<?php
    class ProductdetailController{
        public function __construct($id){
            include_once 'Models/ProductdetailModel.php';
            $productdetailmodel = new ProductdetailModel();
            $productdetailmodel -> ctha($id);
            include_once './Views/productdetails.php';
        }
    }
?>