<?php 
    class QluserModel{
        public $dsuser;
        public function dsuser(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM users";
            $this->dsuser=$data->selectall($sql);
            
        }
            
    }
?>