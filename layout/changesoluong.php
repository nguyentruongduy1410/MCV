<?php
    session_start();
    if(isset($_POST['soluong'])){
        $soluong=$_POST['soluong'];
    }
    if(isset($_POST['key'])){
        $key=$_POST['key'];
    }

    if(isset($_SESSION['giohang'])){
        $_SESSION['giohang'][$key]['soluong']=$soluong;
    }

    include_once 'Controllers/CartController.php';
    $CartController = new CartController();
    $cart_html= $CartController->showcart_html();

    echo $cart_html;

?>