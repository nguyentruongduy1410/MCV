<?php
class DanhmucModel
{
    public $danhmucList;

    public function dsDanhmuc()
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * FROM danh_muc";
        $this->danhmucList = $data->selectall($sql) ?? [];
    }

    public function themDanhmuc($ten_dm)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        
        // Thêm danh mục mới
        $sql = "INSERT INTO danh_muc (ten_dm) VALUES (:ten_dm)";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":ten_dm", $ten_dm);
        $stmt->execute();

        $data->conn = null;
    }

    public function xoaDanhmuc($id)
    {
        $sql = "DELETE FROM danh_muc WHERE id=:id";
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    public function getDanhmucById($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM danh_muc WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $danhmuc = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
        return $danhmuc;
    }

    public function suaDanhmuc($id, $ten_dm)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();

        $sql = "UPDATE danh_muc SET ten_dm = :ten_dm WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":ten_dm", $ten_dm);
        $stmt->execute();

        $data->conn = null;
    }
}
?>
