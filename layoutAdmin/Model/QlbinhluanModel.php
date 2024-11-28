<?php 
    class QlbinhluanModel{
        public $dsbl;
        public function dsbl(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM binh_luan";
            $this->dsbl=$data->selectall($sql);



        }
            
    }
?>