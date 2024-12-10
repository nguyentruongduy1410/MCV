<?php

require_once '../PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer-master/src/SMTP.php';
require_once '../PHPMailer-master/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController
{
    public function sendEmail()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? null;
        $name = $_POST['name'] ?? null;
        $message = $_POST['message'] ?? null;

        if ($email && $name && $message) {
            $mail = new PHPMailer(true);
            try {
                // Cấu hình SMTP
                $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug
                $mail->isSMTP();
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'classicalmusicvnn@gmail.com'; // Email của bạn
                $mail->Password = 'elzz tppy mkgb saav'; // Mật khẩu ứng dụng
                $mail->SMTPSecure = 'ssl';    
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Cài đặt người gửi và nhận
                $mail->setFrom('classicalmusicvnn@gmail.com', 'Website Contact Form'); // Người gửi
                $mail->addAddress('classicalmusicvnn@gmail.com', 'Admin'); // Email nhận

                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = "New message from: $name";
                $mail->Body    = "
                    <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                        <h2 style='color: #007BFF;'>Tin nhắn mới từ khách hàng</h2>
                        <p><strong>Người gửi:</strong> $name</p>
                        <p><strong>Email:</strong> <a href='mailto:$email' style='color: #007BFF;'>$email</a></p>
                        <hr style='border: 1px solid #ddd; margin: 20px 0;'>
                        <p style='margin-bottom: 0;'><strong>Nội dung tin nhắn:</strong></p>
                        <div style='background: #f9f9f9; padding: 15px; border-radius: 5px; border: 1px solid #ddd;'>
                            " . nl2br($message) . "
                        </div>
                        <hr style='border: 1px solid #ddd; margin: 20px 0;'>
                        <p style='font-size: 14px; color: #555;'>Đây là email tự động từ hệ thống. Vui lòng không trả lời trực tiếp email này.</p>
                    </div>
                ";

                // Gửi email
                $mail->send();

                // Hiển thị thông báo và quay lại trang liên hệ
                echo "<script>
                    alert('Cảm ơn bạn đã góp ý! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.');
                    window.location.href = '/layout/index.php?trang=contact'; 
                </script>";
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