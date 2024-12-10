<?php
class QlbinhluanModel
{
    public $dsbl;

    public function dsbinhluan()
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT binh_luan.*,
                    users.ten,
                    san_pham.ten_sp
                FROM binh_luan
                JOIN users ON binh_luan.id_user = users.id
                JOIN san_pham ON binh_luan.id_sp = san_pham.id";

        $this->dsbl = $data->selectall($sql) ?? []; // Gán mảng rỗng nếu không có dữ liệu
    }

    public function xoabinhluan($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "DELETE FROM binh_luan WHERE id=:id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    public function getBinhluanById($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM binh_luan WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $binhluan = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
        return $binhluan;
    }

    public function suabinhluan($id, $noi_dung)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "UPDATE binh_luan SET noi_dung = :noi_dung WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":noi_dung", $noi_dung);
        $stmt->execute();
        $data->conn = null;
    }
}
?>
