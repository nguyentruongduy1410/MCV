<?php
class DanhmucController
{
    public $lenh;
    public $id;
    public $ten_dm;

    public function __construct($lenh, $ten_dm, $id = null)
    {
        $this->lenh = $lenh;
        $this->ten_dm = $ten_dm;
        $this->id = $id;
    }

    public function index()
    {
        include_once 'Model/DanhmucModel.php';
        $danhmuc = new DanhmucModel();

        try {
            switch ($this->lenh) {
                case '':
                    $danhmuc->dsDanhmuc();
                    $danhmucList = $danhmuc->danhmucList;
                    include_once 'Views/danhmuc.php';
                    break;

                case 'them':
                    $danhmuc->themDanhmuc($this->ten_dm);
                    $danhmuc->dsDanhmuc();
                    $danhmucList = $danhmuc->danhmucList;
                    include_once 'Views/danhmuc.php';
                    break;

                case 'xoa':
                    $danhmuc->xoaDanhmuc($this->id);
                    $danhmuc->dsDanhmuc();
                    $danhmucList = $danhmuc->danhmucList;
                    include_once 'Views/danhmuc.php';
                    break;

                case 'sua':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $danhmuc->suaDanhmuc($this->id, $this->ten_dm);
                        $danhmuc->dsDanhmuc();
                        $danhmucList = $danhmuc->danhmucList;
                        include_once 'Views/danhmuc.php';
                    } else {
                        $danhmucInfo = $danhmuc->getDanhmucById($this->id);
                        include_once 'Views/editdanhmuc.php';
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
