<?php
class QluserController
{
    public $lenh;
    public $id;
    public $email;
<<<<<<< HEAD
    public $vaitro;
=======
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
    public $mk;
    public $sdt;
    public $diachi;

<<<<<<< HEAD
    public function __construct($lenh, $email, $vaitro , $mk, $sdt, $diachi, $id = null)
    {
        $this->lenh = $lenh;
        $this->email = $email;
        $this->vaitro = $vaitro;
        $this->mk = $mk;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
        $this->id = $id; // Đảm bảo rằng id được khởi tạo
=======
    public function __construct($lenh, $email, $mk, $sdt, $diachi)
    {
        $this->lenh = $lenh;
        $this->email = $email;
        $this->mk = $mk;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
    }

    public function index()
    {
        include_once 'Model/QluserModel.php';
        $user = new QluserModel();

        try {
            switch ($this->lenh) {
                case '':
<<<<<<< HEAD
                    // Xử lý lệnh trống, hiển thị danh sách người dùng
=======
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;

                case 'them':
<<<<<<< HEAD
                    // Thêm người dùng mới
                    $user->themuser($this->email, $this->vaitro, $this->mk, $this->sdt, $this->diachi);
=======
                    $user->themuser($this->email, $this->mk, $this->sdt, $this->diachi);
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;
<<<<<<< HEAD

                case 'xoa':
                    $user->xoauser($this->id);
                    $user->dsuser();
                    $userList = $user->userList;
                    include_once 'Views/qluser.php';
                    break;

                case 'sua':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $user->suauser($this->id, $this->email, $this->vaitro, $this->mk, $this->sdt, $this->diachi);
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
=======
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
<<<<<<< HEAD
?>
=======


// case 'xoa':
//     $sv->xoasv($this->id);
//     $mangsv = $sv->dssv();
//     include_once 'views/sinhvien.php';
//     break;

// class QluserController{
//     public function __construct(){
//         include_once("Model/QluserModel.php");
//         $qlusermodel = new QluserModel();
//         $qlusermodel -> dsuser();
//         include_once 'Views/qluser.php';
//     }
>>>>>>> 1f9392bae6c3b8c3cbaa8c12873c155b8c6bcd60
