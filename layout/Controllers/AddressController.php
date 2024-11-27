<?php
class AddressController{
    Public function __construct(){
        include_once 'Models/AddressModel.php';
            $addressmodel = new AddressModel();
    }
}
?>