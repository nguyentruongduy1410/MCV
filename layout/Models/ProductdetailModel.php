<?php 
    class ProductdetailModel{
        public $chitiethinhanh;
        public function ctha($id){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql = 'SELECT * FROM hinh_anh_chi_tiet WHERE id_sp=:id';
            $this->chitiethinhanh = $data->selectone($sql, $id);


        }
    }
?>