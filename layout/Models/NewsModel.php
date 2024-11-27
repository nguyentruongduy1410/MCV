<?php
class NewsModel {
    public $newsList;

    // Lấy bài viết theo trang
    public function getAllNews($page) {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $newsPerPage = 5; // Số bài viết mỗi trang
        $start = ($page - 1) * $newsPerPage;
        $sql = "SELECT * FROM bai_viet LIMIT $start, $newsPerPage";
        $this->newsList = $data->selectall($sql);
    }

    // Đếm tổng số bài viết để tính số trang
    public function getTotalNews() {
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT COUNT(*) AS totalNews FROM bai_viet";
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
        return $result['totalNews'];
    }
}
?>
