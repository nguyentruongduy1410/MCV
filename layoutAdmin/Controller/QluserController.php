<?php
class QluserController
{
    public $lenh;
    public $id;
    public $email;
    public $role;
    public $mk;
    public $sdt;
    public $diachi;

    public function __construct($lenh, $email, $role , $mk, $sdt, $diachi, $id = null)
    {
        $this->lenh = $lenh;
        $this->email = $email;
        $this->role = $role;
        $this->mk = $mk;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
        $this->id = $id; // Đảm bảo rằng id được khởi tạo
    }

    public function index()
    {
        include_once 'Model/QluserModel.php';
        $user = new QluserModel();

        try {
            switch ($this->lenh) {
                case '':
                    // Xử lý lệnh trống, hiển thị danh sách người dùng
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;

                case 'them':
                    // Thêm người dùng mới
                    $user->themuser($this->email, $this->role, $this->mk, $this->sdt, $this->diachi);
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;

                case 'xoa':
                    $user->xoauser($this->id);
                    $user->dsuser();
                    $userList = $user->userList;
                    include_once 'Views/qluser.php';
                    break;

                case 'sua':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $user->suauser($this->id, $this->email, $this->role, $this->mk, $this->sdt, $this->diachi);
                        $user->dsuser();
                        $userList = $user->userList;
                        include_once 'Views/qluser.php';
                    } else {
                        $userInfo = $user->getUserById($this->id);
                        include_once 'Views/edituser.php';
                    }
                    break;

                default:
                    throw new Exception("Lệnh không hợp lệ.");
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
