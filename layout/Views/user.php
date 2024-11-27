
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
                <h4>Định Hình Phương Hướng</h4>
            </div>
            <div class="infor">
                <p><span class="bold">Tên: </span>Định Hình Phương hướng</p>
                <p><span class="bold">Địa chỉ: </span>Bến Tre</p>
                <p><span class="bold">SĐT: </span>0276861267</p>
            </div>
        </div>
    </div>
    <?php
if (!empty($users)) {
    foreach ($users as $user) {
        echo "<p>User ID: " . $user['id'] . "</p>";
        echo "<p>User Name: " . $user['role'] . "</p>";
        // Hiển thị các thông tin khác nếu có
    }
} else {
    echo "<p>Không có người dùng nào để hiển thị.</p>";
}
?>



    