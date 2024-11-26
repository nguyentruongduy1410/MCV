<?php 
 class ProductdetailModel {
    public $chitiethinhanh;

    public function chitiethinhanh($id_sp) {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();  // Kết nối cơ sở dữ liệu

        // Truy vấn dữ liệu từ bảng hinh_anh_chi_tiet theo id_sản phẩm
        $sql = "SELECT * FROM hinh_anh_chi_tiet WHERE id_sp = :id_sp";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);  // Tránh lỗi SQL Injection
        $stmt->execute();

        // Lấy kết quả
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Đảm bảo kết quả trả về là một mảng
        $this->chitiethinhanh = !empty($kq) ? $kq : [];
        $data->conn = null;  // Đóng kết nối sau khi truy vấn
    }
}


?>