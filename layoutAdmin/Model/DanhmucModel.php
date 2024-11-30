<?php 
    class DanhmucModel{
        public $dsdm;
        public function dsdm(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql="SELECT * FROM danh_muc";
            $this->dsdm=$data->selectall($sql);
            return $this->dsdm;
        }
        public function themdm($tendm, $hinhdm){
            include_once 'Model/connectmodel.php';
            $dm = new ConnectModel();
            $sql = "INSERT INTO danh_muc (ten_dm, hinh_dm) VALUES (:tendm, :hinhdm)";
            $dm->ketnoi();
            $stmt = $dm->conn->prepare($sql);
            $stmt->bindParam(':tendm', $tendm);
            $stmt->bindParam(':hinhdm', $hinhdm);
            $stmt->execute();
            $dm->conn = null; 
    }
    public function xoadm($id){
        include_once 'Model/connectmodel.php';
        $dm = new ConnectModel();
        $sql="DELETE FROM danh_muc where id=:id";
        $dm->ketnoi();
        $stmt = $dm->conn->prepare($sql);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $dm->conn = null;

    }
    public function suadm($id){
        include_once 'Model/connectmodel.php';
        $dm = new ConnectModel();
        $sql="select * from danh_muc where id=:id";
        
        return $dm->selectone($sql,$id);
    }
    public function capnhat($id, $tendm, $hinhdm){
        include_once 'Model/connectmodel.php';
        $dm = new ConnectModel();
        $sql = "UPDATE danh_muc SET ten_dm = :tendm, hinh_dm = :hinhdm WHERE id = :id";
        $dm->ketnoi();
        $stmt = $dm->conn->prepare($sql);
        $stmt -> bindParam(":id",$id,PDO::PARAM_INT);
        $stmt -> bindParam(":tendm",$tendm,PDO::PARAM_STR);
        $stmt->bindParam(":hinhdm", $hinhdm, PDO::PARAM_STR);
        $stmt->execute();
        $dm->conn = null;
    }
}
?>