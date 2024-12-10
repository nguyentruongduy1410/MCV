<?php
class QlbaivietModel
{
    public $PostList;
    public $xem;

    // Lấy danh sách bài viết
    public function dsPost()
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * FROM bai_viet";
        $this->PostList = $data->selectall($sql) ?? []; // Gán mảng rỗng nếu không có dữ liệu
    }
    public function xem($id){
        include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
        $sql = "SELECT * FROM bai_viet WHERE id =:id";
        $this->xem = $data->selectone($sql, $id);

    }

    // Thêm bài viết mới
    public function themPost($ten_bv, $noi_dung, $hinh_anh, $ngay_dang, $mo_ta)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();

        // Thêm bài viết vào cơ sở dữ liệu
        $sql = "INSERT INTO bai_viet (ten_bv, noi_dung, hinh_anh, ngay_dang, mo_ta) 
                VALUES (:ten_bv, :noi_dung, :hinh_anh, :ngay_dang, :mo_ta)";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":ten_bv", $ten_bv);
        $stmt->bindParam(":noi_dung", $noi_dung);
        $stmt->bindParam(":hinh_anh", $hinh_anh);
        $stmt->bindParam(":ngay_dang", $ngay_dang);
        $stmt->bindParam(":mo_ta", $mo_ta);
        $stmt->execute();

        $data->conn = null; // Đóng kết nối
    }

    // Xóa bài viết
    public function xoaPost($id)
    {
        $sql = "DELETE FROM bai_viet WHERE id = :id";
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    // Lấy thông tin bài viết theo ID
    public function getPostById($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM bai_viet WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
        return $post;
    }

    // Cập nhật bài viết
    public function suaPost($id, $ten_bv, $noi_dung, $hinh_anh, $ngay_dang, $mo_ta)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
    
        // Kiểm tra nếu người dùng đã chọn ảnh mới
        if ($_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
            $hinh_anh = 'uploads/' . basename($_FILES['hinh_anh']['name']);
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $hinh_anh);
        } else {
            // Nếu không có ảnh mới, giữ lại ảnh cũ
            $hinh_anh = $_POST['hinh_anh_cu'] ?? $hinh_anh;  // Đảm bảo dùng ảnh cũ nếu không thay đổi
        }
    
        // Cập nhật bài viết
        $sql = "UPDATE bai_viet SET ten_bv = :ten_bv, noi_dung = :noi_dung, hinh_anh = :hinh_anh, 
                ngay_dang = :ngay_dang, mo_ta = :mo_ta WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":ten_bv", $ten_bv);
        $stmt->bindParam(":noi_dung", $noi_dung);
        $stmt->bindParam(":hinh_anh", $hinh_anh);
        $stmt->bindParam(":ngay_dang", $ngay_dang);
        $stmt->bindParam(":mo_ta", $mo_ta);
        $stmt->execute();
    
        $data->conn = null;
    }
    
}
?>
