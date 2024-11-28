<!-- user -->
<div class="container">
    <div class="tab">
        <h3>Tài Khoản</h3>
        <ul>
            <li><a href="index.php?trang=address">Danh sách địa chỉ</a></li>
            <li><a href="index.php?trang=history">Lịch sử mua hàng</a></li>
            <li><a href="index.php?trang=home">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="user">
            <?php
            if (isset($_SESSION['email'])) {
                $user_name = $_SESSION['user_name'];
                echo '<h4>' . $user_name . '</h4>';
            }
            ?>
        </div>
        <div class="infor">
        <?php
        if (isset($_SESSION['email'])) {
            $user_name = $_SESSION['user_name'];
            $user_address = $_SESSION['user_address'];
            $user_phone = $_SESSION['user_phone'];

            echo '<p><span class="bold">Tên: </span>' . $user_name . '</p>';
            echo '<p><span class="bold">Địa chỉ: </span>' . $user_address . '</p>';
            echo '<p><span class="bold">SĐT: </span>' . $user_phone . '</p>';
        } else {
            echo '<p>Bạn chưa đăng nhập.</p>';
        }
        ?>
        </div>
    </div>
</div>