<?php
class QluserController
{
    public $lenh;
    public $id;
    public $email;
    public $mk;
    public $sdt;
    public $diachi;
    public function __construct($lenh, $email, $vaitro , $mk, $sdt, $diachi, $id = null)
    {
        $this->lenh = $lenh;
        $this->email = $email;
        $this->vaitro = $vaitro;
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
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;

                case 'them':
                                        // Thêm người dùng mới
                    $user->themuser($this->email, $this->vaitro, $this->mk, $this->sdt, $this->diachi);
                    $user->dsuser();
                    $userList = $user->userList; // Sử dụng tên mới
                    include_once 'Views/qluser.php';
                    break;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}


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
?>
