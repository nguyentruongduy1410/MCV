<?php 
    class HomeModel{
        public $mangsp;
        public $spdatbiet;
        public $danhmucsp;
        public $sanphamdanhmuc;
        public function dssp($page = 1){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM san_pham LIMIT 8"; 
            $this->mangsp=$data->selectall($sql);
        }
       
        public function spdb($iddb){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql = "SELECT * FROM san_pham WHERE dacbiet_sp = 1";
            $stmt = $data->conn->prepare($sql);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data->conn = null;
            $this->spdatbiet = $kq;
                    
        }
        public function dmsp($iddm){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql= 'SELECT * FROM danh_muc';
            $stmt = $data->conn->prepare(query: $sql);
            $stmt -> execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data->conn = null;
            $this->danhmucsp = $kq;
        }
        public function spdm($iddm) {
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql = "SELECT * FROM san_pham WHERE id_dm = :iddm"; 
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(':iddm', $iddm, PDO::PARAM_INT);
            $stmt -> execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->sanphamdanhmuc[$iddm] = $kq;
            $data->conn = null;
            
        }
       
    }
?>