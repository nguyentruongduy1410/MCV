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
    $sName = $_POST['sName'];
    $sPassword = $_POST['sPassword'];
    $sRPassword = $_POST['sRPassword'];

    if (strlen($sPassword) >= 8) {
        if ($sPassword === $sRPassword) {
            try {
                include_once 'Models/UserModel.php';
                $hashedPassword = password_hash($sPassword, PASSWORD_DEFAULT);
                if (registerUser($sEmail, $hashedPassword, $sName)) {
                    $user_info = getCustomerInfo($sEmail);
                    if ($user_info) {
                        $_SESSION['role'] = $role;
                        $_SESSION['email'] = $sEmail;
                        $_SESSION['name'] = $sName;
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
    } else {
        $error_message = "Mật khẩu phải có ít nhất 8 ký tự!";
        $_SESSION['signup_error'] = $error_message;
    }
}

// Khôi phục mật khẩu
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

function generateRandomPassword($length = 8)
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
}

function sendNewPasswordEmail($email, $newPassword)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'classicalmusicvnn@gmail.com'; // Thay bằng email của bạn
        $mail->Password = 'elzz tppy mkgb saav'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('classicalmusicvnn@gmail.com', 'Classical Music');
        $mail->addAddress($email);

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->isHTML(true);
        $mail->Subject = 'Mật khẩu mới của bạn';
        $mail->Body = "Mật khẩu mới của bạn là: <b>$newPassword</b>. Vui lòng đăng nhập và thay đổi mật khẩu nếu cần.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

$err_quenpass = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resetpass'])) {
    $email = $_POST['rEmail'];

    if (checkEmail($email)) {
        $newPassword = generateRandomPassword();
        if (updatePasswordInDatabase($email, $newPassword) && sendNewPasswordEmail($email, $newPassword)) {
            $err_quenpass = 'Mật khẩu mới đã được gửi đến email của bạn!';
            $_SESSION['quenpass_error'] = $err_quenpass;
        } else {
            $err_quenpass = 'Đã xảy ra lỗi, vui lòng thử lại sau!';
            $_SESSION['quenpass_error'] = $err_quenpass;
        }
    } else {
        $err_quenpass = 'Email không tồn tại trong hệ thống!';
        $_SESSION['quenpass_error'] = $err_quenpass;
    }
}

?>