<?php
    class NewsController{
        public function __construct(){
            include_once 'Models/NewsModel.php';
            $newsmodel = new NewsModel();
        }
    }
?>