<?php 
    class DanhmucModel{
        public $dsdm;
        public function dsdm(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM danh_muc";
            $this->dsdm=$data->selectall($sql);
        }
            
    }
?>