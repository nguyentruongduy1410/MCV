<?php
    class AllproductController{
        public function __construct($id, $iddm, $chuyen){
            include_once 'Models/AllproductModel.php';
            $ds = new AllproductModel();
            $ds->dsdm();
            $totalProducts = $ds->tongsotrang($chuyen);
            $slsp = 8;
            $tongst = ceil($totalProducts / $slsp);
            if($iddm == '' ){
                $ds->dssp($chuyen);
                $mang = $ds -> mangsp;
            }else{
                $ds->sptheodm($iddm);
                $mang = $ds -> splienquan;
            }
            include_once 'Views/allproduct.php';

        }
    }
?>