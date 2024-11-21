<?php
    session_start();
    ob_start();
    include("../Model/");
    if(isset($_POST['dangnhap']) && $_POST['dangnhap']){
        $user = $_POST['email'];
        $pass = $_POST['mk'];
    }
?>
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
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="loginpage(event)">
                        <div class="box-input">
                            <img src="./Public/img/email-4ddcb32a.svg" alt="">
                            <input id="login-email" type="text" name="email" placeholder="Nhập Email">
                        </div>
                        <p class="repair" id="repairemail"></p>
                        <div class="box-input">
                            <img src="./Public/img/password-263cf8d7.svg" alt="">
                            <input id="login-pass" type="password" name="mk" placeholder="Nhập mật khẩu">
                            <span class="show-pass"><img id="show-login-pass" src="./Public/img/eye.png" alt=""
                                    width="20px"></span>
                        </div>
                        <p class="repair" id="repairpassword"></p>
                        <button class="log-in">Đăng nhập</button>
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
                        <p>Hoặt đăng ký với</p>
                        <div class="line"></div>
                    </div>
                    <form action="" method="" onsubmit="return checkForm()">
                        <div class="box-input">
                            <img src="./Public/img/email-4ddcb32a.svg" alt="">
                            <input id="signup-email" type="text" placeholder="Nhập Email">
                        </div>
                        <p class="repair" id="repairemail-signup"></p>
                        <div class="box-input">
                            <img src="./Public/img/password-263cf8d7.svg" alt="">
                            <input id="signup-pass1" type="password" placeholder="Nhập mật khẩu">
                            <span class="show-pass"><img id="show-signup-pass" src="./Public/img/eye.png" alt=""
                                    width="20px"></span>
                        </div>
                        <p class="repair" id="repairpassword-signup1"></p>
                        <div class="box-input">
                            <img src="./Public/img/password-263cf8d7.svg" alt="">
                            <input id="signup-pass2" type="password" placeholder="Nhập lại mật khẩu">
                            <span class="show-pass"><img id="show-signup2-pass" src="./Public/img/eye.png" alt=""
                                    width="20px"></span>
                        </div>
                        <p class="repair" id="repairpassword-signup2"></p>
                        <button class="log-in" onclick="signuppage(event)">Đăng ký</button>
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
                    <form action="" method="" onsubmit="validateEmail(event)">
                        <div class="box-input">
                            <img src="./Public/img/email-4ddcb32a.svg" alt="">
                            <input id="reset-email" type="text" placeholder="Nhập Email">
                        </div>
                        <p class="repair" id="repairemail-resetpass"></p>
                        <button class="reset-button" type="submit">Tiếp tục</button>
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
    <script src="./Public/js/productdetail.js"></script>
    

</body>

</html>