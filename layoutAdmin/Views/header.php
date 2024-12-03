<?php 
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header(header: "Location: ../layout");
    exit();
}?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin - Nhạc Cụ Dân Tộc</title>
    <link rel="stylesheet" href="public/css/danhmuc.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/qlbaiviet.css">
    <link rel="stylesheet" href="public/css/qlbinhluan.css">
    <link rel="stylesheet" href="public/css/qldonhang.css">
    <link rel="stylesheet" href="public/css/qluser.css">
    <link rel="stylesheet" href="public/css/qlvoucher.css">
    <link rel="stylesheet" href="public/css/sanpham.css">
    <link rel="stylesheet" href="public/css/thongke.css">
    <link rel="stylesheet" href="public/css/baivietsp.css">
    <link rel="stylesheet" href="public/css/edituser.css">

    
</head>
<body>

<div class="header">
    
    <a href="index.php?trang=home"><img src="./Public/img/logo.png" alt="Logo" /></a>
    <div class="user-icon">👤 Admin</div>
</div>

<div class="container">
    <div class="sidebar">
        <div>
            <h2>Quản Trị</h2>
        <a href="index.php?trang=home">Trang Chủ</a>
        <a href="index.php?trang=qlsanpham">Sản Phẩm</a>
        <a href="index.php?trang=danhmuc">Danh Mục Sản Phẩm</a>
        <a href="index.php?trang=qluser">Người Dùng</a>
        <a href="index.php?trang=qlbaiviet">Quản Lý Bài Viết</a>
        <a href="index.php?trang=qldonhang">Quản Lý Đơn Hàng</a>
        <a href="index.php?trang=qlbinhluan">Quản Lý Bình Luận</a>
        <a href="index.php?trang=qlvoucher">Quản Lý Khuyến Mãi</a>
        <a href="?logout=true">Đăng Xuất</a> <br> <br> <br>
          
        </div>
     
    </div>