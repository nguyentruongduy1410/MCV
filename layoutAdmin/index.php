<?php
include_once "Views/header.php";

$page = isset($_GET['trang']) ? $_GET['trang'] : 'loginadmin';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$lenh  = isset($_GET['lenh']) ? $_GET['lenh'] : '';
$tendm = isset($_POST['tendm']) ? $_POST['tendm'] : '';
$hinhdm = isset($_POST['hinhdm']) ? $_POST['hinhdm'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$mk = isset($_POST['mk']) ? $_POST['mk'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$lenh = isset($_GET['lenh']) ? $_GET['lenh'] : '';
$tendm = isset($_POST['tendm']) ? $_POST['tendm'] : '';
$hinhdm = isset($_POST['hinhdm']) ? $_POST['hinhdm'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$vaitro = isset($_POST['vaitro']) ? $_POST['vaitro'] : ''; // Sử dụng biến $vaitro
$mk = isset($_POST['mk']) ? $_POST['mk'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : ''; // ID cho trường hợp xóa
$ten_bv = isset($_POST['ten_bv']) ? $_POST['ten_bv'] : '';
$noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';
$hinh_anh = isset($_POST['hinh_anh']) ? $_POST['hinh_anh'] : '';
$ngay_dang = isset($_POST['ngay_dang']) ? $_POST['ngay_dang'] : '';
$mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';

// In giá trị của các biến để kiểm tra (tùy chọn)

switch ($page) {
    case 'home':
        include_once 'Views/home.php';
        break;
    case 'sanpham':
        include_once('Controller/SanphamController.php');
        $SanphamController = new SanphamController();
        break;
    case 'danhmuc':
        include_once('Controller/DanhmucController.php');
        $DanhmucController = new DanhmucController($lenh, $tendm, $hinhdm, $id);
        $DanhmucController->index($lenh);
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
        $qlusercontroller = new QluserController($lenh, $email, $vaitro, $mk, $sdt, $diachi, $id);
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