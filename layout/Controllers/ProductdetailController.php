<?php
class ProductdetailController {
    public function __construct($id_sp) {
        include_once 'Models/ProductdetailModel.php';
        $productdetailmodel = new ProductdetailModel();

        // Kiểm tra tham số id_sp đã được nhận chưa
        echo "Product ID: " . $id_sp; // Kiểm tra xem giá trị id có đúng không

        // Lấy dữ liệu hình ảnh chi tiết cho sản phẩm theo id_sp
        $productdetailmodel->chitiethinhanh($id_sp);

        // Truyền dữ liệu từ Model sang View
        $chitiethinhanh = $productdetailmodel->chitiethinhanh;
        include_once './Views/productdetails.php';
    }
}





?>