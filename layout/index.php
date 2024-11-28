<?php
include_once './Views/header.php';
$page = isset($_GET['trang']) ? $_GET['trang'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$iddb = isset($_GET['iddb']) ? $_GET['iddb'] : '';
$iddm = isset($_GET['iddm']) ? $_GET['iddm'] : '';
$chuyen = isset($_GET['chuyen']) ? $_GET['chuyen'] : '1';
$kyw = isset($_GET['kyw']) ? $_GET['kyw'] : '';
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
        include_once 'Controllers/CartController.php';
        $CartController = new CartController();
        break;
    case 'contact':
        include_once 'Controllers/ContactController.php';
        $ContactController = new ContactController();
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
        $ProductdetailController = new ProductdetailController(id_sp: $id);
        break;
    case 'user':
        include_once 'Controllers/UserController.php';
        $userController = new UserController();
        $userController->infor();
        break;

    case 'address':
        include_once 'Controllers/AddressController.php';
        $AddressController = new AddressController();
        break;
    case 'history':
        include_once 'Controllers/HistoryController.php';
        $HistoryController = new HistoryController();
        break;
        case 'thanhtoan':
            include_once '../Controllers/thanhtoanControllers.php';
            $thanhtoanController = new thanhtoanController();
            break;
}
include_once './Views/footer.php';
include_once './Views/login.php';
?>