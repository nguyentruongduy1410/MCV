<?php
    class CartController{
        public function __construct(){
            include_once 'Models/CartModel.php';
            $cartmodel = new CartModel();
        }
    }
?>