<?php 
    class QldonhangModel{
        public $dsdh;
        public $ctdh;
        public $suatt;
        public function dsdh(){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql = "
            SELECT 
                chitiet_don_hang.*,
                san_pham.ten_sp AS ten_sp,
                don_hang.trangthai_dh AS trang_thai,
                don_hang.trangthai_thanhtoan AS trang_thai_tt

            FROM 
                chitiet_don_hang
            JOIN 
                don_hang 
                ON chitiet_don_hang.id_dh = don_hang.id
            JOIN 
                san_pham 
                ON chitiet_don_hang.id_sp = san_pham.id;
        ";
            $this->dsdh=$data->selectall($sql);

        }
        public function ctdh($id){
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql = "
                    SELECT 
                        chitiet_don_hang.*,
                        users.ten AS ten,
                        users.email AS email,
                        users.sdt AS sdt,
                        users.diachi AS diachi,
                        don_hang.ngay_dat_hang AS ngay_dat,
                        don_hang.tong_tien AS tong_tien

                    FROM 
                        chitiet_don_hang
                    JOIN 
                        don_hang 
                        ON chitiet_don_hang.id_dh = don_hang.id
                    JOIN 
                        users 
                        ON don_hang.id_user = users.id
                    JOIN 
                        san_pham 
                        ON chitiet_don_hang.id_sp = san_pham.id
                    WHERE 
                        chitiet_don_hang.id_dh = :id
                ";
        
                    $this->ctdh = $data->selectone($sql, $id);

    
        }
        public function suatt($id) {
            include_once 'Model/connectmodel.php';
            $data = new ConnectModel();
            $sql = "SELECT * FROM don_hang WHERE id = :id";
            $this->suatt = $data->selectone($sql, $id);
            
        }
        public function capnhattt($id, $trangthai_tt, $trangthai_dh) {
            include_once 'Model/connectmodel.php';
            $tt = new ConnectModel();
            $sql = "
                UPDATE don_hang
                SET 
                    trangthai_dh = :trangthai_dh,
                    trangthai_thanhtoan = :trangthai_tt
                WHERE 
                    id = :id
            ";
            $tt->ketnoi();
            $stmt = $tt->conn->prepare($sql); 
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":trangthai_dh", $trangthai_dh, PDO::PARAM_STR); // Truyền tham số từ form
            $stmt->bindParam(":trangthai_tt", $trangthai_tt, PDO::PARAM_STR);
            $stmt->execute();
            $tt->conn = null;
        }
        
        
            
    }
?>