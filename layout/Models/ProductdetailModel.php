<?php 
 class ProductdetailModel {
    public $chitiethinhanh = [];

    public function chitiethinhanh($id) {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM hinh_anh_chi_tiet WHERE id_sp = :id_sp"; 
        print_r($sql);
        Đảm bảo tên cột đúng
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(':id_sp', $id, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($kq) {
            $this->chitiethinhanh = $kq;
        } else {
            $this->chitiethinhanh = []; // Nếu không có dữ liệu, trả về mảng rỗng
        }        
        $data->conn = null;
    }
}
?>