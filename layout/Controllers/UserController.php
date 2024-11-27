<?php
class UserController {
    public function infor() { 
        include_once 'Models/UserModel.php';

        $userModel = new UserModel();
        $userModel->dsuser();
        $users = $userModel->users;

        include_once 'Views/user.php';
    }
}
?>
