<?php
    class ConnectModel{
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $conn;
        
        public function ketnoi(){
            try{
                $this->conn = new PDO("mysql:host=".$this->servername.";dbname=mcv;charset=utf8",$this->username,password: $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo 'kết nối thành công';
                return $this->conn;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function selectall($sql){
            $this->ketnoi();
            $stmt = $this->conn->prepare($sql);             $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
            $this->conn = null; // đóng kết nối database
            return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
        }
        public function selectone($sql, $id){
            $this->ketnoi();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
            $this->conn = null; // đóng kết nối database
            return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
        }
    }
?>


