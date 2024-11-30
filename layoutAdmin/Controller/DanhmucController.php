<?php
class DanhmucController
{
    public $id;
    public $tendm;
    public $hinhdm;
    public function __construct($lenh, $tendm, $hinhdm, $id)
    {
        $this->tendm = $tendm;
        $this->hinhdm = $hinhdm;
        $this->id = $id;
    }
    public function index($lenh)
    {
        include_once("Model/DanhmucModel.php");
        $danhmucmodel = new DanhmucModel();
        switch ($lenh) {
            case "":
                $danhmucmodel->dsdm();
                include_once 'Views/danhmuc.php';
                break;
            case "them":
                $danhmucmodel->themdm($this->tendm, $this->hinhdm);
                $danhmucmodel->dsdm();
                include_once 'Views/danhmuc.php';
                break;
            case "xoa":
                $danhmucmodel -> xoadm($this -> id);
                $danhmucmodel->dsdm();
                include_once 'Views/danhmuc.php';

                break;
            case "sua":
                $danhmucmodel -> suadm($this-> id);
                include_once 'Views/danhmuc.php';
                break;
            case "capnhat":
                $danhmucmodel -> capnhat($this -> id,$this->tendm, $this->hinhdm);
                $danhmucmodel->dsdm();
                include_once 'Views/danhmuc.php';
                break;

        }
    }
}
?>