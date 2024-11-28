<?php 
    class QlbaivietModel{
        public $dsbv;
        public function dsbv(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM bai_viet";
            $this->dsbv=$data->selectall($sql);

        }
            
    }
?>