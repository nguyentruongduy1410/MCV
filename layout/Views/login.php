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
            $_SESSION['user_name'] = $user_info['ten'];
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
//quen mat khau
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include thư viện PHPMailer
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';


if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Khởi tạo đối tượng PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'classicalmusicvnn@gmail.com'; // Thay bằng email của bạn
        $mail->Password = 'elzz tppy mkgb saav'; // Thay bằng mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Cấu hình người gửi và người nhận
        $mail->setFrom('classicalmusicvnn@gmail.com', 'c');
        $mail->addAddress($email); 

        // Tiêu đề và nội dung email
        $mail->Subject = 'Khôi phục mật khẩu';
        $mail->Body    = 'Đây là nội dung email khôi phục mật khẩu của bạn.';

        // Gửi email
        if ($mail->send()) {
            $_SESSION['message'] = "Đã gửi email khôi phục mật khẩu!";
        } else {
            $_SESSION['error'] = "Không thể gửi email. Lỗi: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        // Hiển thị chi tiết lỗi trong quá trình gửi email
        $_SESSION['error'] = "Lỗi khi gửi email: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo</title>
</head>
<body>

<?php
// Hiển thị thông báo lỗi nếu có
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); // Xóa thông báo lỗi sau khi hiển thị
}

// Hiển thị thông báo thành công nếu có
if (isset($_SESSION['message'])) {
    echo "<p style='color: green;'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Xóa thông báo thành công sau khi hiển thị
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