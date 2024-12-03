<?php
include_once 'Models/connectmodel.php';
include_once 'Models/UserModel.php';
// Đăng nhập
$err = '';
if (isset($_POST["login"])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $role = checkuser($user, $pass);

    if ($role !== null) {
        $user_info = getCustomerInfo($user);
        if ($user_info) {
            $_SESSION['role'] = $role;
            $_SESSION['email'] = $user;
            $_SESSION['user_id'] = $user_info['id'];
            $_SESSION['user_name'] = $user_info['ten'] ?: substr($user_info['email'], 0, strpos($user_info['email'], '@'));
            $_SESSION['user_address'] = $user_info['diachi'];
            $_SESSION['user_phone'] = $user_info['sdt'];
        }
        if ($role == 1) {
            header('Location: ../layoutAdmin/index.php');
        } else if ($role == 0) {
            header('Location: index.php?trang=home');
        }
        exit();
    } else {
        $err = 'Thông tin đăng nhập không chính xác!';
        $_SESSION['login_error'] = $err;
    }
}



// Đăng ký
$error_message = '';
if (isset($_POST['signup'])) {
    $sEmail = $_POST['sEmail'];
    $sPassword = $_POST['sPassword'];
    $sRPassword = $_POST['sRPassword'];

    if ($sPassword === $sRPassword) {
        try {
            include_once 'Models/UserModel.php';
            $hashedPassword = password_hash($sPassword, PASSWORD_DEFAULT);
            if (registerUser($sEmail, $hashedPassword)) {
                $user_info = getCustomerInfo($sEmail);
                if ($user_info) {
                    $_SESSION['role'] = $role;
                    $_SESSION['email'] = $sEmail;
                    $_SESSION['user_id'] = $user_info['id'];
                    $_SESSION['user_name'] = $user_info['ten'];
                    $_SESSION['user_address'] = $user_info['diachi'];
                    $_SESSION['user_phone'] = $user_info['sdt'];
                }
                header('Location: index.php');
                exit();
            } else {
                $error_message = "Email đã được đăng ký!";
                $_SESSION['signup_error'] = $error_message; 
            }
        } catch (PDOException $e) {
            $error_message = "Lỗi kết nối: " . $e->getMessage();
            $_SESSION['signup_error'] = $error_message;
        }
    } else {
        $error_message = "Mật khẩu không khớp!";
        $_SESSION['signup_error'] = $error_message;
    }
}

// Khôi phục mật khẩu
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

function generateRandomPassword($length = 8) {
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
}

function sendNewPasswordEmail($email, $newPassword) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'classicalmusicvnn@gmail.com'; // Thay bằng email của bạn
        $mail->Password = 'elzz tppy mkgb saav'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('classicalmusicvnn@gmail.com', 'Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Mật khẩu mới của bạn';
        $mail->Body = "Mật khẩu mới của bạn là: <b>$newPassword</b>. Vui lòng đăng nhập và thay đổi mật khẩu nếu cần.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function updatePasswordInDatabase($email, $newPassword) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();

    $stmt = $conn->prepare("UPDATE users SET mk = :password WHERE email = :email");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resetpass'])) {
    $email = $_POST['rEmail'];

    if (checkEmail($email)) {
        $newPassword = generateRandomPassword();
        if (updatePasswordInDatabase($email, $newPassword) && sendNewPasswordEmail($email, $newPassword)) {
            echo "<p style='color: green;'>Mật khẩu mới đã được gửi đến email của bạn!</p>";
        } else {
            echo "<p style='color: red;'>Đã xảy ra lỗi, vui lòng thử lại sau!</p>";
        }
    } else {
        echo "<p style='color: red;'>Email không tồn tại trong hệ thống!</p>";
    }
}

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
</script>


</body>

</html>