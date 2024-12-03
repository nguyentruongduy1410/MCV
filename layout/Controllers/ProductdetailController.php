<?php
class ProductdetailController {
    public function __construct($lenh, $noi_dung, $id, $iddm, $id_user) {
        include_once 'Models/ProductdetailModel.php';
        $productdetailmodel = new ProductdetailModel();

        // Kiểm tra lệnh để thêm bình luận
        if ($lenh == 'cmt' && !empty($noi_dung)) {
            $productdetailmodel->slbl($id, $id_user, $noi_dung);
        }

        // Lấy chi tiết sản phẩm, sản phẩm liên quan, hình ảnh chi tiết, và bình luận
        $productdetailmodel->onesp($id);
        $productdetailmodel->splienquan($id, $iddm);
        $productdetailmodel->chitiethinhanh($id);
        $chitiethinhanh = $productdetailmodel->chitiethinhanh;
        $productdetailmodel->loadcmt($id, $id_user);
        
        // Chuyển các dữ liệu cần thiết vào View
        include './Views/productdetails.php';
    }
}

?>
