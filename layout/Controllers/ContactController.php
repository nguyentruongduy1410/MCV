<?php
    class ContactController{
        public function __construct(){
            include_once 'Models/ContactModel.php';
            $contactmodel = new ContactModel();
        }
    }
?>