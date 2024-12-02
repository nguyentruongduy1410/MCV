<?php 
function checkuser($user, $pass) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email"); 
    $stmt->bindParam(':email', $user);
    $stmt->execute();
    $kq = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($kq && password_verify($pass, $kq['mk'])) {
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

function registerUser($email, $password) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();

    if (checkEmail($email)) {
        return false;
    }

    $sql = "INSERT INTO users (email, mk) VALUES (:sEmail, :sPassword)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sEmail', $email);
    $stmt->bindParam(':sPassword', $password);

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
?>