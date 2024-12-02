<?php
class QluserModel
{
    public $userList;

    public function dsuser()
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * FROM users";
        $this->userList = $data->selectall($sql) ?? []; // Gán mảng rỗng nếu không có dữ liệu
    }

    public function themuser($email, $mk, $sdt, $diachi)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();

        // Kiểm tra trùng lặp email
        $checkSql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmtCheck = $data->conn->prepare($checkSql);
        $stmtCheck->bindParam(":email", $email);
        $stmtCheck->execute();
        $count = $stmtCheck->fetchColumn();

        if ($count > 0) {
            throw new Exception("Email đã tồn tại!");
        }

        // Thêm người dùng
        $sql = "INSERT INTO users (email, mk, sdt, diachi) VALUES (:email, :mk, :sdt, :diachi)";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mk", $mk);
        $stmt->bindParam(":sdt", $sdt);
        $stmt->bindParam(":diachi", $diachi);
        $stmt->execute();

        $data->conn = null; // đóng kết nối database
    }
}
