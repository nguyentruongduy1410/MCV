<?php
class ProductdetailController {
    public function __construct($id) {
        include_once 'Models/ProductdetailModel.php';
        $productdetailmodel = new ProductdetailModel();
        $productdetailmodel->chitiethinhanh($id);
        include_once './Views/productdetails.php';
    }
}
?>