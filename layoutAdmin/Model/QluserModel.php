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
    public function themuser($email, $vaitro, $mk, $sdt, $diachi)
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
        $sql = "INSERT INTO users (email, vaitro, mk, sdt, diachi) VALUES (:email, :vaitro, :mk, :sdt, :diachi)";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":vaitro", $vaitro);
        $stmt->bindParam(":mk", $mk);
        $stmt->bindParam(":sdt", $sdt);
        $stmt->bindParam(":diachi", $diachi);
        $stmt->execute();

        $data->conn = null; // đóng kết nối database
    }
    public function xoauser($id)
    {
        $sql = "DELETE FROM users WHERE id=:id";
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null;
    }

    public function getUserById($id)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $data->conn = null;
        return $user;
    }

    public function suauser($id, $email, $vaitro, $mk, $sdt, $diachi)
    {
        include_once 'Model/connectmodel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "UPDATE users SET email = :email, vaitro = :vaitro, mk = :mk, sdt = :sdt, diachi = :diachi WHERE id = :id";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":vaitro", $vaitro);
        $stmt->bindParam(":mk", $mk);
        $stmt->bindParam(":sdt", $sdt);
        $stmt->bindParam(":diachi", $diachi);
        $stmt->execute();
        $data->conn = null;
    }
}
?>
