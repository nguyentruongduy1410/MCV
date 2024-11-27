<?php
class NewsdetailModel {
    public $newsDetail;

    public function getNewsDetail($id) {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * FROM bai_viet WHERE id = :id";
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->newsDetail = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
    }
}
?>
