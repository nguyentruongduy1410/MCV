<?php

ob_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header(header: "Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Public/css/style.css">
    <link rel="stylesheet" href="./Public/css/about.css">
    <link rel="stylesheet" href="./Public/css/allproduct.css">
    <link rel="stylesheet" href="./Public/css/cart.css">
    <link rel="stylesheet" href="./Public/css/contact.css">
    <link rel="stylesheet" href="./Public/css/news.css">
    <link rel="stylesheet" href="./Public/css/newsdetail.css">
    <link rel="stylesheet" href="./Public/css/productdetails.css">
    <link rel="stylesheet" href="./Public/css/user.css">
    <link rel="stylesheet" href="./Public/css/history.css">
    <link rel="stylesheet" href="./Public/css/address.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
</head>

<body>
    <div id="container">

        <!-- header -->

        <header>
            <!--menu -->
            <nav>
                <div class="logo"><a href="index.php?trang=home"><img src="./Public/img/Untitled image.png" alt=""></a>
                </div>
                <ul class="menu">
                    <li><a href="index.php?trang=allproduct">TẤT CẢ</a></li>
                    <li><a href="index.php?trang=about">GIỚI THIỆU</a></li>
                    <li id="tools"><a href="index.php?trang=allproduct">SẢN PHẨM</a></li>
                    <li id="tools"><a href="index.php?trang=news">TIN TỨC</a></li>
                    <li id="explore"><a href="index.php?trang=contact">LIÊN HỆ</a></li>
                </ul>
                <div class="login">
                    <form action="index.php?trang=allproduct" method="post" class="search">
                        <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" name="tim" value="tim"><i class='bx bx-search'></i></button>
                    </form>

                    <?php
                    if (isset($_POST['tim'])) {
                        if (isset($_POST['kyw'])) {
                            $kyw = $_POST['kyw'];
                            header("Location: index.php?trang=allproduct&kyw=" . urlencode($kyw));
                            exit();
                        }
                    }
                    ?>




                    <a class="cart" href="index.php?trang=cart"><i class='bx bx-cart'></i>
                        <span id="number-cart">0</span>
                    </a>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<a style="background-color:white;" href="index.php?trang=user">
                                <img src="Public/img/avt.jpg" style="width: 40px; height: 40px; border-radius: 50%;"/>
                              </a>';
                        echo '<a style="color: white;" class="log-out" href="?logout=true">Đăng xuất</a>';
                    } else {
                        echo '<a class="log-in" href="#">Log in</a>';
                    }
                    ?>
                    <i id="mm" class='bx bx-menu'></i>
                </div>

            </nav>

            <!-- nội dung của menu -->
            <div id="tools-menu">
                <div class="tools-box-all">
                    <div class="tools-box">
                        <img src="./Public/img/dan.png" alt="">
                        <h4>ĐÀN DÂN TỘC</h4>
                        <a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                    <div class="tools-box">
                        <img src="./Public/img/sao.png" alt="">
                        <h4>SÁO DÂN TỘC</h4>
                        <a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                    <div class="tools-box">
                        <img src="./Public/img/trong.png" alt="">
                        <h4>PHỤ KIỆN DÂN TỘC KHÁC</h4>
                        <a class="i-hover" href="#"><i class='bx bx-right-arrow-alt'></i></a>
                    </div>
                </div>
                <div class="tools-contents-all">
                    <ul>
                        <li><a href="">
                                <h3>ALL</h3>
                            </a></li>
                        <li><a href="">Đàn tam thập lục</a></li>
                        <li><a href="">Đàn đáy</a></li>
                        <li><a href="">Đàn giáo</a></li>
                        <li><a href="">Sáo bầu</a></li>
                        <li><a href="">Sáo mèo</a></li>
                        <li><a href="">Trống giáo xứ</a></li>
                    </ul>
                </div>
            </div>
            <div id="menu-hide">
                <ul class="menu-ul">
                    <li>
                        <a href="allproduct.html">TẤT CẢ</a>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>
                        <a href="about.html">GIỚI THIỆU</a>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>
                        <a href="#">SẢN PHẨM</a>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>
                        <a href="#">LIÊN HỆ</a>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                </ul>
                <div class="login-menu-hide">
                    <button class="sign-up">Đăng ký</button>
                    <button class="log-in">Đăng nhập</button>
                </div>
            </div>

        </header>