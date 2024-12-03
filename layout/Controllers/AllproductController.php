<?php
    class AllproductController {
        public function __construct($id, $iddm, $chuyen, $kyw) {
            include_once 'Models/AllproductModel.php';
            $ds = new AllproductModel();
            $ds->dsdm();
            $totalProducts = $ds->tongsotrang($chuyen);
            $slsp = 8;
            $tongst = ceil($totalProducts / $slsp);
            $price = isset($_GET['price']) ? (int)$_GET['price'] : null;

             if (!empty($kyw)) {
            $ds->timkim($kyw);
            $mang = $ds->timkim;
        } elseif ($price !== null) {
            $ds->locgia($chuyen, $price);
            $mang = $ds->mangsp;
        } elseif (!empty($iddm)) {
            $ds->sptheodm($iddm);
            $mang = $ds->splienquan;
        } else {
            $ds->dssp($chuyen);
            $mang = $ds->mangsp;
        }
            include_once 'Views/allproduct.php';
        }
    }
    


?>