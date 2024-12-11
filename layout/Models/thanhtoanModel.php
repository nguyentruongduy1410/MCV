<?php 
class thanhtoanModel {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "mcv"; 
    public $conn;

    public function __construct() {
        // Kết nối tới cơ sở dữ liệu
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }

        // Gọi file view
        include_once './Views/thanhtoan.php';
    }
}
?>
