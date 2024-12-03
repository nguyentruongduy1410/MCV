<?php
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController {
    public function sendEmail() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $name = $_POST['name'] ?? null;
            $message = $_POST['message'] ?? null;

            if ($email && $name && $message) {
                $mail = new PHPMailer(true);
                try {
                    // Cấu hình SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'classicalmusicvnn@gmail.com'; // Email của bạn
                    $mail->Password = 'elzz tppy mkgb saav'; // Mật khẩu ứng dụng
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Cài đặt người gửi và nhận
                    $mail->setFrom('classicalmusicvnn@gmail.com', 'Website Contact Form'); // Người gửi
                    $mail->addAddress('classicalmusicvnn@gmail.com', 'Admin'); // Email nhận

                    // Nội dung email
                    $mail->isHTML(true);
                    $mail->Subject = "Tin nhắn từ $name";
                    $mail->Body    = "Bạn có tin nhắn từ <b>$name</b> (<i>$email</i>):<br><br>" . nl2br($message);

                    // Gửi email
                    $mail->send();
                    echo "<div style='wight:100%;'><p style='color: green; margin: auto;'>Tin nhắn đã được gửi thành công!</p></div>";
                } catch (Exception $e) {
                    echo "<p style='color: red;'>Đã xảy ra lỗi khi gửi tin nhắn: {$mail->ErrorInfo}</p>";
                }
            } else {
                echo "<p style='color: red;'>Vui lòng điền đầy đủ thông tin!</p>";
            }
        }
    }
}
?>