<?php
include_once 'Models/connectmodel.php';
class UserController {
    public function __construct() {
        $err_pass = '';
        include_once 'Models/UserModel.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_info"])) {
            $email = $_SESSION['email'];
            $oldPassword = $_POST["old-pass"];
            $newPassword = $_POST["change-pass1"];
            $confirmPassword = $_POST["change-pass2"];
            $oldPasswordFromDb = getOldPassword($email);

            if ($oldPasswordFromDb && password_verify($oldPassword, $oldPasswordFromDb)) {
                if ($newPassword === $confirmPassword) {
                    if (updatePassword($email, $newPassword)) {
                        $_SESSION['error_pass'] = "Mật khẩu đã được thay đổi thành công!";
                    } else {
                        $_SESSION['error_pass'] = "Lỗi khi cập nhật mật khẩu!";
                    }
                } else {
                    $_SESSION['error_pass'] = "Mật khẩu mới và xác nhận mật khẩu không khớp!";
                }
            } else {
                $_SESSION['error_pass'] = "Mật khẩu cũ không đúng!";
            }
        }

        include_once 'Views/user.php';
    }
}

?>
