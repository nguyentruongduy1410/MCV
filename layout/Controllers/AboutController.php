<?php
    class AboutController{
        public function __construct(){
            include_once 'Models/AboutModel.php';
            $aboutmodel = new AboutModel();
        }
    }
?>