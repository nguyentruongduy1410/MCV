<?php 
    class QldonhangModel{
        public $dsdh;
        public function dsdh(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM don_hang";
            
            $this->dsdh=$data->selectall($sql);

        }
            
    }
?>