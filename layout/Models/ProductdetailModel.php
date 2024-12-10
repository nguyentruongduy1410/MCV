<?php
class ProductdetailModel {
    public $chitiethinhanh = [];
    public $chitiet;
    public $splienquan;
    public $loadcmt;
    public $binhluan;
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
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":id_dm", $iddm);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
            $data->conn = null; // đóng kết nối database
            $this->splienquan = $kq; // biến này chứa mãng các dòng dữ liệu trả về.

        }
        public function loadcmt($id, $id_user) {
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql = "SELECT binh_luan.*, users.ten FROM binh_luan 
            JOIN users ON binh_luan.id_user = users.id 
            WHERE binh_luan.id_sp = :id AND binh_luan.id_user <> :id_user";
            try {
                $data->ketnoi();
                $stmt = $data->conn->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT); // Sử dụng biến $id
                $stmt->bindParam(":id_user", $id_user, PDO::PARAM_INT); // Sử dụng biến $id_user
                $stmt->execute();
                $this->loadcmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Lỗi khi load bình luận: " . $e->getMessage());
                $this->loadcmt = [];
            } finally {
                $data->conn = null;
            }
        }
        public function slbl($id, $id_user, $noi_dung) {
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql = "INSERT INTO binh_luan (id_sp, id_user, noi_dung, ngay_bl) 
                    VALUES (:id_sp, :id_user, :noi_dung, NOW())";
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(':id_sp', $id, PDO::PARAM_INT);
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);  // 'id_user' của binh_luan
            $stmt->bindParam(':noi_dung', $noi_dung, PDO::PARAM_STR);
            $stmt->execute();
            $data->conn = null;
        }
        public function view($id){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql = "UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE id = :id";            
            $data->ketnoi();
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $data->conn = null; // Đóng kết nối
        }
        
    
}
?>
