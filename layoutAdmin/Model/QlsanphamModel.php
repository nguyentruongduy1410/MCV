<?php
class QlsanphamModel
{
    public $tcsp;

    public function dssanpham()
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM san_pham";
        $this->tcsp = $data->selectall($sql) ?? []; // Nếu không có sản phẩm, gán mảng rỗng
    }

    public function themsanpham($ten_sp, $id_dm, $gia_sp, $giamgia_sp, $hinh_sp, $thong_tin_sp)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();

        $sql = "INSERT INTO san_pham (ten_sp, id_dm, gia_sp, giamgia_sp, hinh_sp, thong_tin_sp) 
                VALUES (:ten_sp, :id_dm, :gia_sp, :giamgia_sp, :hinh_sp, :thong_tin_sp)";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":ten_sp", $ten_sp);
        $stmt->bindParam(":id_dm", $id_dm);
        $stmt->bindParam(":gia_sp", $gia_sp);
        $stmt->bindParam(":giamgia_sp", $giamgia_sp);
        $stmt->bindParam(":hinh_sp", $hinh_sp);
        $stmt->bindParam(":thong_tin_sp", $thong_tin_sp);
        $stmt->execute();

        $data->conn = null;
    }

    public function xoasanpham($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "DELETE FROM san_pham WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    public function suasanpham($id, $ten_sp, $id_dm, $gia_sp, $giamgia_sp, $hinh_sp, $thong_tin_sp)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "UPDATE san_pham SET ten_sp = :ten_sp, id_dm = :id_dm, gia_sp = :gia_sp, giamgia_sp = :giamgia_sp,
                hinh_sp = :hinh_sp, thong_tin_sp = :thong_tin_sp WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":ten_sp", $ten_sp);
        $stmt->bindParam(":id_dm", $id_dm);
        $stmt->bindParam(":gia_sp", $gia_sp);
        $stmt->bindParam(":giamgia_sp", $giamgia_sp);
        $stmt->bindParam(":hinh_sp", $hinh_sp);
        $stmt->bindParam(":thong_tin_sp", $thong_tin_sp);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    public function getSanphamById($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM san_pham WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
