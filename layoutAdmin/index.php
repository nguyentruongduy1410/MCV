<?php
include_once"Views/header.php";

$page=isset($_GET['trang']) ? $_GET['trang'] : 'home';   

switch ($page){
    case 'home':
        include_once'Views/home.php';
        break;
    case 'sanpham':
        include_once('Controller/SanphamController.php');
        $SanphamController = new SanphamController();
        break;
    case 'danhmuc':
            include_once'Views/danhmuc.php';
            break;  
    case 'qlbaiviet':
                include_once'Views/qlbaiviet.php';
                break;  
    case 'qlbinhluan':
                    include_once'Views/qlbinhluan.php';
                    break;  
    case 'qluser':
                        include_once'Views/qluser.php';
                        break; 
    case 'qlvoucher':
                            include_once'Views/qlvoucher.php';
                            break;
    case 'qldonhang':
                                include_once'Views/qldonhang.php';
                                break;
    case 'loginadmin':
                                    include_once'Views/loginadmin.php';
                                    break;
}

?>