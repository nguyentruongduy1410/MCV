<style>
    .address-main {

        padding: 20px;
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
    }

    /* address */
    #address {
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

    .change-all {
        background-color: #fff;
        width: 600px;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        position: relative;
    }

    .change-all h2 {
        font-size: 32px;
        color: #333;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .change-all p {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
    }

    .box-input-address {
        display: flex;
        align-items: center;
        background-color: #f0f0f0;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .box-input-address img {
        width: 24px;
        margin-right: 10px;
        opacity: 0.6;
    }

    .box-input-address:hover {
        background-color: #e8e8e8;
    }

    .box-input-address input {
        width: 100%;
        border: none;
        background: none;
        outline: none;
        font-size: 16px;
        color: #333;
    }

    #outaddress {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 24px;
        color: #666;
        cursor: pointer;
        transition: color 0.3s ease;
        z-index: 1100;
    }

    #outaddress:hover {
        color: #000;
    }
</style>
<?php
include_once 'Models/connectmodel.php';
include_once 'Models/UserModel.php';
if (isset($_SESSION['email']) && isset($_POST['update_info'])) {
    $new_name = $_POST['ten'];
    $new_phone = $_POST['sdt'];
    $new_address = $_POST['address'];

    updateUserInfo($_SESSION['email'], $new_name, $new_phone, $new_address);

    $_SESSION['user_name'] = $new_name;
    $_SESSION['user_phone'] = $new_phone;
    $_SESSION['user_address'] = $new_address;

    header("Location: index.php?trang=address");
    exit();
}
?>
<div id="container">
    <!-- Nội dung chính -->
    <div class="address-main">
        <div class="full">
            <div class="change">
                <p>Thay đổi thông tin</p>
            </div>
            <div class="customer-address">
                <h2>Thông Tin Địa Chỉ</h2>
                <div class="address-card">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo "<p>Tên người dùng: " . $_SESSION['user_name'] . "<p>";
                        echo "<p>Số điện thoại: " . $_SESSION['user_phone'] . "</p>";
                        echo "<p>Địa chỉ: " . $_SESSION['user_address'] . "</p>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="address">
    <div class="change-address">
        <div class="change-all">
            <h2>Thay đổi thông tin</h2>
            <p>Vui lòng nhập email để khôi phục mật khẩu</p>
            <form action="" method="POST" >
                <div class="box-input-address">
                    <input name="ten" id="change-name" type="text" placeholder="Nhập tên.." value="<?php echo $_SESSION['user_name']; ?>">
                </div>
                <p class="repair" id="repairname-address"></p>
                <div class="box-input-address">
                    <input name="sdt" id="change-sdt" type="text" placeholder="Nhập SĐT.." value="<?php echo $_SESSION['user_phone']; ?>">
                </div>
                <p class="repair" id="repaisdt-address"></p>
                <div class="box-input-address">
                    <input name="address" id="change-user-address" type="text" placeholder="Nhập địa chỉ.." value="<?php echo $_SESSION['user_address']; ?>">
                </div>
                <p class="repair" id="repairaddress-address"></p>
                <button class="reset-button" type="submit" name="update_info">Thay đổi</button>
            </form>
            <i id="outaddress" class='bx bx-x'></i>
        </div>
    </div>
</div>
