<?php
class ProductdetailController {
    public function __construct($id, $iddm) {
        include_once 'Models/ProductdetailModel.php';
        $productdetailmodel = new ProductdetailModel();
        $productdetailmodel -> onesp($id);
        $productdetailmodel -> splienquan($id);
        $productdetailmodel->chitiethinhanh($id); // Lấy dữ liệu từ model
        $chitiethinhanh = $productdetailmodel->chitiethinhanh; // Dữ liệu từ model
        include './Views/productdetails.php'; // Truyền dữ liệu vào view
    }
}
?>
