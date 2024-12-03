<style>
 /* Reset CSS cơ bản */
body, ul, li {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Tổng quát */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f7fc;
    color: #333;
    line-height: 1.6;
}

/* Header chính */
.main-header {
    /* background: linear-gradient(90deg, #1a73e8, #0056b3); Hiệu ứng chuyển màu */
    padding: 15px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
}

/* Navigation */
.navbar {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between; /* Căn đều hai bên */
    align-items: center;
    padding: 0 20px;
}

/* Logo */
.logo {
    color: white;
    font-size: 60px;
}

/* Navigation menu */
.nav-list {
    list-style: none;
    display: flex;
    gap: 30px; /* Khoảng cách giữa các mục */
}

/* Liên kết */
.nav-link {
    color: #fff;
    font-size: 16px;
    font-weight: 500;
    padding: 10px 15px;
    border-radius: 50px; /* Nút bo tròn */
    transition: all 0.3s ease;
    text-decoration: none;
    text-transform: capitalize;
}

.nav-link:hover {
    background-color: #ffffff; /* Nền trắng khi hover */
    color: #1a73e8; /* Text xanh nổi bật */
    transform: scale(1.1); /* Phóng to nhẹ */
}

/* Responsive: thu gọn menu trên màn hình nhỏ */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-list {
        flex-direction: column;
        gap: 15px; /* Giảm khoảng cách giữa các mục */
        margin-top: 10px;
    }

    .logo {
        margin-bottom: 10px;
    }
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-header">
        <nav class="navbar">
            <div class="logo">
            Classic Music
            </div>
            <ul class="nav-list">
                <li><a href="../layout/index.php?trang=home" class="nav-link">Trang chủ</a></li>
                <li><a href="../layout/index.php?trang=user" class="nav-link">Thông tin tài khoản</a></li>
                <li><a href="?logout=true" class="nav-link">Đăng xuất</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>

