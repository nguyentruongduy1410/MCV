<?php
 class SanphamController{
   public function __construct() {
      include_once('Model/SanphamModel.php');
       $sanphamModel = new SanphamModel();
       $sanphamModel -> dssp();
       include_once('Views/sanpham.php');
    }
 }







?>