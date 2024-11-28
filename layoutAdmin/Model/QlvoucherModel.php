<?php 
    class QlvoucherModel{
        public $dsvc;
        public function dsvc(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM ma_giam_gia";
            $this->dsvc=$data->selectall($sql);

            

        }
            
    }
?>