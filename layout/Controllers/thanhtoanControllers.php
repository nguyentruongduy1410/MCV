<?php
class ThanhToanController {
    public function __construct() {
        include_once 'Model/thanhtoanModel.php';
        $thanhtoanModel = new thanhtoanModel(); 
    }
}

?>