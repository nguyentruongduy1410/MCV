<?php
class QlsanphamController
{
    public $lenh;
    public $id;
    public $ten_sp;
    public $id_dm;
    public $gia_sp;
    public $giamgia_sp;
    public $hinh_sp;
    public $thong_tin_sp;

    public function __construct($lenh, $ten_sp, $id_dm, $gia_sp, $giamgia_sp, $hinh_sp, $thong_tin_sp, $id = null)
    {
        $this->lenh = $lenh;
        $this->id = $id;
        $this->ten_sp = $ten_sp;
        $this->id_dm = $id_dm;
        $this->gia_sp = $gia_sp;
        $this->giamgia_sp = $giamgia_sp;
        $this->hinh_sp = $hinh_sp;
        $this->thong_tin_sp = $thong_tin_sp;
    }

    public function index()
    {
        include_once 'Model/QlsanphamModel.php';
        $sanpham = new QlsanphamModel();

        try {
            switch ($this->lenh) {
                case '':
                    $sanpham->dssanpham();
                    $productList = $sanpham->tcsp;
                    include_once 'Views/qlsanpham.php';
                    break;

                case 'them':
                    $sanpham->themsanpham($this->ten_sp, $this->id_dm, $this->gia_sp, $this->giamgia_sp, $this->hinh_sp, $this->thong_tin_sp);
                    $sanpham->dssanpham();
                    $productList = $sanpham->tcsp;
                    include_once 'Views/qlsanpham.php';
                    break;

                case 'xoa':
                    $sanpham->xoasanpham($this->id);
                    $sanpham->dssanpham();
                    $productList = $sanpham->tcsp;
                    include_once 'Views/qlsanpham.php';
                    break;

                case 'sua':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $sanpham->suasanpham($this->id, $this->ten_sp, $this->id_dm, $this->gia_sp, $this->giamgia_sp, $this->hinh_sp, $this->thong_tin_sp);
                        $sanpham->dssanpham();
                        $productList = $sanpham->tcsp;
                        include_once 'Views/qlsanpham.php';
                    } else {
                        $productInfo = $sanpham->getSanphamById($this->id);
                        include_once 'Views/editsanpham.php';
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
