<?php 
    class UserModel{
        public $users;
       public function __construct(){   

    }
    public function dsuser(){
        include_once 'Models/connectmodel.php';
        $data = new ConnectModel();
        $sql="SELECT * FROM users";
        $this->users=$data->selectall($sql);
    }
    // function checkuser($email, $pass){
    //     $data = new ConnectModel();
    //     $sql = $data->prepare("SELECT * FROM users WHERE user = :email");
    //     $sql->bindParam("email", $email);
    //     $sql->execute();
    //     $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    //     $kq=$sql->selectall($sql);
    //     return $kq[0]['role'];
    // }
    
    
    
}
function checkuser($user, $pass) {
    $connect = new ConnectModel();
    $conn = $connect->ketnoi();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND mk = :pass"); 
    $stmt->bindParam(':email', $user); 
    $stmt->bindParam(':pass', $pass); 
    $stmt->execute();
    
    $kq = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($kq) {
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
?>