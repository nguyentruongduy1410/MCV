<?php
include_once 'Models/UserModel.php';

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    // Kiểm tra mã kích hoạt và email
    if (checkActivationCode($email, $code)) {
        if (activateUser($email)) {
            $_SESSION['activation_success'] = "Tài khoản của bạn đã được kích hoạt thành công.";
            header('Location: index.php?trang=home');
            exit();
        } else {
            $_SESSION['activation_error'] = "Lỗi kích hoạt tài khoản.";
        }
    } else {
        $_SESSION['activation_error'] = "Mã kích hoạt không hợp lệ.";
    }
} else {
    $_SESSION['activation_error'] = "Thông tin kích hoạt không đầy đủ.";
}

header('Location: index.php?trang=home');
exit();
?>
