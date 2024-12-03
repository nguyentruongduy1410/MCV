<?php
include_once "Views/header.php";

$page = isset($_GET['trang']) ? $_GET['trang'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$lenh  = isset($_GET['lenh']) ? $_GET['lenh'] : '';
$ten_dm = isset($_POST['ten_dm']) ? $_POST['ten_dm'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$mk = isset($_POST['mk']) ? $_POST['mk'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$lenh = isset($_GET['lenh']) ? $_GET['lenh'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : ''; 
$mk = isset($_POST['mk']) ? $_POST['mk'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
$ten_bv = isset($_POST['ten_bv']) ? $_POST['ten_bv'] : '';
$noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';
$hinh_anh = isset($_POST['hinh_anh']) ? $_POST['hinh_anh'] : '';
$ngay_dang = isset($_POST['ngay_dang']) ? $_POST['ngay_dang'] : '';
$mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$ten_sp = isset($_POST['ten_sp']) ? $_POST['ten_sp'] : '';
$id_dm = isset($_POST['id_dm']) ? $_POST['id_dm'] : '';
$gia_sp = isset($_POST['gia_sp']) ? $_POST['gia_sp'] : '';
$giamgia_sp = isset($_POST['giamgia_sp']) ? $_POST['giamgia_sp'] : '';
$hinh_sp = isset($_FILES['hinh_sp']['name']) ? $_FILES['hinh_sp']['name'] : '';
$thong_tin_sp = isset($_POST['thong_tin_sp']) ? $_POST['thong_tin_sp'] : '';

// In giá trị của các biến để kiểm tra (tùy chọn)

switch ($page) {
    case 'home':
        include_once 'Views/home.php';
        break;
        case 'qlsanpham':
            include_once 'Controller/QlsanphamController.php';
            $sanphamController = new QlsanphamController($lenh, $ten_sp, $id_dm, $gia_sp, $giamgia_sp, $hinh_sp, $thong_tin_sp, $id);
            $sanphamController->index();
            break;
        case 'danhmuc':
            include_once 'Controller/DanhmucController.php';
            $danhmucController = new DanhmucController($lenh, $ten_dm, $id);
            $danhmucController->index();
            break;
    case 'qlbaiviet':
        include_once 'Controller/QlbaivietController.php';
        $qlbaiviet = new QlbaivietController($lenh, $ten_bv, $noi_dung, $hinh_anh, $ngay_dang, $mo_ta, $id);
        $qlbaiviet->index();
        break;
    case 'qlbinhluan':
        include_once('Controller/QlbinhluanController.php');
        $QlbinhluanController = new QlbinhluanController($lenh, $noi_dung, $id);
        $QlbinhluanController->index();
        break;
    case 'qluser':
        include_once('Controller/QluserController.php');
        $qlusercontroller = new QluserController($lenh, $email, $role, $mk, $sdt, $diachi, $id);
        $qlusercontroller->index();
        break;
    case 'qlvoucher':
        include_once('Controller/QlvoucherController.php');
        $QlvoucherController = new QlvoucherController();
        break;
    case 'qldonhang':
        include_once('Controller/QldonhangController.php');
        $QldonhangController = new QldonhangController();
        break;
    case 'loginadmin':
        include_once 'Views/loginadmin.php';
        break;
    case 'baivietsp':
        include_once 'Views/baivietsp.php';
        break;
}
?>