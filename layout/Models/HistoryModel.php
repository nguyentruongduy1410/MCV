<?php 
include_once 'Models/connectmodel.php';

class HistoryModel {
    private $db;

    public function __construct() {
        $this->db = new ConnectModel();
    }
    public function getOrderHistory($userId) {
        $conn = $this->db->ketnoi();
        $stmt = $conn->prepare("SELECT * FROM don_hang WHERE id_user = :userId ORDER BY ngay_dat_hang DESC");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return false;
        }
    }
}
?>
