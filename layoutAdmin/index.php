<?php
include_once "Views/header.php";

$page = isset($_GET['trang']) ? $_GET['trang'] : 'loginadmin';
$id = isset($_GET['id']) ? $_GET['id'] :'';
$lenh  = isset($_GET['lenh']) ? $_GET['lenh'] :'';
$tendm = isset($_POST['tendm']) ? $_POST['tendm'] :'';
$hinhdm = isset($_POST['hinhdm']) ? $_POST['hinhdm'] :'';
$email = isset($_POST['email']) ? $_POST['email'] :'';
$mk = isset($_POST['mk']) ? $_POST['mk'] :'';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] :'';
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] :'';
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
        include_once ('Controller/DanhmucController.php');
        $DanhmucController = new DanhmucController($lenh, $tendm, $hinhdm, $id);
        $DanhmucController->index($lenh);
        break;
    case 'qlbaiviet':
        include_once ('Controller/QlbaivietController.php');
        $QlbaivietController = new QlbaivietController();
        break;
    case 'qlbinhluan':
        include_once ('Controller/QlbinhluanController.php');
        $QlbinhluanController = new QlbinhluanController();
        break;
    case 'qluser':
        include_once ('Controller/QluserController.php');
        $qlusercontroller = new QluserController($lenh, $email, $vaitro, $mk, $sdt, $diachi, $id); 
        $qlusercontroller->index();
        break;
    case 'qlvoucher':
        include_once ('Controller/QlvoucherController.php');
        $QlvoucherController = new QlvoucherController();
        break;
    case 'qldonhang':
        include_once ('Controller/QldonhangController.php');
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