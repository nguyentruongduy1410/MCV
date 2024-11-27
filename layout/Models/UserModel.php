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
?>