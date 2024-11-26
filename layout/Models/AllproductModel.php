<?php 
    class AllproductModel{
        public $mangsp;
        public $splienquan;
        public $dm;
        public $timkim;
        public function dsdm(){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM danh_muc";
            $this->dm=$data->selectall($sql);
        }
        public function timkim($kyw) {
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql = "SELECT * FROM san_pham WHERE ten_sp LIKE :kyw";
            $stmt = $data->conn->prepare($sql);
            $stmt->bindValue(':kyw', '%' . $kyw . '%', PDO::PARAM_STR);
            $stmt->execute();            
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data->conn = null;
            $this->timkim = $kq;
            
        }
        
        
        public function dssp($chuyen){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $slsp = 8;
            $tong = ($chuyen - 1) * $slsp;
            $sql="SELECT * FROM san_pham limit $tong, $slsp";
            $this->mangsp=$data->selectall($sql);
        }
        public function tongsotrang($chuyen){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql = "SELECT COUNT(*) AS tongsp FROM san_pham";
            $data->ketnoi();
            $stmt = $data->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $data->conn = null;
            return $result['tongsp'];
        }
        public function sptheodm($iddm){
            include_once 'Models/connectmodel.php';
            $data = new ConnectModel();
            $sql="select * from san_pham where id_dm=:id_dm";
            $data->ketnoi();
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(":id_dm",$iddm, PDO::PARAM_INT);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data->conn = null;
            $this->splienquan = $kq;
        }
    }
?>