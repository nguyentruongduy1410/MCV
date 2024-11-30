<?php
class HistoryController {
    public function __construct() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            include_once 'Models/HistoryModel.php';
            $historyModel = new HistoryModel();
            $orderHistory = $historyModel->getOrderHistory($userId);
            include_once 'Views/history.php'; 
        } else {
            header('Location: login.php');
            exit();
        }
    }
}
?>
