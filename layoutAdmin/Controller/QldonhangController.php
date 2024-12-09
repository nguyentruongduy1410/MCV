<?php 
    class QldonhangController{
        public $lenh;
        public $id;
        public $trangthai_dh;
        public $trangthai_tt;

        public function __construct($lenh, $id,$trangthai_dh,$trangthai_tt){
            $this->lenh = $lenh;
            $this->id = $id;
            $this->trangthai_dh = $trangthai_dh;
            $this->trangthai_tt = $trangthai_tt;
        }
        public function index(){
            include_once("Model/QldonhangModel.php");
            $qldonhangmodel = new QldonhangModel();
            switch ($this -> lenh) {
                case '':
                    $qldonhangmodel -> dsdh();
                    include_once 'Views/qldonhang.php';
                    break;
                case 'chitietdh':
                    $qldonhangmodel -> ctdh($this->id);
                    include_once 'Views/chitietdh.php';
                    break;
                case 'suatrangthai':
                    $qldonhangmodel -> suatt($this->id);
                    $don_hang = $qldonhangmodel->suatt;
                    include_once 'Views/editdonhang.php';
                    break;
                case 'capnhat':
                    $qldonhangmodel->capnhattt($this->id, $this->trangthai_dh, $this->trangthai_tt);
                    $qldonhangmodel -> dsdh();
                    include_once 'Views/qldonhang.php';

            }
        }
    }
?>