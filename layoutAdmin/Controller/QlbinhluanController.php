<?php
class QlbinhluanController
{
    public $lenh;
    public $id;
    public $noi_dung;

    public function __construct($lenh, $noi_dung = null, $id = null)
    {
        $this->lenh = $lenh;
        $this->noi_dung = $noi_dung;
        $this->id = $id;
    }

    public function index()
    {
        include_once 'Model/QlbinhluanModel.php';
        $binhluan = new QlbinhluanModel();

        try {
            switch ($this->lenh) {
                case '':
                    // Hiển thị danh sách bình luận
                    $binhluan->dsbinhluan();
                    $dsbl = $binhluan->dsbl;
                    include_once 'Views/qlbinhluan.php';
                    break;

                case 'xoa':
                    // Xóa bình luận
                    $binhluan->xoabinhluan($this->id);
                    $binhluan->dsbinhluan();
                    $dsbl = $binhluan->dsbl;
                    include_once 'Views/qlbinhluan.php';
                    break;

                case 'sua':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Cập nhật bình luận
                        $binhluan->suabinhluan($this->id, $this->noi_dung);
                        $binhluan->dsbinhluan();
                        $dsbl = $binhluan->dsbl;
                        include_once 'Views/qlbinhluan.php';
                    } else {
                        // Hiển thị form sửa bình luận
                        $binhluanInfo = $binhluan->getBinhluanById($this->id);
                        include_once 'Views/editbinhluan.php';
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
