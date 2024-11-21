<?php
    class NewsdetailController{
        public function __construct(){
            include_once 'Models/NewsdetailModel.php';
            $newsdetailmodel = new NewsdetailModel();
        }
    }
?>