<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}
ob_start();
if (!isset($_SESSION['thanhtoan'])) {
    $_SESSION['thanhtoan'] = array();
}

include_once './Views/header.php';

// Lấy tham số từ URL
$page = isset($_GET['trang']) ? $_GET['trang'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$iddb = isset($_GET['iddb']) ? $_GET['iddb'] : '';
$iddm = isset($_GET['iddm']) ? $_GET['iddm'] : '';
$chuyen = isset($_GET['chuyen']) ? $_GET['chuyen'] : '1';
$kyw = isset($_GET['kyw']) ? $_GET['kyw'] : '';
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';
$lenh = isset($_GET['lenh']) ? $_GET['lenh'] : '';
$noi_dung = isset($_POST['comment']) ? $_POST['comment'] : '';  

switch ($page) {
    case 'home':
        include_once 'Controllers/HomeController.php';
        $HomeController = new HomeController(id: $id, iddb: $iddb, iddm: $iddm);
        break;

    case 'about':
        include_once 'Controllers/AboutController.php';
        $AboutController = new AboutController();
        break;

    case 'allproduct':
        include_once 'Controllers/AllproductController.php';
        $AllproductController = new AllproductController(id: $id, iddm: $iddm, chuyen: $chuyen, kyw: $kyw);
        break;

    case 'cart':
        if (isset($_GET['delcart']) && is_numeric($_GET['delcart']) && ($_GET['delcart'] == 1)) {
            unset($_SESSION['giohang']); 
            $_SESSION['so_luong'] = 0;
            header('location: index.php?trang=cart');
        }
        
        if (isset($_GET['key']) && is_numeric($_GET['key']) && ($_GET['key'] >= 0)) {
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                unset($_SESSION['giohang'][$_GET['key']]);
                $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                $_SESSION['so_luong'] = count($_SESSION['giohang']);
                header('location: index.php?trang=cart');
            }
        }
        
        if (isset($_POST['btnaddcart'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $soluong = $_POST['soluong'] ?? 1;

            $chek = false;
            if (isset($_SESSION['giohang'])) {
                foreach ($_SESSION['giohang'] as $key => $value) {
                    if ($_SESSION['giohang'][$key]['id'] == $id) {
                        $_SESSION['giohang'][$key]['soluong'] += $soluong;
                        $chek = true;
                    }
                }
            }

            if (!$chek) {
                include_once 'Controllers/CartController.php';
                $CartController = new CartController();
                $CartController->addtocart($id, $name, $img, $price, $soluong);
            }

            header('location: index.php?trang=cart');
        }
        include_once 'Controllers/CartController.php';
        $CartController = new CartController();
        $cart_html = $CartController->showcart_html();
        include_once './Views/cart.php';
        break;


        case 'contact':
            include_once 'Controllers/ContactController.php';
            $ContactController = new ContactController();
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ContactController->sendEmail();
            } else {
                include_once './Views/contact.php'; // Hiển thị form liên hệ
            }
            break;

    case 'news':
        include_once 'Controllers/NewsController.php';
        $NewsController = new NewsController($chuyen);
        break;

    case 'newsdetail':
        include_once 'Controllers/NewsdetailController.php';
        $NewsdetailController = new NewsdetailController();
        break;

    case 'productdetail':
        include_once 'Controllers/ProductdetailController.php';
        $ProductdetailController = new ProductdetailController(lenh: $lenh,id: $id,iddm: $iddm, id_user: $id_user,noi_dung: $noi_dung);
        break;
    case 'user':
        if (!isset($_SESSION['email'])) {
            header('location:index.php?trang=home');
            exit();
        }
        include_once 'Controllers/UserController.php';
        $userController = new UserController();
        break;

    case 'address':
        if (!isset($_SESSION['email'])) {
            header('location:index.php?trang=home');
            exit();
        }
        include_once 'Controllers/AddressController.php';
        $AddressController = new AddressController();
        break;

    case 'history':
        if (!isset($_SESSION['email'])) {
            header('location:index.php?trang=home');
            exit();
        }
        include_once 'Controllers/HistoryController.php';
        $HistoryController = new HistoryController($userId);
        break;

        case 'thanhtoan':
            if (isset($_GET['key']) && isset($_SESSION['thanhtoan'][$_GET['key']])) {
                unset($_SESSION['thanhtoan'][$_GET['key']]);
                header('location:index.php?trang=thanhtoan');
                exit;
            }
        
            if (isset($_POST['thanhtoan'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'] ?? 1;
                print_r($_POST);
                $check = false;
                foreach ($_SESSION['thanhtoan'] as $key => $value) {
                    if ($value['id'] == $id) {
                        $_SESSION['thanhtoan'][$key]['soluong'] += $soluong;
                        $check = true;
                        break;
                    }
                }
        
                if (!$check) {
                    include_once 'Controllers/thanhtoanControllers.php';
                    $ThanhToanController = new ThanhToanController();
                    $ThanhToanController->addthanhtoan($id, $name, $img, $price, $soluong);
                }
        
                header('location:index.php?trang=thanhtoan');
                exit;
            }
            include_once 'Controllers/thanhtoanControllers.php';
            $ThanhToanController = new ThanhToanController();
            $html_thanhtoan = $ThanhToanController->showthanhtoan_html();
            include_once './Views/thanhtoan.php';
            break;
}

include_once './Views/footer.php';
include_once './Views/login.php';
?>