<?php
class QlbaivietController
{
    public $lenh;
    public $id;
    public $ten_bv;
    public $noi_dung;
    public $hinh_anh;
    public $ngay_dang;
    public $mo_ta;

    public function __construct($lenh, $ten_bv, $noi_dung, $hinh_anh, $ngay_dang, $mo_ta, $id = null)
    {
        $this->lenh = $lenh;
        $this->ten_bv = $ten_bv;
        $this->noi_dung = $noi_dung;
        $this->hinh_anh = $hinh_anh;
        $this->ngay_dang = $ngay_dang;
        $this->mo_ta = $mo_ta;
        $this->id = $id; // Đảm bảo rằng id được khởi tạo
    }

    public function index()
    {
        include_once 'Model/QlbaivietModel.php';
        $post = new QlbaivietModel();

        try {
            switch ($this->lenh) {
                case '':
                    // Hiển thị danh sách bài viết
                    $post->dsPost();
                    $PostList = $post->PostList; // Sử dụng tên mới
                    include_once 'Views/qlbaiviet.php';
                    break;
                case 'xem':
                    $post->xem($this->id);
                    include_once 'Views/chitietbaiviet.php';
                    break;
                case 'them':
                    // Thêm bài viết mới
                    $post->themPost($this->ten_bv, $this->noi_dung, $this->hinh_anh, $this->ngay_dang, $this->mo_ta);
                    $post->dsPost();
                    $PostList = $post->PostList; // Sử dụng tên mới
                    include_once 'Views/qlbaiviet.php';
                    break;

                case 'xoa':
                    // Xóa bài viết
                    $post->xoaPost($this->id);
                    $post->dsPost();
                    $PostList = $post->PostList;
                    include_once 'Views/qlbaiviet.php';
                    break;

                    case 'sua':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Cập nhật bài viết
                            $post->suaPost($this->id, $this->ten_bv, $this->noi_dung, $this->hinh_anh, $this->ngay_dang, $this->mo_ta);
                            
                            // Sau khi sửa xong, quay lại danh sách bài viết
                            header("Location: index.php?trang=qlbaiviet"); // Điều hướng lại trang quản lý bài viết
                            exit;
                        } else {
                            // Nếu là GET request, lấy thông tin bài viết từ cơ sở dữ liệu
                            $postInfo = $post->getPostById($this->id);
                            
                            // Kiểm tra xem dữ liệu có được truyền vào form không
                            if ($postInfo) {
                                $ten_bv = $postInfo['ten_bv'];
                                $noi_dung = $postInfo['noi_dung'];
                                $hinh_anh = $postInfo['hinh_anh'];
                                $ngay_dang = $postInfo['ngay_dang'];
                                $mo_ta = isset($postInfo['mo_ta']) ? $postInfo['mo_ta'] : '';  // Đảm bảo $mo_ta có giá trị
                            } else {
                                echo "Không tìm thấy bài viết!";
                                exit;
                            }
                        
                            // Truyền thông tin bài viết vào view
                            include_once 'Views/editpost.php'; // Mở form sửa bài viết
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
