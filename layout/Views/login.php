<?php
include_once 'Controllers/LoginController.php';
?>

<link rel="stylesheet" href="./Public/css/style.css">
<div id="loginModal">
    <div class="modal-content">
        <div class="modal-content-left">
            <img src="./Public/img/login&singup.png" alt="">
        </div>
        <!-- login ---------------------------------- -->
        <div class="modal-content-right">
            <div class="login-all">
                <h2>Đăng nhập</h2>
                <p>Đăng nhập để mở khóa nhiều chức năng</p>
                <p>Dễ dàng tìm kiếm nhạc cụ mong muốn</p>
                <div class="login-ggfb">
                    <img src="./Public/img/google-3fce4cd8.svg" alt="">
                    <p>Continue with Google</p>
                </div>
                <div class="login-ggfb">
                    <img src="./Public/img/facebook-e242b22a.svg" alt="">
                    <p>Continue with Facebook</p>
                </div>
                <div class="login-line">
                    <div class="line"></div>
                    <p>Hoặc đăng nhập với</p>
                    <div class="line"></div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="box-input">
                        <img src="./Public/img/email-4ddcb32a.svg" alt="">
                        <input id="login-email" type="email" name="email" placeholder="Nhập Email" required>
                    </div>
                    <p class="repair" id="repairemail"></p>
                    <div class="box-input">
                        <img src="./Public/img/password-263cf8d7.svg" alt="">
                        <input id="login-pass" type="password" name="password" placeholder="Nhập mật khẩu" required>
                        <span class="show-pass"><img id="show-login-pass" src="./Public/img/eye.png" alt=""
                                width="20px"></span>
                    </div>
                    <p class="repair" id="repairpassword"></p>
                    <button name="login" class="log-in">Đăng nhập</button>
                </form>

                <div class="forgot">
                    <p>Bạn chưa có tài khoản?
                    <p id="signup">Đăng ký</p>
                    </p>
                    <p onclick="resetuser()">Quên mật khẩu?</p>
                </div>
            </div>
        </div>
        <!-- sign up -------------------------------------------- -->
        <div class="modal-content-right-signup">
            <div class="login-all">
                <h2>Đăng ký</h2>
                <div class="login-ggfb">
                    <img src="./Public/img/google-3fce4cd8.svg" alt="">
                    <p>Continue with Google</p>
                </div>
                <div class="login-ggfb">
                    <img src="./Public/img/facebook-e242b22a.svg" alt="">
                    <p>Continue with Facebook</p>
                </div>
                <div class="login-line">
                    <div class="line"></div>
                    <p>Hoặc đăng ký với</p>
                    <div class="line"></div>
                </div>
                <form action="" method="post">
                    <div class="box-input">
                        <img src="./Public/img/email-4ddcb32a.svg" alt="">
                        <input name="sEmail" id="signup-email" type="email" placeholder="Nhập Email" required>
                    </div>
                    <p class="repair" id="repairemail-signup"></p>
                    <div class="box-input">
                        <img src="./Public/img/tachnen_avt.png" alt="">
                        <input name="sName" id="signup-name" type="text" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="box-input">
                        <img src="./Public/img/password-263cf8d7.svg" alt="">
                        <input name="sPassword" id="signup-pass1" type="password" placeholder="Nhập mật khẩu" required>
                        <span class="show-pass"><img id="show-signup-pass" src="./Public/img/eye.png" alt=""
                                width="20px"></span>
                    </div>
                    <p class="repair" id="repairpassword-signup1"></p>
                    <div class="box-input">
                        <img src="./Public/img/password-263cf8d7.svg" alt="">
                        <input name="sRPassword" id="signup-pass2" type="password" placeholder="Nhập lại mật khẩu"
                            required>
                        <span class="show-pass"><img id="show-signup2-pass" src="./Public/img/eye.png" alt=""
                                width="20px"></span>
                    </div>
                    <p class="repair" id="repairpassword-signup2"></p>
                    <button class="log-in" name="signup">Đăng ký</button>
                    <div class="forgot">
                        <p>Bạn đã có tài khoản?
                        <p id="signup2">Đăng nhập</p>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <!-- ressetpass -->
        <div class="modal-content-right-ressetpass">
            <div class="back" id="resetpass">Back</div>
            <div class="reset-password-all">
                <h2>Khôi Phục Mật Khẩu</h2>
                <p>Vui lòng nhập email để khôi phục mật khẩu</p>
                <form action="" method="post">
                    <div class="box-input">
                        <img src="./Public/img/email-4ddcb32a.svg" alt="">
                        <input name="rEmail" id="reset-email" type="email" placeholder="Nhập Email" required>
                    </div>
                    <p class="repair" id="repairemail-resetpass"></p>
                    <button name="resetpass" class="reset-button" type="submit">Tiếp tục</button>
                </form>
            </div>
        </div>
        <i class='bx bx-x'></i>
    </div>
</div>
<script src="./Public/js/login.js"></script>
<script src="./Public/js/main.js"></script>
<script src="./Public/js/allproduct.js"></script>
<script src="./Public/js/cart.js"></script>
<script src="./Public/js/address.js"></script>
<script src="./Public/js/user.js"></script>
<script src="./Public/js/productdetail.js"></script>

<script>
    // Kiểm tra lỗi đăng nhập
    <?php if (!empty($_SESSION['login_error'])) { ?>
        document.getElementById("loginModal").style.display = "flex";
        loginSection.style.display = 'block';
        signupSection.style.display = 'none';
        document.getElementById("repairpassword").innerText = "<?php echo $_SESSION['login_error']; ?>";
        <?php unset($_SESSION['login_error']); ?>
    <?php } ?>

    // Kiểm tra lỗi đăng ký
    <?php if (!empty($_SESSION['signup_error'])) { ?>
        document.getElementById("loginModal").style.display = "flex";
        signupSection.style.display = 'block';
        loginSection.style.display = 'none';
        document.getElementById("repairpassword-signup2").innerText = "<?php echo $_SESSION['signup_error']; ?>";
        <?php unset($_SESSION['signup_error']); ?>
    <?php } ?>

    // Kiểm tra lỗi quên mật khẩu
    <?php if (!empty($_SESSION['quenpass_error'])) { ?>
        document.getElementById("loginModal").style.display = "flex";
        loginSection.style.display = 'none';
        resetpass.style.display = 'block';
        document.getElementById("repairemail-resetpass").innerText = "<?php echo $_SESSION['quenpass_error']; ?>";
        <?php unset($_SESSION['quenpass_error']); ?>
    <?php } ?>
</script>


</body>

</html>