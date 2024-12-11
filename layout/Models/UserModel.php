<?php 
include_once 'Models/connectmodel.php';
function checkuser($user, $pass) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email"); 
    $stmt->bindParam(':email', $user);
    $stmt->execute();
    $kq = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($kq && password_verify($pass, $kq['mk'])) {
        if ($kq['activation_status'] == 0) {
            return 'Tài khoản của bạn chưa được kích hoạt!';
        }
        return $kq['role']; 
    } else {
        return null;
    }
    
}


function checkEmail($email) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

function checkActivationCode($email, $activation_code) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND activation_code = :activation_code AND activation_status = 0");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':activation_code', $activation_code);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

function activateUser($email) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("UPDATE users SET activation_status = 1 WHERE email = :email");
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function registerUser($email, $password, $name, $activation_code) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("INSERT INTO users (email, mk, ten, activation_code, activation_status) VALUES (:email, :password, :name, :activation_code, 0)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':activation_code', $activation_code);
    return $stmt->execute();
}

function getCustomerInfo($email) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $customerInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $customerInfo;
    } else {
        return false;
    }
}
function updateUserInfo($email, $name, $phone, $address) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();

    $stmt = $conn->prepare("UPDATE users SET ten = :ten, sdt = :sdt, diachi = :diachi WHERE email = :email");
    $stmt->bindParam(':ten', $name);
    $stmt->bindParam(':sdt', $phone);
    $stmt->bindParam(':diachi', $address);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
}
function getOldPassword($email) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT mk FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        return $result['mk'];
    } else {
        return false;
    }
}

function updatePassword($email, $newPassword)
    {
        $connect = new ConnectModel();
        $conn = $connect->ketnoi();
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET mk = :mk WHERE email = :email");
        $stmt->bindParam(':mk', $hashedPassword);
        $stmt->bindParam(':email', $email);
        return $stmt->execute(); 
    }
function updatePasswordInDatabase($email, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $connect = new ConnectModel();
        $conn = $connect->ketnoi();
    
        $stmt = $conn->prepare("UPDATE users SET mk = :password WHERE email = :email");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
    
        return $stmt->execute();
    }
?>