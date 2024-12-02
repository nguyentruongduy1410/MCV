
<style>
    .user-info-main {
    padding: 20px;
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    display: flex;
    gap: 20px;
    justify-content: center;
    align-items: center;
}

/* user-info */
#user-info {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(8px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.user-change-all {
    background-color: #fff;
    width: 600px;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
    position: relative;
}

.user-change-all h2 {
    font-size: 32px;
    color: #333;
    margin-bottom: 30px;
    font-weight: bold;
}

.user-change-all p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}

.input-box {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    transition: 0.3s;
}

.input-box img {
    width: 24px;
    margin-right: 10px;
    opacity: 0.6;
}

.input-box:hover {
    background-color: #e8e8e8;
}

.input-box input {
    width: 100%;
    border: none;
    background: none;
    outline: none;
    font-size: 16px;
    color: #333;
}

#close-user-info {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 24px;
    color: #666;
    cursor: pointer;
    transition: color 0.3s ease;
    z-index: 1100;
}

#close-user-info:hover {
    color: #000;
}

</style><!-- user -->
<div class="container">
    <div class="tab">
        <h3>Tài Khoản</h3>
        <ul>
            <li><a href="index.php?trang=address">Danh sách địa chỉ</a></li>
            <li><a href="index.php?trang=history">Lịch sử mua hàng</a></li>
            <li><a id="quenMK">Đổi mật khẩu</a></li>
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
<div id="user-info">
    <div class="user-change-info">
        <div class="user-change-all">
            <h2>Thay đổi mật khẩu</h2>
            <form action="" method="POST" >
                <div class="input-box">
                    <input name="old-pass" id="old-pass" type="text" placeholder="Nhập mật khẩu cũ">
                </div>
                <p class="error-message" id="repairname-address"></p>
                <div class="input-box">
                    <input name="change-pass1" id="change-pass1" type="text" placeholder="Nhập mật khẩu mới">
                </div>
                <p class="error-message" id="repaisdt-address"></p>
                <div class="input-box">
                    <input name="change-pass2" id="change-pass2" type="text" placeholder="Nhập xác nhận mật khẩu mới">
                </div>
                <p style="color: red" class="error-message" id="repairaddress-address"><?php echo $err_pass; ?></p>
                <button class="reset-button" type="submit" name="update_info">Thay đổi</button>
            </form>
            <i id="close-user-info" class='bx bx-x'></i>
        </div>
    </div>
</div>
