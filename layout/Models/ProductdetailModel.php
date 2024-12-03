<?php
class ProductdetailModel {
    public $chitiethinhanh = []; // Khởi tạo thuộc tính mặc định là mảng rỗng
    public $chitiet;
    public $splienquan;
    public function chitiethinhanh($id) {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        try {
            $data->ketnoi();
            $sql = "SELECT * FROM hinh_anh_chi_tiet WHERE id_sp = :id_sp";
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(':id_sp', $id, PDO::PARAM_INT);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->chitiethinhanh = !empty($kq) ? $kq : [];
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            $this->chitiethinhanh = [];
        } finally {
            $data->conn = null;
        }
    }
     public function onesp($id){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql = 'SELECT * FROM san_pham WHERE id=:id';
            $this->chitiet = $data->selectone($sql, $id);
        }
        public function splienquan($id, $iddm){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql="select * from san_pham where id_dm=:id_dm  AND id<>:id";
            $data->ketnoi();
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":id_dm",$iddm);

            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
            $data->conn = null; // đóng kết nối database
            $this->splienquan = $kq; // biến này chứa mãng các dòng dữ liệu trả về.


        }
}
?>
